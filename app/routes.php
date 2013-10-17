<?php

Route::model('user', 'User');

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

/**
 * Controller routes
 */
Route::get('/',function()
{
	return Redirect::to('/admin');
});

/*Route::get('/login',function()
{
	return View::make('/login');
});*/

Route::get('/login', 'AdminUserController@login');

Route::post('/login', 'AdminUserController@do_login');

/**
 * API Grouping routes
 */
Route::group(array('prefix' => 'api/v1','before' => 'auth.api'), function() {
	Route::post('/login', 'ApiV1UserController@login');

	// NEED VALID TOKEN BEFORE ALLOWING THESE ROUTES
	Route::group(array('before' => 'auth.token'), function() {
		Route::resource('users', 'ApiV1UserController');
		Route::any('/logout','ApiV1UserController@logout');
	});


});

/**
 * Admin routes
 */
Route::group(array('prefix' => 'admin', 'before' => 'auth'), function() {


	Route::get('/',function()
	{
		return View::make('admin/index');
	});

	Route::resource('users', 'AdminUserController');

	//Route::get('users/login', 'AdminUserController@login');
	//Route::post('users/login', 'AdminUserController@do_login');
	Route::get('users/confirm/{code}', 'AdminUserController@confirm');
	Route::get('users/forgot_password', 'AdminUserController@forgot_password');
	Route::post('users/forgot_password', 'AdminUserController@do_forgot_password');
	Route::get('users/reset_password/{token}', 'AdminUserController@reset_password');
	Route::post('users/reset_password', 'AdminUserController@do_reset_password');
	Route::get('users/logout', 'AdminUserController@logout');

/*
	Route::get('/users/',function()
	{
		return View::make('admin/users/index');
	});

	Route::get('/users/profile',function()
	{
		return View::make('admin/users/user');
	});

*/
});

/**
 * View routes
 */
Route::get('/login',function()
{
	return View::make('/login');
});
