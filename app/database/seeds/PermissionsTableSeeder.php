<?php

class PermissionsTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('permissions')->delete();

		$permissions = array(
			array(
				'name'            => 'manage_gods',
				'display_name'    => 'manage gods'
			),
			array(
				'name'            => 'manage_superadmins',
				'display_name'    => 'manage superadmins'
			),
			array(
				'name'            => 'manage_admins',
				'display_name'    => 'manage admins'
			),
			array(
				'name'            => 'manage_users',
				'display_name'    => 'manage users'
			),
			array(
				'name'            => 'manage_roles',
				'display_name'    => 'manage roles'
			),
			array(
				'name'            => 'manage_permissions',
				'display_name'    => 'manage permissions'
			),
		);

		// Uncomment the below to run the seeder
		DB::table('permissions')->insert( $permissions );

		DB::table('permission_role')->delete();

		$permission_roles = array(
			array(
					'role_id'      => 1,
					'permission_id' => 1
			),
			array(
					'role_id'      => 1,
					'permission_id' => 2
			),
			array(
					'role_id'      => 1,
					'permission_id' => 3
			),
			array(
					'role_id'      => 1,
					'permission_id' => 4
			),
			array(
					'role_id'      => 1,
					'permission_id' => 5
			),
			array(
					'role_id'      => 1,
					'permission_id' => 6
			),

			array(
					'role_id'      => 2,
					'permission_id' => 2
			),
			array(
					'role_id'      => 2,
					'permission_id' => 3
			),
			array(
					'role_id'      => 2,
					'permission_id' => 4
			),
			array(
					'role_id'      => 2,
					'permission_id' => 5
			),
			array(
					'role_id'      => 2,
					'permission_id' => 6
			)
		);

		DB::table('permission_role')->insert( $permission_roles );
	}

}
