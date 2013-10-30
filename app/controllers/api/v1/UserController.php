<?php


class ApiV1UserController extends ApiController {

	public function index()
	{
		// Find permissions and find users that this person has permissions to view
		if($this->user->can('manage_user')) {

			$users = User::all();
			return Api::response($users->toArray());
		}
		return Api::error(Lang::get('errors.unauthorized_content'));
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

	/**
	 * Api Login
	 * @return array
	 */
	public function login()
	{
		$rules = [
			'email' => 'required_without:username|email',
			'username' => 'required_without:email',
			'password' => 'required'
		];

		$validate = Hyfn::validate($rules);
		if($validate!==true) return Api::error($validate->errors()->getMessages());

		$input = array(
			'email'    => Input::get( 'email' ), // May be the username too
			'username' => Input::get( 'username' ),
			'password' => Input::get( 'password' )
		);

		$user = new User;
		$login = $user->login($input);
		if($login !== true) return Api::error($login);

		$confideUser = Confide::user();
		$confideUser->token = User::getToken($confideUser->id);

		return Api::response($confideUser->toArray());
	}

	/**
	 * Remove auth token from cache
	 * @return array
	 */
	public function logout()
	{
		User::invalidateToken($this->token);
		return Api::response(['success' => true]);
	}
}