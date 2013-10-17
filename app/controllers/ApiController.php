<?php


class ApiController extends Controller {

	protected $token;

	public function __construct()
	{
		$this->token = Input::get('token');
	}

}