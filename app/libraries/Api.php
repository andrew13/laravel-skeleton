<?php

class Api {

	/**
	 * Custom wrapper for API response
	 * @param $data
	 * @param int $code
	 * @return array
	 */
	public static function response($data,$code = 200)
	{
		return ['meta' => ['code' => $code], 'data' => $data];
	}

	/**
	 * custom wrapper for API errors
	 * @param $error_message
	 * @param int $code
	 * @return array
	 */
	public static function error($error_message,$code = 400)
	{
		return ['meta' => ['code' => $code,'error_message' => $error_message]];
	}

}
