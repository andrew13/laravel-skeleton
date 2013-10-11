<?php

class UserTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('users')->truncate();

		$user = array(
			'email' => 'ops@hyfn.com',
			'password' => 'hyfn2013',
			'permissions' => array(
				'admin' => 1,
				'users' => 1
			),
			'username' => 'admin',
			'first_name' => 'admin',
			'last_name' => 'user',
			'activated' => 1
		);

		$admin = Sentry::createUser($user);
		$adminGroup = Sentry::findGroupByName('admin');
		$admin->addGroup($adminGroup);

		// Uncomment the below to run the seeder
		//DB::table('user')->insert($user);
	}

}
