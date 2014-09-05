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
Route::get('/account/profile', function()
{
	return View::make('account/profile');
});
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
	return View::make('home');
});

Route::get('/about', function()
{
	return View::make('about');
});
