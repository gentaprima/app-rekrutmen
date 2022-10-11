<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::post('/auth','ApiController@auth');
Route::post('/sign-up','ApiController@signUp');

Route::group(['middleware' => ['jwt.verify']],function(){
    Route::get('/get-data-pelamar','ApiController@getDataPelamar');
    Route::get('/get-data-pelamar-by-id/{id}','ApiController@getDataPelamarById');
    Route::post('/add-lowongan/{id}','ApiController@addLowongan');
    Route::delete('/delete-lowongan/{id}','ApiController@deleteLowongan');
    Route::get('/get-detail-pelamar/{id}','ApiController@getDetailPelamar');
    Route::post('/update-lowongan/{id}','ApiController@updatelowongan');

    Route::post('/add-riwayat-pelatihan/{id}','ApiController@addRiwayatPelatihan');
    Route::get('/get-riwayat-pelatihan/{id}','ApiController@getRiwayatPelatihan');
    Route::delete('/delete-riwayat-pelatihan/{id}','ApiController@deleteRiwayatPelatihan');
    // Route::put('/update-riwayat-pelatihan/{id}','ApiController@updateRiwayatPelatihan');

    Route::get('/get-pendidikan-terakhir/{id}','ApiController@getPendidikanTerakhir');
    Route::post('/add-pendidikan-terakhir/{id}','ApiController@addPendidikanTerakhir');
    Route::delete('/delete-pendidikan-terakhir/{id}','ApiController@deletePendidikanTerakhir');

    Route::post('/add-riwayat-pekerjaan/{id}','ApiController@addRiwayatPekerjaan');
    Route::get('/get-riwayat-pekerjaan/{id}','ApiController@getRiwayatPekerjaan');
    Route::delete('/delete-riwayat-pekerjaan/{id}','ApiController@deleteRiwayatPekerjaan');
    
});
