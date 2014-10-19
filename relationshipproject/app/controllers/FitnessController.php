<?php

class FitnessController extends \BaseController {



public function storeComment()
{
   
    
    Fitness::saveFormData(Input::except(array('_token')));

    $type = Input::get('type');
    $postcode = Input::get('postcode');

    return Redirect::to('services/options/'.$type. '/' . $postcode);


}

}
