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

#Route::get('/', function()
#{
#	return View::make('hello');
#});

Route::get('/', array('uses'=>'StoreController@getIndex'));

Route::controller('admin/car_types', 'CarTypesController');
Route::controller('admin/cars', 'CarsController');
Route::controller('store', 'StoreController');
Route::controller('users', 'UsersController');
Route::controller('bookings', 'BookingsController');

#Route::post('bookings/create', 'BookingsController@postCreate');
#Route::resource('bookings', 'BookingsController');