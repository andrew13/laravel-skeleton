<?php

class AdminController extends BaseController {

	protected $logged_in_user;

	public function __construct() {
		// Fetch the User object, or set it to false if not logged in
		if (Confide::User()) {
			$this->logged_in_user = Confide::User();
		}
		else {
			$this->logged_in_user = false;
		}

		View::share('logged_in_user', $this->logged_in_user);
	}

	public function index() {
		return View::make('admin.index');
	}
}