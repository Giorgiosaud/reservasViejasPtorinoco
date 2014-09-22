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
Route::resource('/PanelAdministrativo', 'PanelAdministrativoController');
Route::get('/logout', function () {
		Auth::logout();
		return Redirect::intended('/PanelAdministrativo');
	});
Route::resource('/reserva', 'ReservationController');
Route::resource('/FechaDistinta', 'FechaDistintaController');
Route::resource('/SpecialDate', 'SpecialDateController');
Route::resource('/boat', 'BoatController');
Route::get('/boat/bydate/{date}', 'BoatController@getByDate');
Route::get('/reserv/{date}/{embarcacion}/{hora}', function ($date, $embarcacion, $hora) {
		$tour = Tour::where('id', '=', $hora)->first();
		$tour = Tour::where('id', '=', $hora)->first()->reservations()->where('date', '=', $date);
		echo $tour->sum('adults');
	});
Route::resource('/client', 'ClientController');
Route::get('/reservas/informacion/{id}', function ($id) {
		if (Auth::check()) {

			$reservacion = Reservation::where('id', '=', $id)->first();
			$creditoUsado = 0;
			$cliente = $reservacion->client()->first();
			Mercadopago::sandbox_mode(TRUE);

			$preference_data = array(

				"items" => array(
					array(
						"title"       => "Paseo en Catamaran",
						"quantity"    => 1,
						"currency_id" => "VEF",
						"unit_price"  => $reservacion->montoConServicio,
						"description" => "Paquete completo reservado en Catamaran",
					)
				),
				"payer" => array(
					array(
						"name"    => $cliente->name,
						"surname" => $cliente->lastname,
						"email"   => $cliente->email
					)
				),
				"back_urls" => array(
					"success"  => "http://www.puertorinoco.com/reservas/mercadopago/notificaciones/sucess.php?idreserva=".$reservacion->id,
					"failure"  => "http://www.puertorinoco.com/reservas/mercadopago/notificaciones/failure.php?idreserva=".$reservacion->id,
					"pending"  => "http://www.puertorinoco.com/reservas/mercadopago/notificaciones/pending.php?idreserva=".$reservacion->id
				),
				"payment_methods"           => array(
					"excluded_payment_methods" => array(),
					"excluded_payment_types"   => array(
						array("id"                => "ticket"),
						array("id"                => "atm")
					)
				),
				"external_reference" => $reservacion->id
			);
			$preference = Mercadopago::create_preference($preference_data);
			$linkmp = $preference['response']['init_point'];
			return View::make('frontPage.vistaReserva')->with('reservacion', $reservacion)->with('linkmp', $linkmp)->with('creditoUsado', $creditoUsado);} else {
			return 'logueate';
		}

	});
Route::get('/pruebamp', function () {
		print_r($accessToken);

	});
// Route::post('/client/byidentification', 'ClientController@postById');