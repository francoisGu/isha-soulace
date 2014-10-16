<?php

class FamilyController extends \BaseController {



public function storeComment()
{
   
    
    Family::saveFormData(Input::except(array('_token')));
	return Redirect::to('services/options');

}

}