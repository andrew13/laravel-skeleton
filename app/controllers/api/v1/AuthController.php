<?php namespace api\v1;
// TODO:  Let's revisit this one day, I know I suggested this,
// but I think we can refactor this and make it better
class AuthController extends BaseController {

	public function login()
	{
		$user = parent::login();

		if ($user) {
			return($user);
			//return \Hyfn::output($user);
		}
	}
}