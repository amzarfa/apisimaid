<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group(['middleware' => ['cors']], function () {
    // Route untuk login
    Route::post('login', 'AuthController@login');
    Route::post('reset-link', 'AuthController@sendResetEmail');
    Route::post('set-new-password', 'AuthController@setNewPassword');

    // Route After Login
    Route::group(['middleware' => ['auth:api']], function () {
        Route::post('logout', 'AuthController@logout');
        Route::get('profile', 'ProfileController@profile');

        // References
        Route::resource('users-peran', 'UsersPeranController');
        Route::resource('peran-tim', 'Masterdata\KodePeranController');

        // Wilayah
        Route::resource('provinsi', 'Masterdata\KodeProvinsiController');
        Route::resource('kabkota', 'Masterdata\KodeKabkotaController');
        Route::resource('kecamatan', 'Masterdata\KodeKecamatanController');
        Route::resource('kelurahan', 'Masterdata\KodeKelurahanController');
        Route::get('/searchkelurahan', 'Masterdata\KodeKelurahanController@searchKelurahan');

        Route::resource('unitaudit', 'Masterdata\KodeUnitAuditController');
        Route::resource('subunitaudit', 'Masterdata\KodeSubUnitAuditController');
        Route::resource('jenisanggaran', 'Masterdata\KodeJenisAnggaranController');
        Route::resource('jenisobrik', 'Masterdata\KodeJenisObrikController');
        Route::resource('gruplingkupaudit', 'Masterdata\KodeGrupLingkupAuditController');
        Route::resource('kodelingkupaudit', 'Masterdata\KodeLingkupAuditController');

        Route::resource('unitobrik', 'Masterdata\KodeUnitObrikController');
        Route::resource('bidangobrik', 'Masterdata\KodeBidangObrikController');
        Route::resource('subbidangobrik', 'Masterdata\KodeSubBidangObrikController');
    });
});
