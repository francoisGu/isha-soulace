<?php

class FinancialController extends \BaseController {



public function storeComment()
{
   
    
    Financial::saveFormData(Input::except(array('_token')));
return Redirect::to('services/options');
}

}