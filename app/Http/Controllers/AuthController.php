<?php

namespace App\Http\Controllers;

use App\Models\ModelBiodata;
use App\Models\ModelUsers;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{

    public function __construct()
    {
        $this->guard = "api"; 
    }

    public function index()
    {
        if (Session::get('login') == true) {
            return redirect('/dashboard');
        } else {
            return view('login');
        }
    }

    public function signUp()
    {
        return view('sign-up');
    }

    // public function proccessSignUp(Request $request)
    // {

    //     if ($request->password != $request->confirmPassword) {
    //         Session::flash('message', 'Mohon maaf, Konfirmasi Password tidak sama dengan Password.');
    //         Session::flash('icon', 'error');
    //         return redirect()->back();
    //     }

    //     ModelUsers::create([
    //         'email' => $request->email,
    //         'password' => Hash::make($request->password),
    //         'role' => 0
    //     ]);

    //     $dataUsers = DB::table('tbl_users')->orderBy('id', 'desc')->first();
    //     ModelBiodata::create([
    //         'id_users' => $dataUsers->id
    //     ]);

    //     Session::flash('message', 'Pendaftaran akun berhasil dilakukan.');
    //     Session::flash('icon', 'success');
    //     return redirect()->back();
    // }

    // public function processLogin(Request $request)
    // {
    //     $apiUrl = env("API_URL",'http://localhost:8000/api/');
       
    
    //     $response = Http::get($apiUrl.'get-data-pelamar')->body();
    //     dd($response);

    //     // $response = Http::post($ap)

    //     // if ($checkUsers->role == 1) {
    //     //     // Session::put('dataUsers', $checkUsers);
    //     //     // Session::put('login', true);
    //     //     // Session::put('admin', true);
    //     //     // return redirect('/dashboard');
    //     //     return response()->json([
    //     //         'success' => true,
    //     //         'token' => $token,
    //     //         'dataUsers' => $checkUsers
    //     //     ]);
    //     // } else {
    //     //     // Session::put('dataUsers', $checkUsers);
    //     //     // Session::put('login', true);
    //     //     // Session::put('admin', false);
    //     //     // return redirect('/dashboard');
    //     //     return response()->json([
    //     //         'success' => true,
    //     //         'token' => $token,
    //     //         'dataUsers' => $checkUsers
    //     //     ]);
    //     // }
    // }
}
