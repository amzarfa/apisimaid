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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['middleware' => ['cors']], function () {
    // Route untuk login
    Route::post('login', 'AuthController@login');
    Route::post('reset-link', 'AuthController@sendResetEmail');
    Route::post('set-new-password', 'AuthController@setNewPassword');

    Route::group(['middleware' => ['auth:api']], function () {
        Route::post('logout', 'AuthController@logout');
        Route::get('profile', 'ProfileController@profile');
        Route::resource('users-peran', 'UsersPeranController');
    });
});
