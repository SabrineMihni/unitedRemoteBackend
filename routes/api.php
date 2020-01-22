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



Route::namespace('API')->prefix('v10')->group( function(){

    Route::post('login', 'UserController@login');
    Route::post('register', 'UserController@register');
});


Route::prefix('v10')->namespace('API\V10')->middleware(['auth', 'api'])->group( function(){
    // Controllers Within The "App\Http\Controllers\API" Namespace

    Route::get('trending-languages', 'GithubReposController@getLanguages');

});


