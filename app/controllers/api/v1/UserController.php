<?php namespace api\v1;
use ApiController;
use User;

class UserController extends ApiController {
	public function index()
		{
			$users =  User::all();
			return \Hyfn::output($users->toArray());
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