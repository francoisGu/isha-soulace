<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class AdministratorsTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker::create();

        foreach(range(1, 1) as $index)
        {
            $user = new User;
            $user->createUser('Administrator',[
                'type'      => 'General Administrators',
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'email' => 'admin@admin.com',
                'password' => '123456'

            ]);
        }
    }

}
