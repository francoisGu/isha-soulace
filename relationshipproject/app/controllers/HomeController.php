<?php

class HomeController extends BaseController {

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
    
	public function getHome()
	{
        $this->layout->title = 'Isha SoulAce - Home';
        $this->layout->content = View::make('home');
        
	}

	public function getAbout()
	{
        $this->layout->title = 'About Us - Isha SoulAce';
        $this->layout->content = View::make('about');
        
	}

}
