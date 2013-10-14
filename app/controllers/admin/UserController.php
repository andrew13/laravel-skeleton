<?php namespace admin;

use View;

class UserController extends \AdminController {

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

		//return View::make('admin.users.index')->with('users', User::all());
		return View::make('admin.users.index');
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