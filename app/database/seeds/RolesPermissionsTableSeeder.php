<?php

class RolesPermissionsTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::statement('SET FOREIGN_KEY_CHECKS=0;');
		DB::table('roles')->truncate();

		$godRole = new Role();
		$godRole->name = 'god';
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


		DB::table('permissions')->truncate();
		$manageGods = new Permission;
		$manageGods->name = 'manage_gods';
		$manageGods->display_name = 'Manage Gods';
		$manageGods->save();

		$manageSuperadmins = new Permission;
		$manageSuperadmins->name = 'manage_superadmins';
		$manageSuperadmins->display_name = 'Manage Superadmins';
		$manageSuperadmins->save();

		$manageAdmins = new Permission;
		$manageAdmins->name = 'manage_admins';
		$manageAdmins->display_name = 'Manage Admins';
		$manageAdmins->save();

		$manageUsers = new Permission;
		$manageUsers->name = 'manage_user';
		$manageUsers->display_name = 'Manage Users';
		$manageUsers->save();

		$godRole->perms()->sync(array($manageGods->id,$manageSuperadmins->id,$manageAdmins->id,$manageUsers->id));
		$superadminRole->perms()->sync(array($manageSuperadmins->id,$manageAdmins->id,$manageUsers->id));
		$adminRole->perms()->sync(array($manageAdmins->id,$manageUsers->id));

		DB::statement('SET FOREIGN_KEY_CHECKS=1;');
	}
}
