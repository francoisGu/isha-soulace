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
Route::get('/admin', function()
{
	return View::make('login_admin');
});
Route::get('/serviceList', function()
{
	return View::make('serviceList');
});
// Route::controller('home', 'HomeController');

Route::get('/', function()
{
    return View::make('home');
});

Route::get('/about', function()
{
    return View::make('about');
});


Route::get( '/activate/{activationCode}', array( 'uses' => 'UsersController@activate' )); 
Route::controller('users', 'UsersController');
Route::controller('account', 'AccountController');
Route::controller('emails', 'EmailController');
Route::controller('password', 'PasswordController');

Route::controller('map', 'MapController');

Route::resource('payment', 'PaymentController');


