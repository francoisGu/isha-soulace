<?php
include( "DataTables.php" );
use
DataTables\Editor,
DataTables\Editor\Field,
DataTables\Editor\Format,
DataTables\Editor\Join,
DataTables\Editor\Validate;
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
		json_encode($clients);
		$this->layout->content = View::make('serviceProvider.myClients', array('user' => $user));
	}
}

// pubic function postClients() {
// 	if(Sentry::Check()) {
// 		Editor::inst( $db, 'datatables_demo' )
// 		->fields(
// 			Field::inst( 'first_name' )->validator( 'Validate::notEmpty' ),
// 			Field::inst( 'last_name' )->validator( 'Validate::notEmpty' ),
// 			Field::inst( 'position' ),
// 			Field::inst( 'email' ),
// 			Field::inst( 'office' ),
// 			Field::inst( 'extn' )->validator( 'Validate::numeric' ),
// 			Field::inst( 'age' )->validator( 'Validate::numeric' ),
// 			Field::inst( 'salary' )->validator( 'Validate::numeric' ),
// 			Field::inst( 'start_date' )
// 			->validator( 'Validate::dateFormat', array(
// 				"format"  => Format::DATE_ISO_8601,
// 				"message" => "Please enter a date in the format yyyy-mm-dd"
// 				) )
// 			->getFormatter( 'Format::date_sql_to_format', Format::DATE_ISO_8601 )
// 			->setFormatter( 'Format::date_format_to_sql', Format::DATE_ISO_8601 )
// 			)
// 		->process( $_POST )
// 		->json();
// 	}
}



