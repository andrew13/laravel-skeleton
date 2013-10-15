<?php

/**
 * Class Hyfn
 * Custom Hyfn Methods and APIsz
 */
class Hyfn {

	public function __construct()
	{

	}

	public static function output($data,$code = 200)
	{
		return ['meta' => ['code' => $code], 'data' => $data];
	}

	public static function error($error_message,$code = 400)
	{
		return ['meta' => ['code' => $code,'error_message' => $error_message]];
	}
}
