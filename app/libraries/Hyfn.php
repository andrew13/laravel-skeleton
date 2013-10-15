<?php

/**
 * Class Hyfn
 * Custom Hyfn Methods
 */
class Hyfn {

	public function __construct()
	{

	}

	public static function validate($rules)
	{
		$validation = Validator::make(Input::all(),$rules);

		if($validation->fails())
		{
			return $validation->errors()->getMessages();
		}

		return true;
	}
}
