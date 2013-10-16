<?php


class ApiV1UserController extends ApiController {
	public function index()
		{
			$users =  User::all();
			return Api::response($users->toArray());
		}

		public function login()
		{
			$rules = [
				'email' => 'required_without:username',
				'username' => 'required_without:email',
				'password' => 'required'
			];

			$validate = Hyfn::validate($rules);
			if($validate!==true) return Api::error($validate);

			$input = array(
				'email'    => Input::get( 'email' ), // May be the username too
				'username' => Input::get( 'username' ),
				'password' => Input::get( 'password' )
			);

			// If you wish to only allow login from confirmed users, call logAttempt
			// with the second parameter as true.
			// logAttempt will check if the 'email' perhaps is the username.
			if ( Confide::logAttempt( $input, Config::get('confide::login_confirmed') ) )
			{
				return Api::response(Confide::user()->toArray());
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
				} else {
					$err_msg  = Lang::get('confide::confide.alerts.wrong_credentials');
				}

				return Api::error( $err_msg );
			}
		}


		public function create()
		{

		}

		public function store()
		{

		}

		public function show($user_id)
		{

		}

		public function edit($user_id)
		{

		}

		public function update($user_id)
		{

		}

		public function destroy($user_id)
		{

		}
}