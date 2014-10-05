<?php

class WebReviewsController extends \BaseController {


public function store()
{
   
    
    Register::saveFormData(Input::except(array('_token')));

}

}
