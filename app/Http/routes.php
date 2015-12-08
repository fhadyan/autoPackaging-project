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
//Route::get('/', 'Auth\AuthController@redirectUser');
Route::get('/', 'UserController@redirectUser');
Route::get('order/addProduct/{id}/{amount}', 'OrderController@addProduct');

Route::resource('product', 'ProductController');
Route::resource('consumer', 'ConsumerController');
Route::resource('supir', 'SupirController');
Route::resource('user', 'UserController');
Route::resource('box', 'BoxController');
Route::resource('order', 'OrderController');
Route::resource('packaging', 'PackagingController');
Route::resource('letter', 'LetterController');

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');