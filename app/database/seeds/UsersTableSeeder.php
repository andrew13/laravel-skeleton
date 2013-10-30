<?php
use Illuminate\Console\Command;

class UsersTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::statement('SET FOREIGN_KEY_CHECKS=0;');
		DB::table('users')->truncate();

		// Generate a random 12 digit password
		$password = '';
		for ($i=0; $i<12; $i++)
		{
			$ascii_code = rand(50,122);
			$password .= chr($ascii_code);
		}

		$user = User::create(array(
	      'username'                => 'admin',
	      'email'                   => 'ops@hyfn.com',
	      'password'                => $password,
	      'password_confirmation'   => $password,
	      'first_name'              => 'hyfn',
	      'last_name'               => 'admin',
	      'confirmed'               => 1
		));
		$user->save();

		print "Admin Password: ".$password."\n";

		DB::statement('SET FOREIGN_KEY_CHECKS=1;');
	}

}
