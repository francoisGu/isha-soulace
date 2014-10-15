<?php

class Util {


    /*
     * get Venue
     */
    public static function getVenue($input){

            $unit = $input['unit'];
            $street_number = $input['street_number'];
            $street_name = $input['street_name'];
            $street_type = $input['street_type'];
            $suburb = $input['suburb'];
            $state = $input['state'];
            $postcode = $input['postcode'];


            $venue = $unit . ' ' . $street_number 
                .' ' . $street_name . ',' .  
                $street_type . ',' . $suburb . ',' 
                . $state . ',' . $postcode;

            return $venue;
        }

    /*
     * validate addresse
     */
    public static function validateAddress($venue){

        try {

            $geocode = Geocoder::geocode($venue);


            return $geocode;

        } catch (\Exception $e) {
            // Here we will get "The FreeGeoIpProvider does not support 
            // Street addresses." ;)
            return null;
        }



    }

    /*
     * send email
     */
    public static function sendEmail($template, $data, $userInfo ){

        Mailgun::send($template, $data, function($message) use 
            ($userInfo) {
                $message -> to($userInfo['email'], 
                    $userInfo['firstname'] . ' ', $userInfo['lastname']) 
                    -> subject('Welcome to the Isha SoulAce');
            });



    }



}
?>
