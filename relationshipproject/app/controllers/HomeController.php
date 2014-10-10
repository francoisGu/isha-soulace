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

    protected $layout = "layouts.menu";

	public function getDonations()
	{
		$this->layout->content = View::make('donations');
	}

	public function getSponsors()
	{
		$this->layout->content = View::make('sponsors');
	}

	public function getHome()
	{
		$this->layout->content = View::make('home');
	}

	public function getAbout()
	{
		$this->layout->content = View::make('about');
	}

	public function getReviews()
	{		
		$this->layout->content = View::make('reviews');
	}

	public function getRemove()
	{		
		$this->layout->content = View::make('removeHistory');
	}

	public function postReviews()
	{
		$review = Review::getReview(Input::get('form_id'));
		if(is_null($review)) {
            $review = Review::create(array(
            	'form_id' => Input::has('form_id') ? Input::get('form_id') : null,
            	'rating' => Input::has('ratings') ? Input::get('score') : null,
            	'review_content' => Input::has('review_content') ? Input::get('review_content') : null,
            	));
            
            return Redirect::to('/reviews')->with('message','You have reviewed successfully! Thank you!');
		}
		
		return Redirect::to ('/reviews')->with('message','You have already reviewed for this service!')->with('review', $review);
	}

}
