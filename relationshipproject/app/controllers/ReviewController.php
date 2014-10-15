<?php

class ReviewController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

    protected $layout = "layouts.default";
    
	public function getWebsite()
	{
        $this->layout->title = 'Review our website - Isha SoulAce';
        $this->layout->content = View::make('reviews.website');
        
	}

	public function getServices()
	{
        $this->layout->title = 'Review services - Isha SoulAce';
        $this->layout->content = View::make('reviews.services');
        
	}
	
	public function getWorkshops()
	{
        $this->layout->title = 'Review workshops - Isha SoulAce';
        $this->layout->content = View::make('reviews.workshops');
        
	}

}