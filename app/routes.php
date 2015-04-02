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
		return Redirect::to('/PanelAdministrativo');
	});
Route::get('/login', function () {
		return Redirect::to('/PanelAdministrativo');
	});
Route::get('/revisarPago/{id}', 'pruebasMP@obtenerPorId');
Route::resource('/reserva', 'ReservationController');
Route::pattern('identificador', '[0-9]+');
Route::get('reserva/sucess/{identificador}', 'ReservationController@successPayment');
Route::get('/mpPayment/{id}', 'ReservationController@recibirPago');
Route::post('/mpPayment', 'ReservationController@recibirPago2');
Route::get('/mpTest', 'ReservationController@testPayment');
Route::resource('/FechaDistinta', 'FechaDistintaController');
Route::resource('/SpecialDate', 'SpecialDateController');

Route::get('/logout', function () {
		Auth::logout();
		return Redirect::intended('/PanelAdministrativo');
	});
Route::get('/boat/bydate/{date}', 'BoatController@getByDate')->where('date', '\d\d\d\d\-\d\d-\d\d');
Route::get('/boatpriv/bydate/{date}', 'BoatController@getByDatePriv')->where('date', '\d\d\d\d\-\d\d-\d\d');
Route::resource('/client', 'ClientController', array('only' => array('show')));
Route::group(array('prefix'                                 => 'PanelAdministrativo'), function () {
		Route::resource('/migrate', 'migrationsController@migrate');
		Route::resource('/', 'PanelAdministrativoController', array('only' => array('index', 'store')));
		Route::group(array('before'                                        => 'auth', ), function () {
				Route::resource('/boats', 'BoatController');
				Route::resource('/tours', 'TourController');
				Route::resource('/prices', 'PriceController');
				Route::resource('/reservas/pagos', 'PaymentAdminController');
				Route::resource('/reservas/pasajeros', 'PasajerosAdminController');
				Route::get('/reservas/informacion/{id}', 'ReservationController@reservaInfo');
				Route::get('/pagoDistinto', 'ReservationController@pagoDistintoIntro');
				Route::post('/pagoDistinto', 'ReservationController@pagoDistinto');
				Route::resource('/reservas', 'ReservationAdminController');
				Route::resource('/abordaje', 'AbordajeAdminController');
				Route::resource('/others', 'OthersController');
				Route::get('/logout', function () {
						Auth::logout();
						return Redirect::intended('/PanelAdministrativo');
					});

			});
	});
