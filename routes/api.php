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

    Route::get('ren/downloadpkpt/pdf', 'Ren\PkptController@downloadPkptPdf');
    Route::get('test', 'Ren\PkptController@test');

    // Route After Login
    Route::group(['middleware' => ['auth:api']], function () {
        Route::post('changepassword', 'ChangePasswordController@changePassword');
        Route::post('logout', 'AuthController@logout');
        Route::get('profile', 'ProfileController@profile');

        // User Management
        Route::resource('usermanagement', 'User\UserManagementController');

        // Options
        Route::get('options/kodeunitobrik', 'Options\OptionsController@kodeunitobrik');
        Route::get('options/bidangobrik', 'Options\OptionsController@bidangobrik');
        Route::get('options/subbidangobrik', 'Options\OptionsController@subbidangobrik');
        Route::get('options/subunitaudit', 'Options\OptionsController@subunitaudit');
        Route::get('options/gruplingkupaudit', 'Options\OptionsController@gruplingkupaudit');
        Route::get('options/kodelingkupaudit', 'Options\OptionsController@kodelingkupaudit');
        Route::get('options/jenispengawasan', 'Options\OptionsController@jenispengawasan');
        Route::get('options/areapengawasan', 'Options\OptionsController@areapengawasan');
        Route::get('options/tingkatresiko', 'Options\OptionsController@tingkatresiko');
        Route::get('options/optionjakwas', 'Options\OptionsController@optionjakwas');

        Route::get('options/usersperan', 'Options\OptionsController@optionusersperan');
        Route::get('options/perantim', 'Options\OptionsController@optionperantim');
        Route::get('options/unitaudit', 'Options\OptionsController@optionunitaudit');
        Route::get('options/jenisanggaran', 'Options\OptionsController@optionjenisanggaran');
        Route::get('options/jenisobrik', 'Options\OptionsController@optionjenisobrik');
        Route::get('options/provinsi', 'Options\OptionsController@optionprovinsi');
        Route::get('options/kabkota', 'Options\OptionsController@optionkabkota');
        Route::get('options/kecamatan', 'Options\OptionsController@optionkecamatan');
        Route::get('options/kelurahan', 'Options\OptionsController@optionkelurahan');
        Route::get('options/datapegawai', 'Options\OptionsController@optiondatapegawai');

        // Wilayah
        Route::resource('provinsi', 'Masterdata\KodeProvinsiController');
        Route::resource('kabkota', 'Masterdata\KodeKabkotaController');
        Route::resource('kecamatan', 'Masterdata\KodeKecamatanController');
        Route::resource('kelurahan', 'Masterdata\KodeKelurahanController');
        Route::get('searchkelurahan', 'Masterdata\KodeKelurahanController@searchKelurahan');

        // References
        Route::resource('users-peran', 'UsersPeranController');
        Route::resource('peran-tim', 'Masterdata\KodePeranController');
        Route::resource('unitaudit', 'Masterdata\KodeUnitAuditController');
        Route::post('unitauditlogo', 'Masterdata\KodeUnitAuditController@uploadLogo');
        Route::resource('subunitaudit', 'Masterdata\KodeSubUnitAuditController');
        Route::resource('jenisanggaran', 'Masterdata\KodeJenisAnggaranController');
        Route::resource('jenisobrik', 'Masterdata\KodeJenisObrikController');
        Route::resource('gruplingkupaudit', 'Masterdata\KodeGrupLingkupAuditController');
        Route::resource('kodelingkupaudit', 'Masterdata\KodeLingkupAuditController');
        Route::resource('unitobrik', 'Masterdata\KodeUnitObrikController');
        Route::resource('bidangobrik', 'Masterdata\KodeBidangObrikController');
        Route::resource('subbidangobrik', 'Masterdata\KodeSubBidangObrikController');
        Route::resource('jenispengawasan', 'Masterdata\KodeJenisPengawasanController');
        Route::resource('areapengawasan', 'Masterdata\KodeAreaPengawasanController');
        Route::resource('tingkatresiko', 'Masterdata\KodeTingkatResikoController');

        // Data Pegawai
        Route::resource('datapegawai', 'Masterdata\DataPegawaiController');
        Route::get('datapegawaiinactive', 'Masterdata\DataPegawaiController@pegawaiInactive');
        Route::patch('activatepegawai/{id}', 'Masterdata\DataPegawaiController@activatePegawai');

        // Jakwas
        Route::resource('ren/jakwas', 'Ren\JakwasController');
        Route::get('ren/datajakwasinactive', 'Ren\JakwasController@jakwasInactive');
        Route::patch('ren/activatejakwas/{id}', 'Ren\JakwasController@activateJakwas');

        // PKPT
        Route::resource('ren/pkpt', 'Ren\PkptController');
        Route::get('ren/datapkptinactive', 'Ren\PkptController@pkptInactive');
        Route::patch('ren/activatepkpt/{id}', 'Ren\PkptController@activatePkpt');
        Route::get('ren/searchpkpt', 'Ren\PkptController@search');
        Route::get('ren/downloadpkpt', 'Ren\PkptController@downloadPkpt');

        // PKAU
        Route::resource('ren/pkau', 'Ren\PkauController');
        Route::get('ren/datapkauinactive', 'Ren\PkauController@pkauInactive');
        Route::patch('ren/activatepkau/{id}', 'Ren\PkauController@activatePkau');
        Route::get('ren/searchpkau', 'Ren\PkauController@search');
        Route::get('ren/downloadpkau', 'Ren\PkauController@downloadPkau');

        // REPORT
        Route::get('ren/report', 'Ren\Report\ReportController@index');

        // UPLOAD FILE
        Route::post('uploadfile', 'UploadFileController@upload');
    });
});
