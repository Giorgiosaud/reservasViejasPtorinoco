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

Route::get('/boat/bydate/{date}', 'BoatController@getByDate')->where('date', '\d\d\d\d\-\d\d-\d\d');
Route::resource('/client', 'ClientController', array('only'          => array('show')));
Route::group(array('prefix'                                          => 'PanelAdministrativo'), function () {
		Route::resource('/', 'PanelAdministrativoController', array('only' => array('index', 'store')));
		Route::group(array('before'                                        => 'auth', ), function () {
				Route::resource('/boats', 'BoatController');
				Route::resource('/tours', 'TourController');
				Route::resource('/prices', 'PriceController');
				Route::get('/reservas/informacion/{id}', 'ReservationController@reservaInfo');
				Route::resource('/reservas', 'ReservationAdminController');
				Route::get('/logout', function () {
						Auth::logout();
						return Redirect::intended('/PanelAdministrativo');
					});

			});
	});
// Route::post('/client/byidentification', 'ClientController@postById');