<?php

class ServiceFormController extends BaseController {

    protected $layout = "layouts.default_forms";
    
	public function getFamilylaw()
	{
        $this->layout->title = 'Family Law - Isha SoulAce';
        $this->layout->content = View::make('services.family_law');
        
	}
	
	public function getMentalwellbeing()
	{
        $this->layout->title = 'Mental Wellbeing, Counselling - Isha SoulAce';
        $this->layout->content = View::make('services.mental_wellbeing');
        
	}
	
	public function getAccommodation()
	{
        $this->layout->title = 'Accommodation - Isha SoulAce';
        $this->layout->content = View::make('services.accommodation');
        
	}
	
	public function getFinancialadvice()
	{
        $this->layout->title = 'Financial Advice - Isha SoulAce';
        $this->layout->content = View::make('services.financial_advice');
        
	}
	
	public function getFitnessandnutrition()
	{
        $this->layout->title = 'Fitness & Nutrition - Isha SoulAce';
        $this->layout->content = View::make('services.fitness_and_nutrition');
        
	}
	
	public function getMentors() {
	  $this->layout->title = 'Support Networks & Mentors';
	  $this->layout->content = View::make('services.mentors');
	}
	
    public function getOptions($message)
	{

        $type = $message['type'];
        $postcode = $message['postcode'];
        $serviceProviders = ServiceProvider::searchServiceProviders($postcode, $type); 
        $this->layout->title = 'Your contact options - Isha SoulAce';
        $this->layout->content = View::make('services.options')->with('serviceProviders', $serviceProviders);
	
	}
	
	public function postFamilylaw(){
	
		return Redirect::to('services/options');
	}
	public function postMentalwellbeing()
	{
		return Redirect::to('services/options');
        
	}
	
	public function postAccommodation()
	{
		return Redirect::to('services/options');
        
	}
	
	public function postFinancialadvice()
	{
		return Redirect::to('services/options');
        
	}
	
	public function postFitnessandnutrition()
	{
		return Redirect::to('services/options');
        
	}

}
