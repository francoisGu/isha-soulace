<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class WorkshopTypesTableSeeder extends Seeder {

    public function run()
    {

        DB::table('workshop_types')->delete();
        $types = array('Domestic Violence', 
            'Education & Training', 
            'Financial Advice',
            'Fitness & Nutrition',
            'Legal',
            'Mental Wellbeing & Counselling',
            'Other'
        );

        $codes = array(
            'DV',
            'TR',
            'FA',
            'FN',
            'FL',
            'PC',
            'OTH'
        );

        for ($i = 0; $i < 7; $i++) {
            WorkshopType::create(array('type' => $types[$i], 'code' => $codes[$i]));
        }

    }

}
