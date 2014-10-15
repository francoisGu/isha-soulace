<?php

class WorkshopReviewsController extends \BaseController {



public function storeComment()
{
   
    
    WorkshopReviews::saveFormData(Input::except(array('_token')));

}

}
