<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
 */
// Route that handles submission of review - rating/comment

/*Route::post('/', array('before'=>'csrf', function()
{
  $input = array(
  'email_address' => Input::get('email_address'),
	'rating'  => Input::get('rating'),
	'review_content' => Input::get('review_content')
	
  );
  // instantiate Rating model
  $reviews = new reviews;

  // Validate that the user's input corresponds to the rules specified in the review model
 // $validator = Validator::make( $input, $review->getCreateRules());

  // If input passes validation - store the review in DB, otherwise return to product page with error message 
  //if ($validator->passes()) {
	$reviews->storeReviewForProduct($input['email_address'], $input['rating'], $input['review_content']);
	//return Redirect::to('products/'.$id.'#reviews-anchor')->with('review_posted',true);
  //}

  //return Redirect::to('products/'.$id.'#reviews-anchor')->withErrors($validator)->withInput();
}));
*/
Route::group(array('prefix' => 'api'), function() {

	// since we will be using this just for CRUD, we won't need create and edit
	// Angular will handle both of those forms
	// this ensures that a user can't access api/create or api/edit when there's nothing there
	Route::resource('comments', 'CommentController', 
		array('only' => array('index', 'store', 'destroy')));
});
//App::bind(
//'App\Interfaces\UserAccountInterface',
//'app\models\User'
/*);*/

//App::bind(
//'App\Interfaces\PasswordInterface',
//'app\models\PasswordReminder'
/*);*/


Route::get('/client_admin', function()
{
    return View::make('client');
});
Route::get('/login_admin', function()
    {
        return View::make('login_admin');
    });
Route::get('/serviceList', function()
{
	return View::make('serviceList');
});

Route::get('/login', function()
    {
        return View::make('login');
    });
Route::get('/register', function()
    {
        return View::make('register');
    });

Route::get('/', function()
{
    return Redirect::to('home');//View::make('home');
});

Route::post('services/accommodation', 'AccommodationController@storeComment');
Route::post('reviews/website', 'WebReviewsController@storeComment');
Route::post('reviews/workshops', 'WorkshopReviewsController@storeComment');
Route::post('reviews/services', 'ServicesReviewsController@storeComment');

Route::controller('services','ServiceFormController');
//Route::controller('reviews', 'ReviewController');
Route::get('password/remind', array('uses' => 'PasswordController@getRemind'));
Route::get('password/reset', array('uses' => 'PasswordController@getReset'));
Route::post('password/remind', array('uses' => 'PasswordController@postRemind'));
Route::post('/password/reset/', array('uses' => 'PasswordController@postReset'));

Route::get('reviews/website', array('uses' => 'ReviewController@getWebsite'));
Route::get('reviews/services', array('uses' => 'ReviewController@getServices'));
Route::get('reviews/workshops', array('uses' => 'ReviewController@getWorkshops'));
/*Route::get('workshops/', function(){*/

    //return View::make('workshops.index');
//Route::post('WebReview', function()
//{
  //      $obj = new WebReviewsController() ;
    //    return $obj->store();
//});

//});
//Route::group(array('prefix' => 'api'), function() {

    //Route::resource('workshops', 'WorkshopsController', 
        //array('only' => array('index', 'store', 'destroy', 'create', 'edit')));
//});

Route::resource('workshops', 'WorkshopsController');
Route::resource('ServiceProviders', 'ServiceProvidersController');
//Route::resource('Administrators', 'AdministratorsController');
//Route::get('password/remind', array('uses' => 'PasswordController@getRemind'));
//Route::get('password/reset', array('uses' => 'PasswordController@getReset'));
//Route::post('password/remind', array('uses' => 'PasswordController@postRemind'));
//Route::post('/password/reset/', array('uses' => 'PasswordController@postReset'));
Route::controller('password', 'PasswordController');
Route::get( '/activate/{activationCode}', array( 'uses' => 'UsersController@activate' )); 
Route::controller('users', 'UsersController');
Route::controller('/', 'HomeController');
Route::controller('emails', 'EmailController');
//Route::controller('password', 'PasswordController');

Route::controller('map', 'MapController');

Route::resource('payment', 'PaypalPaymentController');
Route::resource('payment', 'PaymentController');

/* HTML Macros */
HTML::macro('smartNavMenu', function($url, $text) {
    $class = ( Request::is($url) || Request::is($url.'/*') ) ? ' class="active"' : '';
    return '<li'.$class.'><a href="'.URL::to($url).'">'.$text.'</a></li>';
});
HTML::macro('startSmartDropdown', function($url) {
    $class = ( Request::is($url) || Request::is($url.'/*') ) ? ' class="active"' : '';
    return ''.$class.' class="dropdown"';
});
