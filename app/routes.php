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
Route::get('/hello',function()
{
	return View::make('admin/index');
});


Route::get('/login',function()
{
	return View::make('/login');
});


Route::group(array('prefix' => 'api/v1','before' => 'apiVerify'), function() {

});


Route::group(array('prefix' => 'admin', 'before' => 'auth'), function() {


	Route::get('/',function()
	{
		return View::make('admin/index');
	});

	Route::get('/account/{user}',function(User $user)
	{
		return View::make('admin/account');
	});


});