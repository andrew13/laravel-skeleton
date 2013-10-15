<?php

class RolesTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('roles')->delete();

		$godRole = new Role();
		$godRole->name = 'GOD';
		$godRole->save();

		$superadminRole = new Role();
		$superadminRole->name = 'superadmin';
		$superadminRole->save();

		$adminRole = new Role();
		$adminRole->name = 'admin';
		$adminRole->save();

		$userRole = new Role();
		$userRole->name = 'user';
		$userRole->save();

		$god = User::where('username','=','admin')->first();
		$god->attachRole( $godRole );
	}
}
