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

//App::bind(
//'App\Interfaces\UserAccountInterface',
//'app\models\User'
/*);*/

//App::bind(
//'App\Interfaces\PasswordInterface',
//'app\models\PasswordReminder'
/*);*/

/*View::composer('map.map', function($view){*/
        //$config = array();
        //$config['center'] = 'auto';
        //$config['zoom'] = 'auto';
        ////$config['places'] = TRUE;
        ////$config['placesLocation'] = 'auto';
        ////$config['placesRadius'] = '200';
        //$config['onboundschanged'] = 'if (!centreGot) {
            //var mapCentre = map.getCenter();
            //marker_0.setOptions({
                //position: new google.maps.LatLng(mapCentre.lat(), mapCentre.lng())
            //});
            //}
            //centreGot = true;';

        //Gmaps::initialize($config);

        //// set up the marker ready for positioning
        //// once we know the users location
        //$marker = array();
        //Gmaps::add_marker($marker);

        //$map = Gmaps::create_map();

    //$view->with('map', $map);

//});

Route::get('/map', 'MapController@getMap');
Route::post('/map', 'MapController@postMap');
//Route::controller('map', 'MapController');


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

// Route::controller('services','ServiceFormController');

Route::get('services/accommodation', array('uses' => 'ServiceFormController@getAccommodation'));
Route::get('services/familylaw', array('uses' => 'ServiceFormController@getFamilyLaw'));
Route::get('services/fitnessandnutrition', array('uses' => 'ServiceFormController@getFitnessandNutrition'));
Route::get('services/mentalwellbeing', array('uses' => 'ServiceFormController@getMentalwellbeing'));
Route::get('services/financialadvice', array('uses' => 'ServiceFormController@getFinancialadvice'));
Route::get('services/options', array('uses' => 'ServiceFormController@getOptions'));
Route::get('services/mentors', array('uses' => 'ServiceFormController@getMentors'));
Route::post('services/accommodation', array('uses' => 'ServiceFormController@postAccommodation'));
Route::post('services/familylaw', array('uses' => 'ServiceFormController@postFamilyLaw'));
Route::post('services/fitnessandnutrition', array('uses' => 'ServiceFormController@postFitnessandNutrition'));
Route::post('services/mentalwellbeing', array('uses' => 'ServiceFormController@postMentalwellbeing'));
Route::post('services/financialadvice', array('uses' => 'ServiceFormController@postFinancialadvice'));
Route::post('services/options', array('uses' => 'ServiceFormController@postOptions'));
Route::post('services/mentors', array('uses' => 'ServiceFormController@postMentors'));
Route::controller('reviews', 'ReviewController');
Route::get('password/remind', array('uses' => 'PasswordController@getRemind'));
Route::get('password/reset', array('uses' => 'PasswordController@getReset'));
Route::post('password/remind', array('uses' => 'PasswordController@postRemind'));
Route::post('/password/reset/', array('uses' => 'PasswordController@postReset'));

Route::get('reviews/website', array('uses' => 'ReviewController@getWebsite'));
Route::get('reviews/services', array('uses' => 'ReviewController@getServices'));
Route::get('reviews/workshops', array('uses' => 'ReviewController@getWorkshops'));
/*Route::get('workshops/', function(){*/

    //return View::make('workshops.index');

//});
//Route::group(array('prefix' => 'api'), function() {

    //Route::resource('workshops', 'WorkshopsController', 
        //array('only' => array('index', 'store', 'destroy', 'create', 'edit')));
//});
//Route::get('serviceProviders/myworkshops', 'ServiceProvidersController@getMyWorkshops');


Route::controller('users', 'UsersController');
Route::get('workshopAdvertisements/premium', 'WorkshopAdvertisementsController@getPremiumAdvertisements');

Route::resource('workshops', 'WorkshopsController');
Route::resource('serviceProviders', 'ServiceProvidersController');

Route::get('/myworkshops', 'WorkshopsController@getMyWorkshops');

//Route::get('/myworkshops', function(){
    
    //return View::make('serviceProviders.myWorkshops');

/*});*/

Route::resource('workshopAdvertisements', 'WorkshopAdvertisementsController');
Route::resource('tickets', 'TicketsController');
Route::resource('clients', 'ClientsController');
//Route::resource('Administrators', 'AdministratorsController');
//Route::get('password/remind', array('uses' => 'PasswordController@getRemind'));
//Route::get('password/reset', array('uses' => 'PasswordController@getReset'));
//Route::post('password/remind', array('uses' => 'PasswordController@postRemind'));
//Route::post('/password/reset/', array('uses' => 'PasswordController@postReset'));
Route::controller('password', 'PasswordController');
Route::get( '/activate/{activationCode}', array( 'uses' => 'UsersController@activate' )); 

Route::controller('/', 'HomeController');
Route::controller('emails', 'EmailController');
//Route::controller('password', 'PasswordController');
<<<<<<< HEAD

Route::controller('map', 'MapController');

Route::resource('payment', 'PaypalPaymentController');
=======
>>>>>>> ae237e1f39cbdec1c84ed7fb6f10bb641d1dc4a9
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
