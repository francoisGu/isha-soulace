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

Route::controller('services','ServiceFormController');
Route::get('password/remind', array('uses' => 'PasswordController@getRemind'));
Route::get('password/reset', array('uses' => 'PasswordController@getReset'));
Route::post('password/remind', array('uses' => 'PasswordController@postRemind'));
Route::post('/password/reset/', array('uses' => 'PasswordController@postReset'));

Route::get('/about', function()
    {
        return View::make('about');
    });

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
Route::controller('/', 'HomeController');
Route::controller('emails', 'EmailController');
//Route::controller('password', 'PasswordController');

Route::controller('map', 'MapController');

Route::resource('payment', 'PaypalPaymentController');
