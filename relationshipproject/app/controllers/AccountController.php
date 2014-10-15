<?php

class AccountController extends BaseController {

	protected $layout = "layouts.menu";

	public function getProfile() {
		$user = new User;
		
		$this->layout->content = View::make('account.profile');
		
	}else return Redirect::to('users/login');
	}
	public function postProfile() {
		$user = new User;
		if(Sentry::Check()) {
			$user = User::where('email', '=', Sentry::getUser()->email)->first();
			 $user->first_name = Input::get('firstname');
			 $user->last_name = Input::get('lastname');
			 $user->save();
		}
		return Redirect::to('account/profile');
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
