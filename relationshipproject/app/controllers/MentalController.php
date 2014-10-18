<?php

class MentalController extends \BaseController {



public function storeComment()
{
   
    
    Mental::saveFormData(Input::except(array('_token')));
	return Redirect::to('services/options');

}

}