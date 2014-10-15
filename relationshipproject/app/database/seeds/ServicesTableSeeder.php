<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ServicesTableSeeder extends Seeder {

    public function run()
    {

        DB::table('services')->delete();
        $types = array('Family Law', 
            'Accommodation for Domestic Violence Victims', 
            'Fitness & Nutrition',
            'Mental Wellbeing, Counselling',
            'Financial Advice',
            'Workshops'
        );

        foreach($types as $type){

            Service::create(array('type' => $type));
        
        }
    }

}
