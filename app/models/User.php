<?php

use Zizaco\Confide\ConfideUser;
use Zizaco\Entrust\HasRole;

class User extends ConfideUser {
	use HasRole;

	public static $rules = array(
		'username'              => 'required|alpha_dash|between:4,16|unique:users',
		'email'                 => 'required|email|unique:users',
		'password'              => 'required|alpha_num|between:4,8|confirmed',
		'password_confirmation' => 'required|alpha_num|between:4,8',
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
}
