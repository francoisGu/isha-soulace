<?php 
class MapController extends BaseController {

    protected $layouts = "map.map";

    function getMap(){
        $config = array();
        $config['center'] = 'auto';
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
        $marker = array();
        Gmaps::add_marker($marker);

        $map = Gmaps::create_map();
        //$this->layouts->map = Gmaps::create_map();

        return View::make('map.map', array('map' => $map));
    }

    function postMap(){
        $postcode = Input::get('postcode');
        $pos = array();

        $gmap = new Map;
        $pos = $gmap -> getPositionByPostcode($postcode);

        $lat = $pos['lat'];
        $lon = $pos['lon']; 

        $config = $gmap -> mapConfig($lat, $lon); 

        Gmaps::initialize($config);

        // set up the marker ready for positioning
        // once we know the users location
        $marker = $gmap -> generateMarker($config, "This is Lawyer Shen");
        Gmaps::add_marker($marker);

        $map = Gmaps::create_map();
        //$this->layouts->map = Gmaps::create_map();
        return View::make('map.map', array('map' => $map));

    }

}
?>
