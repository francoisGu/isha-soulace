<?php 
class MapController extends BaseController {

    protected $layouts = "map.map";

    function getMap(){
        $config = array();
        $config['center'] = '185 Pelham Street Carlton 3053 VIC Australia';
        $config['zoom'] = 'auto';
        //$config['places'] = TRUE;
        //$config['placesLocation'] = 'auto';
        //$config['placesRadius'] = '200';
        $config['onboundschanged'] = 'if (!centreGot) {
            var mapCentre = map.getCenter();
            marker_0.setOptions({
                position: new google.maps.LatLng(mapCentre.lat(), mapCentre.lng())
    });
    }
    centreGot = true;';

    Gmaps::initialize($config);

    // set up the marker ready for positioning
    // once we know the users location
    //
    $geocode = Geocoder::geocode($config['center']);
    //dd($geocode);
    $this->showServiceProviders($geocode['zipcode']);

    $map = Gmaps::create_map();
    //$this->layouts->map = Gmaps::create_map();

    return View::make('map.map')->with('map', $map);
    }

    function postMap(){
        $postcode = Input::get('postcode');
        $pos = array();

        $gmap = new Map;
        $pos = $gmap -> getPositionByPostcode($postcode);

        $lat = $pos['lat'];
        $lon = $pos['lon']; 

        //$geocode = Geocoder::geocode('805/74 Queens Rd, Sydney, NSW');
        //dd($geocode['zipcode']);

        $config = $gmap -> mapConfig($lat, $lon); 

        Gmaps::initialize($config);


        $sps = $this->showServiceProviders($postcode);
        // set up the marker ready for positioning
        // once we know the users location

        //$marker = Map::generateMarker($config, "This is Lawyer Shen");
        //Gmaps::add_marker($marker);

        $map = Gmaps::create_map();
        //$this->layouts->map = Gmaps::create_map();
        return View::make('map.map', array('map' => $map));

    }


    function showServiceProviders($postcode){

        $sps = ServiceProvider::where('postcode', '=', intval($postcode))->get();

        foreach($sps as $sp){

            $marker = Map::generateMarker($sp);
            Gmaps::add_marker($marker);
        }
        //dd($sps);

        return $sps;

    }

}
?>
