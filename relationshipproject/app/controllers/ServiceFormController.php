<?php

class ServiceFormController extends BaseController {

    protected $layout = "layouts.default";
    
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


}
