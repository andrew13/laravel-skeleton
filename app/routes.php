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

Route::post('/login', 'AuthController@adminLogin');

/**
 * API Grouping routes
 */
Route::group(array('prefix' => 'api/v1','before' => 'auth.api'), function() {
	Route::get('/test',function() { return ['success' => 1];});
	Route::post('/login', 'api\v1\AuthController@login');
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
