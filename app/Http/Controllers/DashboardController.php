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
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function index()
    {
        if (Session::get('login') == false) {
            return redirect('/');
        }
        if (Session::get('admin') == true && Session::get('login') == true) {
            $data['dataPelamar'] = DB::table('tbl_biodata')
                ->select('nama', 'posisi', 'tempat_lahir', 'tgl_lahir', 'id_biodata', 'id_users')
                ->leftJoin('tbl_lowongan', 'tbl_biodata.id', '=', 'tbl_lowongan.id_biodata')
                ->get();
            return view('dashboard-admin', $data);
        } else if (Session::get('admin') == false && Session::get('login') == true) {
            return view('dashboard');
        }
    }

    public function addLowongan(Request $request)
    {
        $idUsers = Session::get('dataUsers')->id;
        $biodata = DB::table('tbl_biodata')->where('id_users', $idUsers)->first();
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

        Session::flash('message', 'Lowongan Pekerjaan berhasil ditambahkan.');
        Session::flash('icon', 'success');
        return redirect()->back();
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

        Session::flash('message', 'Lowongan Pekerjaan berhasil diperbarui.');
        Session::flash('icon', 'success');
        return redirect()->back();
    }

    public function addPendidikanTerakhir(Request $request)
    {

        $idUsers = Session::get('dataUsers')->id;
        $biodata = DB::table('tbl_biodata')->where('id_users', $idUsers)->first();

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
            'message' => 'data berhasil disimpan'
        ]);
    }

    public function getPendidikanTerakhir()
    {
        $idUsers = Session::get('dataUsers')->id;
        $biodata = DB::table('tbl_biodata')->where('id_users', $idUsers)->first();

        $data = DB::table('tbl_pendidikan_terakhir')->where('id_biodata', $biodata->id)->get();
        return response([
            'status' => true,
            'data'  => $data
        ]);
    }
    public function getPendidikanTerakhirById($id)
    {

        $data = DB::table('tbl_pendidikan_terakhir')->where('id_biodata', $id)->get();
        return response([
            'status' => true,
            'data'  => $data
        ]);
    }

    public function addRiwayatPelatihan(Request $request)
    {
        $idUsers = Session::get('dataUsers')->id;
        $biodata = DB::table('tbl_biodata')->where('id_users', $idUsers)->first();

        ModelRiwayatPelatihan::create([
            'nama_kursus' => $request->namaKursus,
            'sertifikat' => $request->sertifikat,
            'tahun' => $request->tahunPelatihan,
            'id_biodata' => $biodata->id
        ]);
        return response([
            'status' => true,
            'message' => 'data berhasil disimpan'
        ]);
    }

    public function getRiwayatPelatihan()
    {
        $idUsers = Session::get('dataUsers')->id;
        $biodata = DB::table('tbl_biodata')->where('id_users', $idUsers)->first();

        $data = DB::table('tbl_riwayat_pelatihan')->where('id_biodata', $biodata->id)->get();
        return response([
            'status' => true,
            'data'  => $data
        ]);
    }
    public function getRiwayatPelatihanById($id)
    {
        $data = DB::table('tbl_riwayat_pelatihan')->where('id_biodata', $id)->get();
        return response([
            'status' => true,
            'data'  => $data
        ]);
    }

    public function addRiwayatPekerjaan(Request $request)
    {
        $idUsers = Session::get('dataUsers')->id;
        $biodata = DB::table('tbl_biodata')->where('id_users', $idUsers)->first();

        ModelRiwayatPekerjaan::create([
            'nama_perusahaan' => $request->namaPerusahaan,
            'posisi_terakhir' => $request->posisiTerakhir,
            'pendapatan_terakhir' => $request->pendapatanTerakhir,
            'tahun' => $request->tahunPekerjaan,
            'id_biodata' => $biodata->id,
        ]);
        return response([
            'status' => true,
            'message' => 'data berhasil disimpan'
        ]);
    }

    public function updateRiwayatPekerjaan(Request $request)
    {
        ModelRiwayatPekerjaan::create([
            'nama_perusahaan' => $request->namaPerusahaan,
            'posisi_terakhir' => $request->posisiTerakhir,
            'pendapatan_terakhir' => $request->pendapatanTerakhir,
            'tahun' => $request->tahunPekerjaan,
            'id_biodata' => $request->idBiodata,
        ]);
        return response([
            'status' => true,
            'message' => 'data berhasil disimpan'
        ]);
    }

    public function updateRiwayatPelatihan(Request $request)
    {
        ModelRiwayatPelatihan::create([
            'nama_kursus' => $request->namaKursus,
            'sertifikat' => $request->sertifikat,
            'tahun' => $request->tahunPelatihan,
            'id_biodata' => $request->idBiodata
        ]);
        return response([
            'status' => true,
            'message' => 'data berhasil disimpan'
        ]);
    }

    public function updatePendidikanTerakhir(Request $request)
    {
        ModelPendidikanTerakhir::create([
            'jenjang'   => $request->jenjang,
            'nama_institusi' => $request->institusi,
            'jurusan' => $request->jurusan,
            'tahun_lulus' => $request->tahun_lulus,
            'ipk' => $request->ipk,
            'id_biodata' => $request->idBiodata
        ]);

        return response([
            'status' => true,
            'message' => 'data berhasil disimpan'
        ]);
    }

    public function getRiwayatPekerjaan()
    {
        $idUsers = Session::get('dataUsers')->id;
        $biodata = DB::table('tbl_biodata')->where('id_users', $idUsers)->first();

        $data = DB::table('tbl_riwayat_pekerjaan')->where('id_biodata', $biodata->id)->get();
        return response([
            'status' => true,
            'data'  => $data
        ]);
    }
    public function getRiwayatPekerjaanById($id)
    {

        $data = DB::table('tbl_riwayat_pekerjaan')->where('id_biodata', $id)->get();
        return response([
            'status' => true,
            'data'  => $data
        ]);
    }

    public function getDetailPelamar($id)
    {
        $databiodata = DB::table('tbl_biodata')->where('id', $id)->first();
        $dataLowongan = DB::table('tbl_lowongan')->where('id_biodata', $id)->first();
        $dataRiwayatPekerjaan = DB::table('tbl_riwayat_pekerjaan')->where('id_biodata', $id)->get();
        $dataRiwayatPelatihan = DB::table('tbl_riwayat_pelatihan')->where('id_biodata', $id)->get();
        $dataPendidikanTerakhir = DB::table('tbl_pendidikan_terakhir')->where('id_biodata', $id)->get();

        return response([
            'dataBiodata' => $databiodata,
            'dataLowongan' => $dataLowongan,
            'dataRiwayatPekerjaan' => $dataRiwayatPekerjaan,
            'dataRiwayatPelatihan' => $dataRiwayatPelatihan,
            'dataPendidikanTerakhir' => $dataPendidikanTerakhir,
        ]);
    }

    public function formUpdateLamaran($id)
    {
        $data['dataBiodata'] = DB::table('tbl_biodata')->where('id', $id)->first();
        $data['dataLowongan'] = DB::table('tbl_lowongan')->where('id_biodata', $id)->first();
        $data['dataRiwayatPekerjaan'] = DB::table('tbl_riwayat_pekerjaan')->where('id_biodata', $id)->get();
        $data['dataRiwayatPelatihan'] = DB::table('tbl_riwayat_pelatihan')->where('id_biodata', $id)->get();
        $data['dataPendidikanTerakhir'] = DB::table('tbl_pendidikan_terakhir')->where('id_biodata', $id)->get();

        return view('form-update', $data);
    }

    public function deleteLowongan($id)
    {
        $dataUsers =  ModelUsers::find($id);
        $dataUsers->delete();
        Session::flash('message', 'Data Pelamar berhasil dihapus.');
        Session::flash('icon', 'success');
        return redirect()->back();
    }

    public function dataPelamar()
    {
        $idUsers = Session::get('dataUsers')->id;
        $biodata = DB::table('tbl_biodata')->where('id_users', $idUsers)->first();
        $data['dataPelamar'] = DB::table('tbl_biodata')
            ->select('nama', 'posisi', 'tempat_lahir', 'tgl_lahir', 'id_biodata', 'id_users')
            ->leftJoin('tbl_lowongan', 'tbl_biodata.id', '=', 'tbl_lowongan.id_biodata')
            ->where('tbl_biodata.id',$biodata->id)
            ->get();
        return view('profil', $data);
    }
}
