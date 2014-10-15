<?php

class AccommodationController extends \BaseController {



public function storeComment()
{
   
    
    Accommodation::saveFormData(Input::except(array('_token')));

}

}
