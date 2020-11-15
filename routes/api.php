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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('tugas','ApiController@tugas');
Route::post('register','API\Auth\AuthController@register');
Route::post('login','API\Auth\AuthController@login');

Route::group(['prefix'=>'tugas'],function(){
    Route::group(['middleware' => 'auth:api'], function(){
        Route::post('tambah','API\Tugas\TugasController@store');
        Route::post('update','API\Tugas\TugasController@update');
        Route::get('read','API\Tugas\TugasController@getAll');
        Route::post('delete ','API\Tugas\TugasController@destroy');
    });
});


