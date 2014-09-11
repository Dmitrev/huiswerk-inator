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

Route::group( ['before' => 'auth'] , function(){
	
	Route::get('/', [
		'as' 	=> 'home',
		'uses' 	=>'HomeController@showHomework'
	]);
	
	
	Route::get('logout', [
		'as' 	=> 'logout',
		'uses'	=> 'AuthController@logoutUser'
	]);
	
	Route::get('homework/{id}', [
		'as' => 'homework',
		'uses' => 'HomeworkController@showItem'
	])->where('id', '[0-9]+');
	
	Route::get('homework/add', [
		'as' => 'add-homework',
		'uses' => 'HomeworkController@showAddHomeworkForm'
	]);
	
	Route::post('homework/add', [
		'as' => 'create-homework',
		'uses' => 'HomeworkController@createHomework'
	]);
	
	Route::get('account', [
		'as' => 'account',
		'uses' => 'AccountController@mainView'
	]);
	
	Route::get('account/general', [
		'as' => 'account-general',
		'uses' => 'AccountController@showGeneralAccountForm'
	]);
	
	Route::post('account/general', [
		'as' => 'save-general-account-settings',
		'uses' => 'AccountController@saveGeneralAccountChanges'
	]);
	
	Route::get('account/general', [
		'as' => 'account-general',
		'uses' => 'AccountController@showGeneralAccountForm'
	]);
	
	
});

Route::group( ['before' => 'guest'] , function(){
	
	
	Route::get('login', [
		'as' 	=> 'login',
		'uses' 	=> 'AuthController@showLoginForm'
	]);
	
	Route::post('login', [
		'as' 	=> 'validate',
		'uses' 	=> 'AuthController@submitLoginCredentials'
	]);
	
	Route::get('register', [
		'as' => 'create-account',
		'uses' => 'RegisterController@showRegisterForm'
	]);
	
	Route::post('register', [
		'as' => 'store-account',
		'uses' => 'RegisterController@storeNewAccount'
	]);

});

/* Custom validation */
Validator::extend('valid_date', 'DateValidator@validDate');