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
<<<<<<< HEAD
*/
// Route::get('account/myClients', function()
// {
// 	return View::make('account/myClients');
// });
// Route::get('account/review', function()
// {
// 	return View::make('account/review');
// });
// Route::get('account/myWorkshops', function()
// {
// 	return View::make('account/myWorkshops');
// });
// Route::get('account/advertiseWS', function()
// {
// 	return View::make('account/advertiseWS');
// });
// Route::get('account/profile', function()
// {
// 	return View::make('account/profile');
// });
Route::get('/clientTable', function()
{
	return View::make('client_admin');
});

// Route::get('/admin', function()
// {
// 	return View::make('login_admin');
// });


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
// Route::controller('home', 'HomeController');



// Route::get('/about', function()
// {
//     return View::make('about');
// });

// Route::get('/donations', function()
// {
//     return View::make('donations');
// });


/*Route::get('workshops/', function(){*/

    //return View::make('workshops.index');

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
Route::controller('serviceProvider', 'ServiceProviderController');
Route::controller('emails', 'EmailController');

Route::controller('password', 'PasswordController');
Route::controller('/', 'HomeController');
Route::controller('map', 'MapController');

Route::resource('payment', 'PaymentController');



//Route::controller('password', 'PasswordController');

Route::controller('map', 'MapController');

Route::resource('payment', 'PaypalPaymentController');

