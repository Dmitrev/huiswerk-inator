<?php

# Custom validation rules
require app_path().'/validators.php';

# Custom patterns
require app_path().'/patterns.php';


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
	]);

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

	Route::get('account/password', [
		'as' => 'account-password',
		'uses' => 'AccountController@showPasswordAccountForm'
	]);

	Route::post('account/password', [
		'as' => 'change-account-password',
		'uses' => 'AccountController@changeAccountPassword'
	]);

	Route::get('account-security', [
		'as' => 'account-security',
		'uses' => 'AccountController@showSecurityAccountForm'
	]);

	Route::post('account-security', [
		'as' => 'change-account-security',
		'uses' => 'AccountController@changeAccountSecurity'
	]);


	Route::post('comment', [
			'as' => 'new-comment',
			'uses' => 'CommentsController@post'
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

Route::group([
		'prefix' => 'admin',
		'before' => 'admin',
		'namespace' => 'Admin']
		, function(){

	Route::get('/', [
			'as' => 'admin-dashboard',
			'uses' => 'DashboardController@view'
		]);


		Route::post('users/delete', [
			'as' => 'admin-users.delete',
			'uses' => 'UsersController@delete'
		]);

		Route::get('users/confirm-delete/{id}',[
			'as' => 'admin-users.confirm-delete',
			'uses' => 'UsersController@confirmDelete',
		]);

		Route::get('users/show/{id}', [
				'as' => 'admin-users.show',
				'uses' => 'UsersController@show'
			]);

		Route::get('users/edit/{id}', [
				'as' => 'admin-users.edit',
				'uses' => 'UsersController@edit'
			]);

		Route::post('users/edit', [
				'as' => 'admin-users.save',
				'uses' => 'UsersController@save'
		]);

		Route::get('users', [
			'as' => 'admin-users.view',
			'uses' => 'UsersController@view'
		]);


		Route::get('homework', [
			'as' => 'admin-homework.view',
			'uses' => 'HomeworkController@view'
		]);

		Route::get('homework/show/{id}', [
			'as' => 'admin-homework.show',
			'uses' => 'HomeworkController@show'
		]);

		Route::get('homework/edit/{id}', [
			'as' => 'admin-homework.edit',
			'uses' => 'HomeworkController@edit'
		]);

		Route::post('homework/edit', [
			'as' => 'admin-homework.save',
			'uses' => 'HomeworkController@save'
		]);

		Route::get('homework/confirm-delete/{id}', [
			'as' => 'admin-homework.confirm-delete',
			'uses' => 'HomeworkController@confirmDelete'
		]);

		Route::post('homework/delete', [
			'as' => 'admin-homework.delete',
			'uses' => 'HomeworkController@delete'
		]);

		Route::get('comments/show/{id}', [
			'as' => 'admin-comments.show',
			'uses' => 'CommentsController@show'
			]);

		Route::get('comments/edit/{id}', [
			'as' => 'admin-comments.edit',
			'uses' => 'CommentsController@edit'
		]);

		Route::post('comments/edit', [
			'as' => 'admin-comments.save',
			'uses' => 'CommentsController@save'
		]);

		Route::get('comments', [
			'as' => 'admin-comments.view',
			'uses' => 'CommentsController@view'
		]);
});
