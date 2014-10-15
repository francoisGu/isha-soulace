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

# Standard User Routes
Route::group(['before' => 'sentry|serviceProviders'], function(){

    Route::resource('serviceProviders', 'ServiceProvidersController');
    Route::resource('workshopAdvertisements', 'WorkshopAdvertisementsController');
    Route::resource('workshops', 'WorkshopsController');

    Route::group(['prefix' => 'myworkshops'], function(){

        Route::get('/', 'WorkshopsController@getMyWorkshops');
        Route::get('/myclients/', 'ClientsController@getClients');
        Route::post('/myclients/', 'ClientsController@searchClients');

    });

});

# Admin Routes
Route::group(['before' => 'sentry|admin'], function(){

    Route::get('/map', 'MapController@getMap');
    Route::post('/map', 'MapController@postMap');

});

Route::when('admin/*', 'admin');

Route::get('ad', function(){

    return View::make('serviceProvider.advertiseWS');

});

Route::group(['prefix' => 'workshoplist'], function(){

    Route::get('/', 'WorkshopsController@getWorkshoplist');
    Route::post('/', 'WorkshopsController@searchWorkshop');

});

Route::get('/', function()
    {
        return Redirect::to('home');//View::make('home');
    });

Route::controller('services','ServiceFormController');

Route::get('/about', function()
    {
        return View::make('about');
    });

//Route::group(array('prefix' => 'api'), function() {

//Route::resource('workshops', 'WorkshopsController', 
//array('only' => array('index', 'store', 'destroy', 'create', 'edit')));
//});
//Route::get('serviceProviders/myworkshops', 'ServiceProvidersController@getMyWorkshops');


Route::controller('users', 'UsersController');
Route::get('workshopAdvertisements/premium', 'WorkshopAdvertisementsController@getPremiumAdvertisements');



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

