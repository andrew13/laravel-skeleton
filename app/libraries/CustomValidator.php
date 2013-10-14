<?php

class CustomValidator extends Illuminate\Validation\Validator {

	public static function validateApiKey($attribute, $value, $parameters)
	{
		$validApiKey = false;
		$response = DB::table('api_keys')->where('key',$value)->first();
		if(count($response))
		{
			$validApiKey = true;
		}

		return $validApiKey;
	}
}

