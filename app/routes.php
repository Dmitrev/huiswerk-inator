<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', [
	'as' 	=> 'home',
	'uses' 	=>'HomeController@showHomework'
]);

Route::get('login', [
	'as' 	=> 'login',
	'uses' 	=> 'AuthController@showLoginForm'
]);

Route::post('login', [
	'as' 	=> 'validate',
	'uses' 	=> 'AuthController@submitLoginCredentials'
]);


Route::get('logout', [
	'as' 	=> 'logout',
	'uses'	=> 'AuthController@logoutUser'
]);