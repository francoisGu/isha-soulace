<?php

class FamilyController extends \BaseController {



public function storeComment()
{
   
    
    Family::saveFormData(Input::except(array('_token')));

    $type = Input::get('type');
    $postcode = Input::get('postcode');

    return Redirect::to('services/options/'.$type. '/' . $postcode);

}

}
