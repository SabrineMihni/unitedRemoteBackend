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



Route::namespace('API')->prefix('v10')->group([], function(){

    Route::post('login', 'UserController@login');
    Route::post('register', 'UserController@register');
});


Route::namespace('API/V10')->prefix('v10')->group(['middleware' => 'auth:api'], function(){
    // Controllers Within The "App\Http\Controllers\API" Namespace
    Route::post('details', 'UserController@details');

});


