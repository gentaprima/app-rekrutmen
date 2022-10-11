<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// AUTH
Route::get('/', 'AuthController@index');
Route::get('/sign-up','AuthController@signUp');
Route::post('/process-sign-up','AuthController@proccessSignUp');
Route::post('/process-login','AuthController@processLogin');
Route::get('/logout', function () {
    Session::flush();
    return redirect('/');
});

// Lowongan
Route::post('/add-lowongan','DashboardController@addLowongan');
Route::post('/update-lowongan/{id}','DashboardController@updateLowongan');

// Pendidikan Terakhir
Route::post('/add-pendidikan-terakhir','DashboardController@addPendidikanTerakhir');
Route::post('/update-pendidikan-terakhir','DashboardController@updatePendidikanTerakhir');
Route::get('/get-pendidikan-terakhir','DashboardController@getPendidikanTerakhir');
Route::get('/get-pendidikan-terakhir/{id}','DashboardController@getPendidikanTerakhirById');

// Riwayat Pendidikan
Route::post('/add-riwayat-pelatihan','DashboardController@addRiwayatPelatihan');
Route::post('/update-riwayat-pelatihan','DashboardController@updateRiwayatPelatihan');
Route::get('/get-riwayat-pelatihan','DashboardController@getRiwayatPelatihan');
Route::get('/get-riwayat-pelatihan/{id}','DashboardController@getRiwayatPelatihanById');

// Riwayat Pekerjaan
Route::post('/add-riwayat-pekerjaan','DashboardController@addRiwayatPekerjaan');
Route::post('/update-riwayat-pekerjaan','DashboardController@updateRiwayatPekerjaan');
Route::get('/get-riwayat-pekerjaan','DashboardController@getRiwayatPekerjaan');
Route::get('/get-riwayat-pekerjaan/{id}','DashboardController@getRiwayatPekerjaanById');

Route::get('/get-detail-pelamar/{id}','DashboardController@getDetailPelamar');
Route::get('/form-update-lamaran/{id}','DashboardController@formUpdateLamaran');
Route::get('/delete-lowongan/{id}','DashboardController@deleteLowongan');

// Route::get('/data-pelamar','DashboardController@dataPelamar');
Route::get('/data-pelamar/{id}','DashboardController@dataPelamar');

Route::get('/dashboard','DashboardController@index');
Route::get('/dashboard-admin','DashboardController@indexAdmin');