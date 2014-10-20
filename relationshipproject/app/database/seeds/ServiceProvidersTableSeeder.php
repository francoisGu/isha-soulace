<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker as Faker;

class ServiceProvidersTableSeeder extends Seeder {

	public function run()
	{
        $faker = new Faker\Generator();
        $faker->addProvider(new Faker\Provider\en_US\Person($faker));
        $faker->addProvider(new Faker\Provider\en_AU\Address($faker));
        $faker->addProvider(new Faker\Provider\en_AU\PhoneNumber($faker));
        $faker->addProvider(new Faker\Provider\en_US\Company($faker));
        $faker->addProvider(new Faker\Provider\Lorem($faker));
        $faker->addProvider(new Faker\Provider\Internet($faker));

        $serviceTypes = Service::serviceTypes();

        foreach(range(1, 50) as $index)
		{
            $identity = array_rand(array(0,1));

            $acn = null;
            $companyName = null;
            $abn = null;
            $first_name = null;
            $last_name = null;

            if($identity){

                $acn = $faker->randomNumber($nbDigits = NULL);
                $companyName = $faker->company;
            
            } else{

                $abn = $faker->randomNumber($nbDigits = NULL);
                $first_name = $faker->firstName;
                $last_name = $faker->lastName;
            
            }
            
            $user = new User;
            $registerInfo = array(
                'identity' => $identity,
                'type' => $serviceTypes[ array_rand($serviceTypes, 1) ],
                'unit' => $faker->randomNumber($nbDigits = 3),
                'street_number' => $faker->buildingNumber,
                'street_name' => $faker->streetName,
                'street_type' => $faker->streetSuffix,
                'suburb'    => $faker->city,
                'state'     => $faker->stateAbbr,
                'postcode'  => $faker->postcode,
                'phone'     => $faker->phoneNumber,
                'mobile'    => $faker->PhoneNumber,
                'mode'      => array_rand(array(0, 1)),
                'email'     => $faker->freeEmail,
                'password'  => '123456',
                'price'     => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = NULL),
                'verified'  => array_rand(array(0, 1)),
                'first_name' => $first_name,
                'last_name' => $last_name,
                'companyName' => $companyName,
                'acn'       => $acn,
                'abn'       => $abn,
                'negotiable' => array_rand(array(0, 1))

            
            
            );
            $venue = Map::getVenue($registerInfo);
            $geocode = Map::validateAddress($venue, $registerInfo['postcode']);
            array_push($registerInfo, $geocode);
            $user->register('ServiceProvider', $registerInfo);

        }
	}

}
