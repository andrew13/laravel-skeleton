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

Route::post('/login', 'AuthController@login');


/**
 * API Grouping routes
 */
Route::group(array('prefix' => 'api/v1','before' => 'auth.api'), function() {

	Route::get('/test',function() { return ['success' => 1];});
});


/**
 * Admin routes
 */
Route::group(array('prefix' => 'admin', 'before' => 'auth'), function() {


	Route::get('/',function()
	{
		return View::make('admin/index');
	});


	Route::get('/users/',function()
	{
		return View::make('admin/user-list');
	});

	Route::get('/users/profile',function()
	{
		return View::make('admin/user');
	});


});

/**
 * View routes
 */
Route::get('/login',function()
{
	return View::make('/login');
});
