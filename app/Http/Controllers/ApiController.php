<?php

namespace App\Http\Controllers;

use App\Models\ModelBiodata;
use App\Models\ModelLowongan;
use App\Models\ModelPendidikanTerakhir;
use App\Models\ModelRiwayatPekerjaan;
use App\Models\ModelRiwayatPelatihan;
use App\Models\ModelUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;

class ApiController extends Controller
{

    public function __construct()
    {
        $this->guard = "api";
    }

    public function auth(Request $request)
    {
        $checkUsers = ModelUsers::where('email', $request->email)->first();
        if ($request->email == null && $request->password == null) {
            return response([
                'message' => 'Mohon maaf, Email dan Password tidak boleh kosong',
                'status' => false,
            ]);
        }
        if ($checkUsers == null) {
            return response([
                'message' => 'Mohon maaf, Email tidak ditemukan',
                'status' => false,
            ]);
        }

        if (!Hash::check($request->password, $checkUsers->password)) {

            return response([
                'message' => 'Mohon maaf, Email atau Password tidak sesuai',
                'status' => false,
            ]);
        }

        // Get the token
        if (!$token = auth($this->guard)->login($checkUsers)) {
            return response()->json(['email_id' => ['Unauthorized']], 401);
        }


        if ($checkUsers->role == 1) {
            return response()->json([
                'success' => true,
                'token' => $token,
                'dataUsers' => $checkUsers
            ]);
        } else {
            return response()->json([
                'success' => true,
                'token' => $token,
                'dataUsers' => $checkUsers
            ]);
        }
    }
    public function getDataPelamar()
    {

        $dataPelamar = DB::table('tbl_biodata')
            ->select('nama', 'posisi', 'tempat_lahir', 'tgl_lahir', 'id_biodata', 'id_users')
            ->leftJoin('tbl_lowongan', 'tbl_biodata.id', '=', 'tbl_lowongan.id_biodata')
            ->get();

        return response()->json([
            'success' => true,
            'data'      => $dataPelamar
        ], 200);
    }

    public function getDataPelamarById($id)
    {
        $biodata = DB::table('tbl_biodata')->where('id_users', $id)->first();
        $dataPelamar = DB::table('tbl_biodata')
            ->select('nama', 'posisi', 'tempat_lahir', 'tgl_lahir', 'id_biodata', 'id_users')
            ->leftJoin('tbl_lowongan', 'tbl_biodata.id', '=', 'tbl_lowongan.id_biodata')
            ->where('tbl_biodata.id', $biodata->id)
            ->get();

        return response()->json([
            'success' => true,
            'data'  => $dataPelamar
        ]);
    }

    public function addLowongan(Request $request, $id)
    {
        $biodata = DB::table('tbl_biodata')->where('id_users', $id)->first();
        $updateLowongan = ModelBiodata::find($biodata->id);
        $updateLowongan->posisi = $request->posisi;
        $updateLowongan->nama = $request->nama;
        $updateLowongan->no_ktp = $request->noKtp;
        $updateLowongan->tempat_lahir = $request->tempatLahir;
        $updateLowongan->tgl_lahir = $request->tglLahir;
        $updateLowongan->jk = $request->jk;
        $updateLowongan->agama = $request->agama;
        $updateLowongan->golongan_darah = $request->golonganDarah;
        $updateLowongan->alamat_tinggal = $request->alamatTinggal;
        $updateLowongan->alamat_ktp = $request->alamatKtp;
        $updateLowongan->telp = $request->telp;
        $updateLowongan->kontak_darurat = $request->kontak_darurat;
        $updateLowongan->save();

        ModelLowongan::create([
            'skill' => $request->skill,
            'gaji' => $request->gaji,
            'bersedia_ditempatkan' => $request->bersediaDitempatkan,
            'id_biodata' => $biodata->id
        ]);

        return response()->json([
            'success' => true,
            'message' => "Lowongan Pekerjaan berhasil ditambahkan"
        ]);
    }

    public function signUp(Request $request)
    {
        if ($request->password != $request->confirmPassword) {
            return response()->json([
                'success' => false,
                'message' => "Mohon maaf, Password dan Konfirmasi Password harus sama!"
            ]);
        }

        ModelUsers::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 0
        ]);

        $dataUsers = DB::table('tbl_users')->orderBy('id', 'desc')->first();
        ModelBiodata::create([
            'id_users' => $dataUsers->id
        ]);

        return response()->json([
            'success' => true,
            'message' => "Pendaftaran berhasil dilakukan"
        ]);
    }

    public function deleteLowongan($id)
    {

        $dataUsers =  ModelUsers::find($id);
        $dataUsers->delete();

        return response()->json([
            'success' => true,
            'message' => "Data pelamar berhasil dihapus"
        ]);
    }

    public function addRiwayatPelatihan(Request $request, $id)
    {
        $biodata = DB::table('tbl_biodata')->where('id_users', $id)->first();

        ModelRiwayatPelatihan::create([
            'nama_kursus' => $request->namaKursus,
            'sertifikat' => $request->sertifikat,
            'tahun' => $request->tahunPelatihan,
            'id_biodata' => $biodata->id
        ]);

        return response()->json([
            'success'   => "true",
            'message' => "Riwayat Pelatihan berhasil ditambahkan"
        ]);
    }

    public function getRiwayatPelatihan($id)
    {
        $biodata = DB::table('tbl_biodata')->where('id_users', $id)->first();

        $data = DB::table('tbl_riwayat_pelatihan')->where('id_biodata', $biodata->id)->get();
        return response([
            'status' => true,
            'data'  => $data
        ]);
    }

    public function deleteRiwayatPelatihan($id)
    {
        $riwayatPelatihan =  ModelRiwayatPelatihan::find($id);
        $riwayatPelatihan->delete();

        return response()->json([
            'success' => true,
            'message' => "Data Riwayat Pelatihan berhasil dihapus"
        ]);
    }

    public function addPendidikanTerakhir(Request $request, $id)
    {

        $biodata = DB::table('tbl_biodata')->where('id_users', $id)->first();

        ModelPendidikanTerakhir::create([
            'jenjang'   => $request->jenjang,
            'nama_institusi' => $request->institusi,
            'jurusan' => $request->jurusan,
            'tahun_lulus' => $request->tahun_lulus,
            'ipk' => $request->ipk,
            'id_biodata' => $biodata->id
        ]);

        return response([
            'status' => true,
            'message' => 'Riwayat Pendidikan Terakahir berhasil ditambahkan'
        ]);
    }

    public function getPendidikanTerakhir($id)
    {
        $biodata = DB::table('tbl_biodata')->where('id_users', $id)->first();

        $data = DB::table('tbl_pendidikan_terakhir')->where('id_biodata', $biodata->id)->get();
        return response([
            'status' => true,
            'data'  => $data
        ]);
    }

    public function deletePendidikanTerakhir($id)
    {
        $pendidikanTerakhir = ModelPendidikanTerakhir::find($id);
        $pendidikanTerakhir->delete();

        return response()->json([
            'success' => true,
            'message' => "Data Pendidikan Terakrhi berhasil dihapus"
        ]);
    }

    public function getRiwayatPekerjaan($id)
    {
        $biodata = DB::table('tbl_biodata')->where('id_users', $id)->first();

        $data = DB::table('tbl_riwayat_pekerjaan')->where('id_biodata', $biodata->id)->get();
        return response([
            'status' => true,
            'data'  => $data
        ]);
    }


    public function addRiwayatPekerjaan(Request $request, $id)
    {
        $biodata = DB::table('tbl_biodata')->where('id_users', $id)->first();

        ModelRiwayatPekerjaan::create([
            'nama_perusahaan' => $request->namaPerusahaan,
            'posisi_terakhir' => $request->posisiTerakhir,
            'pendapatan_terakhir' => $request->pendapatanTerakhir,
            'tahun' => $request->tahunPekerjaan,
            'id_biodata' => $biodata->id,
        ]);
        return response([
            'status' => true,
            'message' => 'Data Riwayat Pekerjaan berhasil ditambahkan'
        ]);
    }

    public function deleteRiwayatPekerjaan($id)
    {
        $riwayatPekerjaan = ModelRiwayatPekerjaan::find($id);
        $riwayatPekerjaan->delete();

        return response()->json([
            'success' => true,
            'message' => "Data Riwayat Pekerjaan berhasil dihapus"
        ]);
    }

    public function getDetailPelamar($id)
    {
        $dataBiodata = DB::table('tbl_biodata')->where('id', $id)->first();
        $dataLowongan = DB::table('tbl_lowongan')->where('id_biodata', $id)->first();

        return response()->json([
            'success' => true,
            'dataBiodata' => $dataBiodata,
            'dataLowongan' => $dataLowongan
        ]);
    }

    public function updateLowongan(Request $request, $id)
    {
        $updateLowongan = ModelBiodata::find($id);
        $updateLowongan->posisi = $request->posisi;
        $updateLowongan->nama = $request->nama;
        $updateLowongan->no_ktp = $request->noKtp;
        $updateLowongan->tempat_lahir = $request->tempatLahir;
        $updateLowongan->tgl_lahir = $request->tglLahir;
        $updateLowongan->jk = $request->jk;
        $updateLowongan->agama = $request->agama;
        $updateLowongan->golongan_darah = $request->golonganDarah;
        $updateLowongan->alamat_tinggal = $request->alamatTinggal;
        $updateLowongan->alamat_ktp = $request->alamatKtp;
        $updateLowongan->telp = $request->telp;
        $updateLowongan->kontak_darurat = $request->kontak_darurat;
        $updateLowongan->save();

        $getDataLowongan = DB::table('tbl_lowongan')->where('id_biodata', $id)->first();
        $updateLowonganSkill = ModelLowongan::find($getDataLowongan->id);
        $updateLowonganSkill->skill = $request->skill;
        $updateLowonganSkill->gaji = $request->gaji;
        $updateLowonganSkill->bersedia_ditempatkan = $request->bersediaDitempatkan;
        $updateLowonganSkill->save();

        return response()->json([
            'success' => true,
            'message' => "Lowongan Pekerjaan berhasil diperbarui"
        ]);
    }
}
