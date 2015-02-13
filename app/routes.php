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

	Route::post('homework/done', [
		'as' => 'homework-done',
		'uses' => 'HomeworkController@setDone'
	]);

	Route::get('homework/add', [
		'as' => 'add-homework',
		'uses' => 'HomeworkController@showAddHomeworkForm'
	]);

	Route::get('homework/{id}/edit', [
		'as' => 'edit-homework',
		'uses' => 'HomeworkController@editForm'
	]);

	Route::put('homework/{id}',[
		'as' => 'store-homework',
		'uses' => 'HomeworkController@store'
	]);

	Route::get('homework/{id}/delete', [
		'as' => 'delete-homework',
		'uses' => 'HomeworkController@delete'
	]);

	Route::delete('homework/{id}',[
		'as' => 'destroy-homework',
		'uses' => 'HomeworkController@destory'
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

	Route::get('comment/edit/{id}', [
		'as' => 'edit-comment',
		'uses' => 'CommentsController@edit'
	]);

	Route::post('comment/update', [
		'as' => 'update-comment',
		'uses' => 'CommentsController@update'
	]);

	Route::get('comment/confirm-delete/{id}', [
		'as' => 'confirm-delete-comment',
		'uses' => 'CommentsController@confirmDelete'
	]);

	Route::post('comment/delete', [
		'as' => 'delete-comment',
		'uses' => 'CommentsController@delete'
	]);

	Route::get('announcement/{id}', [
		'as' => 'announcement',
		'uses' => 'AnnouncementsController@view'
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

	Route::get('forgot-password', [
		'as' => 'forgot-password',
		'uses' => 'PasswordResetController@usernameForm'
	]);

	Route::post('forgot-password', [
		'as' => 'forgot-password',
		'uses' => 'PasswordResetController@usernameCheck'
	]);

	Route::get('secret-question',[
		'as' => 'secret-question',
		'uses' => 'PasswordResetController@secretQuestion'
	]);

	Route::post('secret-question', [
		'as' => 'submit-secret-question',
		'uses' => 'PasswordResetController@answerQuestion'
	]);

	Route::get('change-password', [
		'as' => 'change-password',
		'uses' => 'PasswordResetController@changePassword'
	]);

	Route::post('change-password', [
		'as' => 'submit-change-password',
		'uses' => 'PasswordResetController@submitNewPassword'
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

		Route::get('announcement/new', [
			'as' => 'admin-announcement.add',
			'uses' => 'AnnouncementController@add'
		]);

		Route::post('announcement/create', [
			'as' => 'admin-announcement.create',
			'uses' => 'AnnouncementController@create'
		]);

		Route::get('announcement/show/{id}', [
			'as' => 'admin-announcement.show',
			'uses' => 'AnnouncementController@show',
		]);

		Route::get('announcement/edit/{id}', [
			'as' => 'admin-announcement.edit',
			'uses' => 'AnnouncementController@edit',
		]);

		Route::post('announcement/update',[
			'as' => 'admin-announcement.update',
			'uses' => 'AnnouncementController@update'
		]);

		Route::get('announcement/confirm-delete/{id}', [
			'as' => 'admin-announcement.confirm-delete',
			'uses' => 'AnnouncementController@confirmDelete'
		]);

		Route::post('announcement/delete', [
			'as' => 'admin-announcement.delete',
			'uses' => 'AnnouncementController@delete'
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

		Route::get('comments/confirm-delete/{id}', [
			'as' => 'admin-comments.confirm-delete',
			'uses' => 'CommentsController@confirmDelete'
		]);

		Route::post('comments/delete', [
			'as' => 'admin-comments.delete',
			'uses' => 'CommentsController@delete'
		]);

		Route::get('comments', [
			'as' => 'admin-comments.view',
			'uses' => 'CommentsController@view'
		]);

		Route::resource('subject', 'SubjectController');
});
