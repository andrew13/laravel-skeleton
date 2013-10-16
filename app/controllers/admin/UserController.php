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
		// Hacky, I know, but had to do this because of Sentry
		$user_data = Input::all();
		$user = new User($user_data);

		if ($user->save()) {
			return Redirect::to('admin/users');
		} else {
			return Redirect::to('admin/users/create');
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
		// Hacky, I know, but had to do this because of Sentry
		$user_data = Input::all();
		$user = User::find($user_id);
		$user->fill($user_data);

		if ($user->updateUniques()) {
			return Redirect::to('admin/users');
		} else {
			return Redirect::to('admin/users/' . $user_id . '/edit')
				->withInput(Input::except('password'))
				->withErrors($user->errors());
		}
	}

	public function destroy($user_id)
	{

	}
}