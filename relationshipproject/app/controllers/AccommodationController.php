<?php

class AccommodationController extends \BaseController {



public function storeComment()
{
   
    
    Accommodation::saveFormData(Input::except(array('_token')));

$message = array('type' => Input::get('type'), 'postcode' => Input::get('postcode'));


    return Redirect::action('ServiceFormController@getOptions', $message);

}

}
