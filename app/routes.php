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

Route::get('/', function () {
		return View::make('hello');
	});
Route::resource('/reserva', 'ReservationController');
Route::resource('/FechaDistinta', 'FechaDistintaController');
Route::resource('/SpecialDate', 'SpecialDateController');
Route::resource('/boat', 'BoatController');
Route::get('/boat/bydate/{date}', 'BoatController@getByDate');
Route::post('/client/byidentification/{identification}', 'ClientController@getById');