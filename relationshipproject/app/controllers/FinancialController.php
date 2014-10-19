<?php

class FinancialController extends \BaseController {



public function storeComment()
{
   
    
    Financial::saveFormData(Input::except(array('_token')));
$message = array('type' => Input::get('type'), 'postcode' => Input::get('postcode'))

    return Redirect::to('services/options/', $message, false);

}

}
