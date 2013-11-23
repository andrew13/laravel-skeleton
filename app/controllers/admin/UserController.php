<?php

class AdminUserController extends AdminController {


	public function index()
	{
		return View::make('admin.users.index')->with('users', User::all());
	}

	public function create()
	{
		return View::make('admin.users.create')->with('user', new User());
	}

	public function store()
	{
		// Get form data, create new user
		// Hacky, I know, but had to do this because of Sentry
		$user_data = Input::all();
		$user = new User();
		$user->fill($user_data);

		// TODO:  If we need to do confirmation, then stop doing this below
		$user->confirmed = 1;

		if ($user->save()) {
			return Redirect::to('admin/users/' . $user->id . '/edit')
				->with('success_message',trans('admin.create_success'));
		} else {
			return Redirect::to('admin/users/create')
				->withInput(Input::except('password'))
				->withErrors($user->errors());
		}
	}

	public function show($user_id)
	{

	}

	public function edit($user_id)
	{
		return View::make('admin.users.edit')->with('user', User::find($user_id));;
	}

	public function update($user_id)
	{
		// Get form data, find user and update
		$user_data = Input::all();
		$user = User::find($user_id);
		$user->fill($user_data);

		if ($user->updateUniques()) {
			return Redirect::to('admin/users/' . $user_id . '/edit')
				->with('success_message',trans('admin.update_success'));
		} else {
			return Redirect::to('admin/users/' . $user_id . '/edit')
				->withInput(Input::except('password'))
				->withErrors($user->errors());
		}
	}

	public function destroy($user_id)
	{

	}

	/**
	 * Displays the login form
	 *
	 */
	public function login()
	{
		if( Confide::user() )
		{
			// If user is logged, redirect to internal
			// page, change it to '/admin', '/dashboard' or something
			return Redirect::to('/admin');
		}
		else
		{
			return View::make('login');
		}
	}

	/**
	* Log the user in
	*/
	public function do_login() {
		$rules = [
			'username' => 'required',
			'password' => 'required'
		];

		$validate = Hyfn::validate($rules);
		if($validate !== true) {
			$user = new User();
			return Redirect::to('login')
				->withInput(Input::except('password'))
				->withErrors($validate->errors());
		}

		$input = array(
			'email'    => Input::get( 'email' ), // May be the username too
			'username' => Input::get( 'username' ), // so we have to pass both
			'password' => Input::get( 'password' ),
			'remember' => Input::get( 'remember' ),
		);

		// If you wish to only allow login from confirmed users, call logAttempt
		// with the second parameter as true.
		// logAttempt will check if the 'email' perhaps is the username.
		if ( Confide::logAttempt( $input ) )
		{
			// If the session 'loginRedirect' is set, then redirect
			// to that route. Otherwise redirect to '/'
			$r = Session::get('loginRedirect');
			if (!empty($r))
			{
				Session::forget('loginRedirect');
				return Redirect::to($r);
			}

			return Redirect::to('/'); // change it to '/admin', '/dashboard' or something
		}
		else
		{
			$user = new User;

			// Check if there was too many login attempts
			if( Confide::isThrottled( $input ) )
			{
				$err_msg = Lang::get('confide::confide.alerts.too_many_attempts');
			}
			elseif( $user->checkUserExists( $input ) and ! $user->isConfirmed( $input ) )
			{
				$err_msg = Lang::get('confide::confide.alerts.not_confirmed');
			}
			else
			{
				$err_msg = Lang::get('confide::confide.alerts.wrong_credentials');
			}

			$user->validationErrors->add('login_error', $err_msg);

			return Redirect::to('admin/login')
				->withInput(Input::except('password'))
				->with('error', true)
				->withErrors($user->errors());
		}
	}

	/**
	 * Attempt to confirm account with code
	 *
	 * @param  string  $code
	 */
	public function confirm( $code )
	{
		if ( Confide::confirm( $code ) )
		{
			$notice_msg = Lang::get('confide::confide.alerts.confirmation');
			return Redirect::to('login')
				->with( 'notice', $notice_msg );
		}
		else
		{
			$error_msg = Lang::get('confide::confide.alerts.wrong_confirmation');
			return Redirect::to('login')
				->with( 'error', $error_msg );
		}
	}

	/**
	 * Displays the forgot password form
	 *
	 */
	public function forgot_password()
	{
		return View::make(Config::get('confide::forgot_password_form'));
	}

	/**
	 * Attempt to send change password link to the given email
	 *
	 */
	public function do_forgot_password()
	{
		if( Confide::forgotPassword( Input::get( 'email' ) ) )
		{
			$notice_msg = Lang::get('confide::confide.alerts.password_forgot');
			return Redirect::to('login')
				->with( 'notice', $notice_msg );
		}
		else
		{
			$error_msg = Lang::get('confide::confide.alerts.wrong_password_forgot');
			return Redirect::action('AdminUserController@forgot_password')
				->withInput()
				->with( 'error', $error_msg );
		}
	}

	/**
	 * Shows the change password form with the given token
	 *
	 */
	public function reset_password( $token )
	{
		return View::make(Config::get('confide::reset_password_form'))
			->with('token', $token);
	}

	/**
	 * Attempt change password of the user
	 *
	 */
	public function do_reset_password()
	{
		$input = array(
			'token'=>Input::get( 'token' ),
			'password'=>Input::get( 'password' ),
			'password_confirmation'=>Input::get( 'password_confirmation' ),
		);

		// By passing an array with the token, password and confirmation
		if( Confide::resetPassword( $input ) )
		{
			$notice_msg = Lang::get('confide::confide.alerts.password_reset');
			return Redirect::to('login')
				->with( 'notice', $notice_msg );
		}
		else
		{
			$error_msg = Lang::get('confide::confide.alerts.wrong_password_reset');
			return Redirect::action('AdminUserController@reset_password', array('token'=>$input['token']))
				->withInput()
				->with( 'error', $error_msg );
		}
	}

	/**
	 * Log the user out of the application.
	 *
	 */
	public function logout()
	{
		Confide::logout();

		return Redirect::to('/');
	}

}