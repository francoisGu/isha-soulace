<?php

class AccommodationController extends \BaseController {



public function storeComment()
{
   
    
    Accommodation::saveFormData(Input::except(array('_token')));

    $type = Input::get('type');
    $postcode = Input::get('postcode');

    return Redirect::to('services/options/'.$type. '/' . $postcode);

}

}
