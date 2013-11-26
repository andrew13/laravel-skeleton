<?php

/*
|--------------------------------------------------------------------------
| Register The Laravel Class Loader
|--------------------------------------------------------------------------
|
| In addition to using Composer, you may use the Laravel class loader to
| load your controllers and models. This is useful for keeping all of
| your classes in the "global" namespace without Composer updating.
|
*/

ClassLoader::addDirectories(array(

	app_path().'/commands',
	app_path().'/controllers',
	app_path().'/models',
	app_path().'/database/seeds',

));

/**
 * New relic App
 */
Newrelic::setAppName( Config::get('laravel-newrelic::app_name') );


/**
 * Custom validator
 */
// Register Api key validator
Validator::resolver(function($translator, $data, $rules, $messages) {
	return new CustomValidator($translator, $data, $rules, $messages);
});


/*
|--------------------------------------------------------------------------
| Application Error Logger
|--------------------------------------------------------------------------
|
| Here we will configure the error logger setup for the application which
| is built on top of the wonderful Monolog library. By default we will
| build a rotating log file setup which creates a new file each day.
|
*/

$logFile = 'log-'.php_sapi_name().'.txt';

Log::useDailyFiles(storage_path().'/logs/'.$logFile);

/*
|--------------------------------------------------------------------------
| Application Error Handler
|--------------------------------------------------------------------------
|
| Here you may handle any errors that occur in your application, including
| logging them or displaying custom views for specific errors. You may
| even register several error handlers to handle different types of
| exceptions. If nothing is returned, the default error view is
| shown, which includes a detailed stack trace during debug.
|
*/

App::error(function(Exception $exception, $code)
{
	if(Config::get('sentry.enabled') === true)
	{
		// Instantiate a new client with a compatible DSN
		$client = new Raven_Client(Config::get('sentry.dsn'));
		$client->getIdent($client->captureException($exception));
	}

	if (Config::get('app.debug') == true)
	{
		Log::error($exception);
	} else {
		if(Request::is('api/*'))
		{
			return Api::error($exception->getMessage(),$code);
		}

		return Response::view('errors.error', array(), $code);
	}
});


App::missing(function($exception)
{
	if(Request::is('api/*'))
	{
		return Api::error(Lang::get('errors.not_found'),404);
	}
	return Response::view('errors.404', array(), 404);
});


/*
|--------------------------------------------------------------------------
| Maintenance Mode Handler
|--------------------------------------------------------------------------
|
| The "down" Artisan command gives you the ability to put an application
| into maintenance mode. Here, you will define what is displayed back
| to the user if maintenace mode is in effect for this application.
|
*/

App::down(function()
{
	if(Request::is('api/*'))
	{
		return Api::error(Lang::get('errors.maintenance'),503);
	}
	return Response::view('errors.maint', array(), 503);
});

/*
|--------------------------------------------------------------------------
| Require The Filters File
|--------------------------------------------------------------------------
|
| Next we will load the filters file for the application. This gives us
| a nice separate location to store our route and application filter
| definitions instead of putting them all in the main routes file.
|
*/

require app_path().'/filters.php';