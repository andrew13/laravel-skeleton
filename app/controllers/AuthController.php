<?php

class AuthController extends BaseController {
	/**
	* Log the user in
	*/
	public function adminLogin()
	{
		$user = $this->login();

		if ($user) {
			return Redirect::to('/');
		}
	}

	public function apiLogin()
	{
		$user = $this->login();

		if ($user) {
			return $user;
		}
	}

	private function login() {
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