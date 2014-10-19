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
Route::post('services/familylaw', 'FamilyController@storeComment');
Route::post('services/accommodation', 'AccommodationController@storeComment');
Route::post('services/financialadvice', 'FinancialController@storeComment');
Route::post('services/fitnessandnutrition', 'FitnessController@storeComment');
Route::post('services/mentalwellbeing', 'MentalController@storeComment');
//Route::post('/registerworkshop/{id}', 'ClientsController@registerWorkshop');
# Standard User Routes
Route::group(['before' => 'sentry|serviceProviders'], function(){

    Route::get('serviceProviders/{id}', 'ServiceProvidersController@show');

    Route::group(['before' => 'verified'], function(){
        Route::resource('serviceProviders', 'ServiceProvidersController', array('except' => array('show')));
        Route::resource('workshopAdvertisements', 'WorkshopAdvertisementsController');
        Route::resource('workshops', 'WorkshopsController');

        Route::group(['prefix' => 'myclients'], function(){

            Route::get('/', 'ClientsController@getSPClients');

        });

        Route::group(['prefix' => 'myworkshops'], function(){

            Route::get('/', 'WorkshopsController@getMyWorkshops');
            Route::get('/myclients/', 'ClientsController@getClients');
            Route::post('/myclients/', 'ClientsController@searchClients');

        });
    });

});

# Admin Routes
Route::group(['before' => 'sentry|admin'], function(){

    Route::get('/map', 'MapController@getMap');
    Route::post('/map', 'MapController@postMap');

});

Route::when('admin/*', 'sentry');
Route::when('admin/*', 'admin');

Route::get('ad', function(){

    return View::make('serviceProvider.advertiseWS');

});

Route::group(['prefix' => 'workshoplist'], function(){

    Route::get('/{id}', 'WorkshopsController@selectWorkshop');
    Route::get('/', 'WorkshopsController@getWorkshoplist');
    Route::post('/', 'WorkshopsController@searchWorkshop');

});

Route::get('/', function()
    {
        return Redirect::to('home');//View::make('home');
    });

Route::get('/sponsors',array('as' => 'sponsors','uses'=>'SponsorController@getSponsors'));
Route::post('/sponsors',array('as' => 'sponsors-post','uses'=>'SponsorController@postSponsors'));
Route::get('/donations',array('as' => 'donations','uses'=>'HomeController@getDonations'));
Route::post('/donations', array('as' => 'pay-donation-post','uses' => 'PaypalController@postDonation'));
Route::get('/pay_advertise/{advertise_id}', array('as' => 'pay-advertise','uses' => 'PaypalController@payAdvertisement'));
Route::post('/registerworkshop', array('as'=>'pay-workshop-post','uses' => 'PaypalController@postPayWorkshops'));
Route::get('/payment/done/{payum_token}', array('as' => 'payment_done', 'uses' => 'PaymentController@done'));

Route::controller('services','ServiceFormController');
Route::get('services/accommodation', array('uses' => 'ServiceFormController@getAccommodation'));
Route::get('services/familylaw', array('uses' => 'ServiceFormController@getFamilyLaw'));
Route::get('services/fitnessandnutrition', array('uses' => 'ServiceFormController@getFitnessandNutrition'));
Route::get('services/mentalwellbeing', array('uses' => 'ServiceFormController@getMentalwellbeing'));
Route::get('services/financialadvice', array('uses' => 'ServiceFormController@getFinancialadvice'));
Route::get('services/options', array('uses' => 'ServiceFormController@getOptions'));
Route::get('services/mentors', array('uses' => 'ServiceFormController@getMentors'));
//Route::post('services/accommodation', array('uses' => 'ServiceFormController@postAccommodation'));
//Route::post('services/familylaw', array('uses' => 'ServiceFormController@postFamilyLaw'));
//Route::post('services/fitnessandnutrition', array('uses' => 'ServiceFormController@postFitnessandNutrition'));
//Route::post('services/mentalwellbeing', array('uses' => 'ServiceFormController@postMentalwellbeing'));
//Route::post('services/financialadvice', array('uses' => 'ServiceFormController@postFinancialadvice'));
//Route::post('services/options', array('uses' => 'ServiceFormController@postOptions'));
//Route::post('services/mentors', array('uses' => 'ServiceFormController@postMentors'));


Route::controller('users', 'UsersController');
Route::controller('reviews', 'ReviewController');

//Route::resource('tickets', 'TicketsController');
//Route::resource('clients', 'ClientsController');
//Route::resource('Administrators', 'AdministratorsController');
//Route::get('password/remind', array('uses' => 'PasswordController@getRemind'));
//Route::get('password/reset', array('uses' => 'PasswordController@getReset'));
//Route::post('password/remind', array('uses' => 'PasswordController@postRemind'));
//Route::post('/password/reset/', array('uses' => 'PasswordController@postReset'));
Route::controller('password', 'PasswordController');
Route::get( '/activate/{activationCode}', array( 'uses' => 'UsersController@activate' )); 


Route::controller('/', 'HomeController');
//Route::controller('emails', 'EmailController');
//Route::controller('password', 'PasswordController');
//

/* HTML Macros */
HTML::macro('smartNavMenu', function($url, $text) {
    $class = ( Request::is($url) || Request::is($url.'/*') ) ? ' class="active"' : '';
    return '<li'.$class.'><a href="'.URL::to($url).'">'.$text.'</a></li>';
});
HTML::macro('startSmartDropdown', function($url) {
    $class = ( Request::is($url) || Request::is($url.'/*') ) ? ' class="active"' : '';
    return ''.$class.' class="dropdown"';
});


App::missing(function($exception){
        return Response::view('errors.missing', array(), 404);
        //return Redirect::to('someurl');
});
