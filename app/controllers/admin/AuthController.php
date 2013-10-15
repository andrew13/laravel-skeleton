<?php namespace admin;

class AuthController extends BaseController {
	/**
	* Log the user in
	*/
	public function login()
	{
		$user = parent::login();

		if ($user) {
			return Redirect::to('/');
		}
	}
}