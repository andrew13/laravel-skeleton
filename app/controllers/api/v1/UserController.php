<?php


class ApiV1UserController extends ApiController {

		public function index()
		{
			$users = User::all();
			return Api::response($users->toArray());
		}

		public function login()
		{
			$rules = [
				'email' => 'required_without:username|email',
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

			$user = new User;
			$login = $user->login($input);
			if($login !== true) return Api::error($login);

			$confideUser = Confide::user();
			$confideUser->token = $user->getToken();
			return Api::response($confideUser->toArray());

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