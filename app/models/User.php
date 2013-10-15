<?php

use Zizaco\Confide\ConfideUser;

class User extends ConfideUser {

	public static $rules = array(
		'username'              => 'required|between:4,16',
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
}
