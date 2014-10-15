<?php

class WebReviewsController extends \BaseController {



public function storeComment()
{
   
    
    WebReviews::saveFormData(Input::except(array('_token')));

}

}
