<?php

/*
|--------------------------------------------------------------------------
| Application & Route Filters
|--------------------------------------------------------------------------
|
| Below you will find the "before" and "after" events for the application
| which may be used to do any work before or after a request into your
| application. Here you may also register your custom route filters.
|
*/

App::before(function($request)
{

});


App::after(function($request, $response)
{
	//
});

/*
|--------------------------------------------------------------------------
| Authentication Filters
|--------------------------------------------------------------------------
|
| The following filters are used to verify that the user of the current
| session is logged into this application. The "basic" filter easily
| integrates HTTP Basic authentication for quick, simple checking.
|
*/

Route::filter('auth', function()
{
	if ( Auth::guest() ) // If the user is not logged in
	{
		// Set the loginRedirect session variable
		Session::put( 'loginRedirect', Request::url() );

		// Redirect back to user login
		return Redirect::to( '/login' );
	}
});

/**
 * Authenticate valid api key
 */
Route::filter('auth.api', function()
{
	// Validate api key
	$rules = ['api_key' => 'required|api_key'];

	$validate = Hyfn::validate($rules);

	// Invalid API key
	if ($validate !== true)
	{
		return Api::error($validate->errors()->getMessages(), 401);
	}
});


/**
 * Authenticate valid auth token key
 */
Route::filter('auth.token', function()
{
	// Validate api key
	$rules = ['token' => 'required'];

	$validate = Hyfn::validate($rules);

	// Invalid API key
	if ($validate !== true)
	{
		return Api::error($validate->errors()->getMessages(), 401);
	}

	$validToken = User::isValidToken(Input::get('token'));

	if($validToken !== true)
	{
		return Api::error(Lang::get('errors.invalid_token'), 401);
	}
});


Route::filter('auth.basic', function()
{
	return Auth::basic();
});

/*
|--------------------------------------------------------------------------
| Guest Filter
|--------------------------------------------------------------------------
|
| The "guest" filter is the counterpart of the authentication filters as
| it simply checks that the current user is not logged in. A redirect
| response will be issued if they are, which you may freely change.
|
*/

Route::filter('guest', function()
{
	if (Auth::check()) return Redirect::to('/');
});

/*
|--------------------------------------------------------------------------
| CSRF Protection Filter
|--------------------------------------------------------------------------
|
| The CSRF filter is responsible for protecting your application against
| cross-site request forgery attacks. If this special token in a user
| session does not match the one given in this request, we'll bail.
|
*/

Route::filter('csrf', function()
{
	if (Session::token() != Input::get('_token'))
	{
		throw new Illuminate\Session\TokenMismatchException;
	}
});