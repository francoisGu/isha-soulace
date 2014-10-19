<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class AdvertisementTypeTableSeeder extends Seeder {

	public function run()
	{

        DB::table('advertisementTypes')->delete();

        DB::table('advertisementTypes')->insert(array('type' => 'general', 'price' => 80));
        DB::table('advertisementTypes')->insert(array('type' => 'premium', 'price' => 100));
	}

}
