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

Route::get('/login',function()
{
	return View::make('/login');
});

// TODO: Okay, let's figure out what to do, should we move stuff to AuthController or keep
// in UserController generated by Confide?
Route::post('/login', 'AuthController@adminLogin');

/**
 * API Grouping routes
 */
Route::group(array('prefix' => 'api/v1','before' => 'auth.api'), function() {
	Route::get('/test',function() { return ['success' => 1];});
	// TODO: Okay, let's figure out what to do, should we move stuff to AuthController or keep
	// in UserController generated by Confide?
	Route::post('/login', 'AuthController@apiLogin');
	Route::resource('users', 'api\v1\UserController');
});

/**
 * Admin routes
 */
Route::group(array('prefix' => 'admin', 'before' => 'auth'), function() {


	Route::get('/',function()
	{
		return View::make('admin/index');
	});

	Route::resource('users', 'admin\UserController');

	//Route::get('users/login', 'UserController@login');
	//Route::post('user/login', 'UserController@do_login');
	Route::get('user/confirm/{code}', 'UserController@confirm');
	Route::get('user/forgot_password', 'UserController@forgot_password');
	Route::post('user/forgot_password', 'UserController@do_forgot_password');
	Route::get('user/reset_password/{token}', 'UserController@reset_password');
	Route::post('user/reset_password', 'UserController@do_reset_password');
	Route::get('user/logout', 'UserController@logout');

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



// Confide routes
/*
Route::get( 'user/create',                 'UserController@create');
Route::post('user',                        'UserController@store');
Route::get( 'user/login',                  'UserController@login');
Route::post('user/login',                  'UserController@do_login');
Route::get( 'user/confirm/{code}',         'UserController@confirm');
Route::get( 'user/forgot_password',        'UserController@forgot_password');
Route::post('user/forgot_password',        'UserController@do_forgot_password');
Route::get( 'user/reset_password/{token}', 'UserController@reset_password');
Route::post('user/reset_password',         'UserController@do_reset_password');
Route::get( 'user/logout',                 'UserController@logout');
*/
