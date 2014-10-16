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
        return View::make('reviews.website');
        
	}

	public function getServices()
	{
        return View::make('reviews.services');
        
	}
	
	public function getWorkshops()
	{
        return View::make('reviews.workshops');
        
	}

	public function postWebsite()
	{
         $websiteReview = Input:: all();
         if(!Client::is_email_existed($websiteReview['email']))
         {
         	return Redirect::back()->with('message', 'Email doesn\'t exist!');
         }
         	
         else if(WebsiteReview::has_reviewed($websiteReview['email']))
         {
         	return Redirect::back()->with('message', 'You have already reviewed for the website!');
         }
         else 
         {
         	$newReview = WebsiteReview::create($websiteReview);
            return Redirect::back()->with('message', 'You have successfully reviewed for us. Thank you!');
         }	
         
	}

	public function postServices()
	{
        $serviceReview = Input:: all();
         // if(!Client::is_form_id_existed($serviceReview['form_id']))
         // {
         // 	return Redirect::back()->with('message', 'Form_id doesn\'t exist!');
         // }
         	
         if(ServiceReview::has_reviewed($serviceReview['form_id']))
         {
         	return Redirect::back()->with('message', 'You have already reviewed for this service!');
         }
         else 
         {
         	$newReview = ServiceReview::create($serviceReview);
            return Redirect::back()->with('message', 'You have successfully reviewed for it. Thank you!');
         }	
        
	}
	
	public function postWorkshops()
	{
        $workshopReview = Input:: all();
         if(!Ticket::is_ticket_existed($workshopReview['ticketNumber']))
         {
         	return Redirect::back()->with('message', 'Ticket doesn\'t exist!');
         }
         	
         else if(WorkshopReview::has_reviewed($workshopReview['ticketNumber']))
         {
         	return Redirect::back()->with('message', 'You have already reviewed for this workshop!');
         }
         else 
         {
         	$ticket = Ticket::where('ticketNumber', $workshopReview['ticketNumber'])->first();
         	$workshop = $ticket->workshop;
         	$workshop->save($workshopReview); 
         	$workshopReview['workshop_id'] = $workshop->id;
            $newReview = WorkshopReview::create($workshopReview);
            return Redirect::back()->with('message', 'You have successfully reviewed for it. Thank you!');
         }	
        
	}

}