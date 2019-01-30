<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// List Doctors
Route::get('doctors', 'DoctorController@index');

// List single Doctor
Route::get('doctor/{id}', 'DoctorController@show');

// Create new doctor
Route::post('doctor','DoctorController@store');

// Update doctor
Route::put('doctor', 'DoctorController@store');

// Delete Doctor
Route::delete('doctor/{id}', 'DoctorController@destroy');
