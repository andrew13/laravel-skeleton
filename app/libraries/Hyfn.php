<?php

/**
 * Class Hyfn
 * Custom Hyfn Methods and APIsz
 */
class Hyfn {

	public function __construct()
	{

	}

	public static function output($data,$code = 200,$message= 'ok')
	{
		return ['meta' => ['code' => $code,'message' => $message, 'success' => true], 'data' => $data];
	}

	public static function error($message,$code = 400)
	{
		return ['meta' => ['code' => $code,'message' => $message, 'success' => false]];
	}
}
