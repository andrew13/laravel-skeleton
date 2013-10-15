<?php namespace admin;

use AdminController;
use User;
use View;
use Input;
use Sentry;
use Eloquent;
use Redirect;

class UserController extends AdminController {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if (!is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

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
		$user_data = Input::all();
		$user = new User($user_data);
		if ($user->validate()) {
			unset($user_data['password_confirmation']);
			unset($user_data['_token']);
			$user = Sentry::createUser($user_data);
			return Redirect::to('admin/users');
		} else {
			$errors = $user->errors();
			// TODO: Get this working where it displays the errors
			return Redirect::to('admin/users/create')->with_errors($errors);
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
		// Get form data, update user, re-render form w/ updated user
		return View::make('admin.users.edit')->with('user', User::find($user_id));;
	}

	public function destroy($user_id)
	{

	}
}