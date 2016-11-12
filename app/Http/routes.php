<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return redirect('home');
});
Route::get('logout', function () {
    Auth::logout();
    return view('auth.login');
});

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');
//routes that require login

Route::group(['middleware' => 'auth'], function (){
Route::get('home', 'autoController@index');


Route::resource('auto', 'autoController');
Route::post('venta', 'autoController@venta');
Route::get('api/{query?}', 'autoController@api');

Route::get('pdf/{array}', 'autoController@pdf');
});