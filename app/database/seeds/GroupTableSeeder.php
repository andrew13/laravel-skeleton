<?php

class GroupTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('groups')->truncate();

		$adminGroup = array(
			'name' => 'Admin',
			'permissions' => array(
				'admin' => 1,
				'users' => 1
			)
		);

		$usersGroup = array(
			'name'	=> 'Users',
			'permissions' => array(
				'admin' => 0,
				'users' => 1
			),
		);

		Sentry::createGroup($adminGroup);
		Sentry::createGroup($usersGroup);

		// Uncomment the below to run the seeder
		//DB::table('group')->insert($group);
	}

}
