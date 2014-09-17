<?php

class AccountController extends BaseController {

	protected $layout = "layouts.menu";

	public function getProfile() {
		$this->layout->content = View::make('account.profile');
	}
     
    public function getAdvertise() {
		$this->layout->content = View::make('account.advertiseWS');
	}

    public function getWorkshops() {
		$this->layout->content = View::make('account.myWorkshops');
	}

	public function getReview() {
		$this->layout->content = View::make('account.review');
	}

	public function getClients() {
		$this->layout->content = View::make('account.myClients');
	}



}
