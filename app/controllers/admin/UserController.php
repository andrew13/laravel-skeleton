<?php namespace admin;

use View;
use User;
use AdminController;

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
		return View::make('admin.users.create');
	}

	public function store()
	{
		// Get form data, create new user

	}

	public function show($user_id)
	{

	}

	public function edit($user_id)
	{
		return View::make('admin.users.edit')->with('users', User::find($user_id));;
	}

	public function update($user_id)
	{

	}

	public function destroy($user_id)
	{

	}
}