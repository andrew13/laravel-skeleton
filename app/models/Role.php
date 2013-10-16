<?php

use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{
	public static $rules = array(
		'name' => 'required|between:3,16'
	);
}