<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ClientsTableSeeder extends Seeder {

	public function run()
	{
        DB::table('tickets')->delete();
        DB::table('clients')->delete();
		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
		    Ticket::generateTicket(6, $faker->email);	
		}
	}

}
