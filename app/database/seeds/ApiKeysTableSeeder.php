<?php

class ApiKeysTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('api_keys')->truncate();

		$date = new DateTime();

		$apikeys = array(
			'key' => md5('LOVEMESOMEKEYS'),
			'device' => 'iPad',
			'created_at' => $date,
			'updated_at' => $date
		);

		// Uncomment the below to run the seeder
		DB::table('api_keys')->insert($apikeys);
	}

}
