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
        return view('dashboard');
    }
    public function indexAdmin()
    {
        $data['dataPelamar'] = DB::table('tbl_biodata')
            ->select('nama', 'posisi', 'tempat_lahir', 'tgl_lahir', 'id_biodata', 'id_users')
            ->leftJoin('tbl_lowongan', 'tbl_biodata.id', '=', 'tbl_lowongan.id_biodata')
            ->get();
        return view('dashboard-admin', $data);
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
       
        $data['idBiodata'] = $id;
        $data['detail'] = DB::table('tbl_biodata')->where('id',$id)->first();
        return view('form-update',$data);
    }

    
    
    public function dataPelamar($id)
    {
        
        return view('profil');
    }
}
