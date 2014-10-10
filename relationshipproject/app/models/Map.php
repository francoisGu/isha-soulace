<?php class Map extends Eloquent {

    protected $table = 'postcode_db';
    // retrieve latitude, latitude for a postcode
    public static function getPositionByPostcode($postcode, $suburb=''){
        $extra = '';
        if ($suburb != '')
        {
            $extra = " and suburb = '$suburb'";
        }

        // cache for 120 mins.
        //$lon = Map::where('postcode', '=', $postcode) -> remember(120) -> 
        //select('lon') -> pluck('lon');
        //$lat = Map::where('postcode', '=', $postcode) -> remember(120) -> 
        //select('lat') -> pluck('lat');

        $lat = Map::where('postcode', '=', $postcode) -> select('lat') -> 
            pluck('lat');
        $lon = Map::where('postcode', '=', $postcode) -> select('lon') -> 
            pluck('lon');
        $pos = array('lon' => $lon, 'lat' => $lat);

        //Log::info('This is result of sql query' . var_dump($pos) );
        return $pos;
    }

    public function mapConfig($lat = 0.0, $lon = 0.0)
    {

        $config = array();
        //$config['center'] = strvar($lat) . ',' . strvar($lon);

        $config['center'] = ($lat != 0.0 || $lon != 0.0)? $lat . ',' . $lon : 
            'auto';
        $config['zoom'] = '15';
        $config['cluster'] = TRUE;
        //$config['placesAutocompleteOnChange'] = 'alert(\'You selected a place\');';
        //$config['scaleControlPosition'] = 'BOTTOM_RIGHT';
        //$config['places'] = TRUE;
        //$config['placesLocation'] = $lat . ',' . $lon;
        //$config['placesRadius'] = '200';
        $config['onboundschanged'] = 'if (!centreGot) {
            var mapCentre = map.getCenter();
            marker_0.setOptions({
                position: new google.maps.LatLng(mapCentre.lat(), 
mapCentre.lng())
    });
    }
    centreGot = true;';

    return $config;

    }

    public static function generateMarker($sp)
    {


        $position['center'] = $sp->latitude . ',' . $sp->longitude;
        //$sp = ServiceProvider::find($spID);
        $markerInfo = array();
        $markerInfo['position'] = $position['center'];
        //$markerInfo['infowindow_content'] = $sp->email . '\n' . $sp->first_name;
        
        $markerInfo['infowindow_content'] = $sp->email . '\n' . $sp->first_name;
        $markerInfo['infowindowMaxWidth'] = 350;
        $markerInfo['icon'] = 
            'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld='. $sp->id.'|9999FF|000000';

        return $markerInfo;

    }


    // check if position is within 30km corresponding to the input postcode
    public static function withinRange($range = 30.0, $postcodes, $latitude1, $longitude1){

        $within = false;

        $lat = Map::where('postcode', '=', $postcode) -> select('lat') -> 
            pluck('lat');
        $lon = Map::where('postcode', '=', $postcode) -> select('lon') -> 
            pluck('lon');

        $dist = Map::calc_dist($lat, $lon, $latitude1, $longitude1);

        if($dist <= $range){
            $within = true; 
        }
        return $within;

    }

    #The following software is distributed free of charge using the BSD Licence:
    ##
    ##
    ## Copyright (c) 2008, Corra Communications
    ## All rights reserved.
    public static function calc_dist($latitude1, $longitude1, $latitude2, 
        $longitude2) {
            $thet = $longitude1 - $longitude2;
            $dist = (sin(deg2rad($latitude1)) * sin(deg2rad($latitude2))) + 
                (cos(deg2rad($latitude1)) * cos(deg2rad($latitude2)) * 
                cos(deg2rad($thet)));
            $dist = acos($dist);
            $dist = rad2deg($dist);
            $kmperlat = 111.325; // Kilometers per degree latitude constant
            $dist = $dist * $kmperlat;
            return (round($dist));
        }

    //Ca}culates distance in KM between postcodes
    function postcode_dist($postcode1,$postcode2, $suburb1 = '', $suburb2 = '') 
    {
        //Get lat and lon for postcode 1
        $extra = "";
        if ($suburb1 != '') {
            $extra = " and suburb = '$suburb1'";
        }
        $sqlquery = "SELECT * FROM postcode_db WHERE lat <> 0 and lon <> 0 
            and postcode = '$postcode1'$extra";
        $res = mysql_query($sqlquery);
        $num = mysql_num_rows($res);


        //Get lat and lon for postcode 2

        $extra = "";
        if ($suburb2 != '') {
            $extra = " and suburb = '$suburb2'";
        }
        $sqlquery = "SELECT * FROM postcode_db WHERE lat <> 0 and lon <> 0 
            and postcode = '$postcode2'$extra";
        $res1 = mysql_query($sqlquery);
        $num1 = mysql_num_rows($res1);

        if ($num != 0 && $num1 != 0) {
            //proceed
            $lat1 = mysql_result($res,0,"lat");
            $lon1 = mysql_result($res,0,"lon");
            $lat2 = mysql_result($res1,0,"lat");
            $lon2 = mysql_result($res1,0,"lon");
            $dist = calc_dist($lat1, $lon1, $lat2, $lon2);
            if (is_numeric($dist)) {
                return $dist;
            }
            else
            {
                return "Unknown";
            }
        }
        else
        {
            return "Unknown";
        }
    }



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
    public static function validateAddress($venue, $postcode){

        try {

            $geocode = Geocoder::geocode($venue);

            if($geocode['zipcode'] != (string) $postcode){
                return null;
            }


            return $geocode;

        } catch (\Exception $e) {
            // Here we will get "The FreeGeoIpProvider does not support 
            // Street addresses." ;)
            return null;
        }



    }



}
?>
