<?php

class UsersTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('users')->delete();


		User::create(array(
			'username'            => 'admin',
			'email'               => 'ops@hyfn.com',
			'password'            => 'hyfn2013',
			'first_name'          => 'hyfn',
			'last_name'           => 'admin',
			'confirmed'           => 1,
			'confirmation_code'   => md5(microtime().Config::get('app.key'))
		));

	}

}
