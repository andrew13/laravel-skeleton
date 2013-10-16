<?php

class UsersTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::statement('SET FOREIGN_KEY_CHECKS=0;');
		DB::table('users')->truncate();


		$user = User::create(array(
      'username'                => 'admin',
      'email'                   => 'ops@hyfn.com',
      'password'                => 'hyfn2013',
      'password_confirmation'   => 'hyfn2013',
      'first_name'              => 'hyfn',
      'last_name'               => 'admin',
      'confirmed'               => 1
		));
		$user->save();
		DB::statement('SET FOREIGN_KEY_CHECKS=1;');
	}

}
