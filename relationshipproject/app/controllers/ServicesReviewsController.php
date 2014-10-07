<?php

class ServicesReviewsController extends \BaseController {



public function storeComment()
{
   
    
    ServicesReviews::saveFormData(Input::except(array('_token')));

}

}
