<?php

class ServiceProviderController extends BaseController {

protected $layout = "layouts.menu";

public function getProfile() {
	if(Sentry::Check()) {
		$user = User::getUser();
		$serviceProvider = ServiceProvider::getServiceProvider($user->id);
		$this->layout->content = View::make('serviceProvider.profile',array('user' => $user,'serviceProvider'=>$serviceProvider));

	}
	else
		return Redirect::to('users/login');
}
public function postProfile() {
	if(Sentry::Check()) {
		$user = User::updateUser();
		ServiceProvider::updateServiceProvider($user->id);
	}
	return Redirect::to('serviceProvider/profile');
}

public function getAdvertise() {
	$this->layout->content = View::make('serviceProvider.advertiseWS');
}

public function getWorkshops() {
	$this->layout->content = View::make('serviceProvider.myWorkshops');
}

public function getReview() {
	$this->layout->content = View::make('serviceProvider.review');
}

public function getClients() {
	if(Sentry::Check()) {
		$user = User::getUser();
		$clients = Client::getClients($user->id);
		$this->layout->content = View::make('serviceProvider.myClients', array('user' => $user, 'clients' => $clients));
	}
}

}



