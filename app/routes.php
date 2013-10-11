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
Route::get('/',function()
{
	return Redirect::to('/admin');
});


Route::get('/login',function()
{
	return View::make('/login');
});

Route::post('/login', 'AuthController@login');

Route::group(array('prefix' => 'api/v1','before' => 'apiVerify'), function() {

});


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