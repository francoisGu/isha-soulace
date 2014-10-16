<?php

class FitnessController extends \BaseController {



public function storeComment()
{
   
    
    Fitness::saveFormData(Input::except(array('_token')));
	return Redirect::to('services/options');

}

}