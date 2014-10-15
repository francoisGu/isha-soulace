<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class GroupsTableSeeder extends Seeder {

    public function run()
    {

        DB::table('groups')->delete();
        DB::table('users_groups')->delete();

        Sentry::getGroupProvider()->create(array(
            'name'        => 'General Administrators',
            'permissions' => array(
                'admin' => 1,
            ),
        ));

        //Sentry::getGroupProvider()->create(array(
            //'name'        => 'Advertisements Administrators',
            //'permissions' => array(
                //'myworkshops' => 1,
                //'workshops' => 1,
                //'admin.workshops' => 1,
                //'payment' => 1,
                //'users' => 1,
            //),
        //));

        //Sentry::getGroupProvider()->create(array(
            //'name'        => 'Service Providers Administrators',
            //'permissions' => array(
                //'map' => 1,
                //'system.store' => 1,
                //'system.profile' => 1,
            //),
        //));

        //Sentry::getGroupProvider()->create(array(
            //'name'        => 'Clients Administrators',
            //'permissions' => array(
                //'system.products' => 1,
                //'system.store' => 1,
                //'system.profile' => 1,
            //),
        /*));*/


        Sentry::getGroupProvider()->create(array(
            'name'        => 'Service Providers',
            'permissions' => array(
                'serviceProviders' => 1,
                'workshops' => 1,
                'users' => 1,
                'payment' => 1,
                'password' => 1,
            ),
        ));




    }

}
