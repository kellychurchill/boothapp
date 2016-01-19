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
    return view('welcome');
});
Route::get('/dashboard', ['middleware' => 'auth', function () {
    return view('dashboard');
}]);

Route::get('/booths', 'BoothController@index');
Route::get('/booth/{booth}', 'BoothController@store');
Route::post('/booths', 'BoothController@updateBooths');
Route::delete('/booth/{booth}', 'BoothController@destroy');

Route::get('/available', 'AvailableController@index');
Route::put('/available/{booth}', 'AvailableController@takeBooth');

Route::get('/locations', 'LocationsController@index');
Route::get('/reports', 'ReportsController@index');

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::controllers([
   'password' => 'Auth\PasswordController',
]);
