<?php


class ApiController extends Controller {

	protected $token;
	protected $user;

	public function __construct()
	{
		$this->token = Input::get('token');
		$this->user = User::getFromToken($this->token);
	}

}
