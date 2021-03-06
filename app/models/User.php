<?php

use Zizaco\Confide\ConfideUser;
use Zizaco\Entrust\HasRole;

class User extends ConfideUser {
	use HasRole;

	public static $rules = array(
		'username'              => 'required|alpha_dash|between:4,16|unique:users',
		'email'                 => 'required|email|unique:users',
		'password'              => 'required|between:4,16|confirmed',
		'password_confirmation' => 'required|between:4,16',
	);


	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = array(
		'password'
	);

	protected $fillable = array('username', 'first_name', 'last_name', 'email', 'password', 'password_confirmation');

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Accessor for permissions will json decode the attribute
	 * @param $value
	 * @return mixed
	 */
	public function getPermissionsAttribute($value)
	{
		return json_decode($value);
	}
	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

	/**
	 * Overwrite the Ardent save method. Saves model into
	 * database
	 *
	 * @param array $rules:array
	 * @param array $customMessages
	 * @param array $options
	 * @param \Closure $beforeSave
	 * @param \Closure $afterSave
	 * @return bool
	 */
	public function save( array $rules = array(), array $customMessages = array(), array $options = array(), \Closure $beforeSave = null, \Closure $afterSave = null )
	{
		$duplicated = false;

		if(! $this->id)
		{
				$duplicated = static::$app['confide.repository']->userExists( $this );
		}

		if(! $duplicated)
		{
				return $this->real_save( $rules, $customMessages, $options, $beforeSave, $afterSave );
		}
		else
		{
			$this->validate();
			$this->validationErrors->add(
					'duplicated',
					static::$app['translator']->get('confide::confide.alerts.duplicated_credentials')
			);
			return false;
		}
	}

	public function login($input)
	{
		// If you wish to only allow login from confirmed users, call logAttempt
		// with the second parameter as true.
		// logAttempt will check if the 'email' perhaps is the username.
		if ( Confide::logAttempt( $input, Config::get('confide::login_confirmed') ) )
		{
			$this->setToken();
			return true;
		}
		else
		{
			$user = new User;

			// Check if there was too many login attempts
			if( Confide::isThrottled( $input ) )
			{
				$err_msg = Lang::get('confide::confide.alerts.too_many_attempts');
			}
			elseif( $user->checkUserExists( $input ) and ! $user->isConfirmed( $input ) )
			{
				$err_msg = Lang::get('confide::confide.alerts.not_confirmed');
			} else {
				$err_msg  = Lang::get('confide::confide.alerts.wrong_credentials');
			}

			return $err_msg;
		}
	}

	/**
	 * Will return the user object from cache based on the token key
	 * @param $token
	 */
	public static function getFromToken($token)
	{
		$user = Cache::get($token);
		return $user;
	}

	/**
	 * Will return the token key based on userId
	 * @param $userId
	 * @return mixed
	 */
	public static function getToken($userId)
	{
		$token = Cache::get(Config::get('cache.key_token_from_user').$userId);
		return $token;
	}

	/**
	 * Check Redis for the valid user token
	 * @param $token
	 * @return bool
	 */
	public static function isValidToken($token)
	{
		$valid = false;
		if(Cache::get($token)) {
			$valid = true;
		}
		return $valid;
	}

	/**
	 * Sets the user's token and object in cache
	 */
	private function setToken()
	{
		// Invalidate old token
		if(static::getToken(Confide::user()->id))
		{
			$token = static::getToken(Confide::user()->id);
			static::invalidateToken($token);
		}

		// Generate Auth Token
		$token = md5(Hash::make(microtime().rand(0,100000)).Confide::user()->id);

		// Set key
		Cache::forever($token,Confide::user());
		Cache::forever(Config::get('cache.key_token_from_user').Confide::user()->id,$token);

	}

	/**
	 * Invalidates token and user object
	 * @param $token
	 */
	public static function invalidateToken($token)
	{
		Cache::forget(Config::get('cache.key_token_from_user').Confide::user()->id);
		Cache::forget($token);
	}

}
