<?php
// TODO:  Let's revisit this one day, I know I suggested this,
// but I think we can refactor this and make it better
class AuthController extends BaseController {
	/**
	* Log the user in
	*/
	protected function login() {
		try {
			// Set login credentials
			$credentials = array(
				'username' => Input::get('username'), 'password' => Input::get('password')
			);

			// Try to authenticate the user
			$user = Sentry::authenticate($credentials, false);
			return $user;
		} catch (Cartalyst\Sentry\Users\LoginRequiredException $e) {
			return Redirect::to('login')->withErrors('Username field is required');
		} catch (Cartalyst\Sentry\Users\PasswordRequiredException $e) {
			return Redirect::to('login')->withErrors('Password cannot be blank');
		} catch (Cartalyst\Sentry\Users\UserNotFoundException $e) {
			return Redirect::to('login')->withErrors('Could not find user with those credentials');
		} catch (Cartalyst\Sentry\Users\WrongPasswordException $e) {
			return Redirect::to('login')->withErrors('The credentials you provided were incorrect');
		}
	}
}