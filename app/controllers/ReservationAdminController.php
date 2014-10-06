<?php

class ReservationAdminController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /reservationadmin
	 *
	 * @return Response
	 */
	public function __construct() {
		// Exit if not ajax
		$this->beforeFilter('ajax', array('only' => 'store'));
		// Exit if not a valid _token
		$this->beforeFilter('csrf', array('only' => 'store'));
	}
	public function index() {
		return View::make('backPage.panelAdministrativo.Reservations.form');
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /reservationadmin/create
	 *
	 * @return Response
	 */
	public function create() {
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /reservationadmin
	 *
	 * @return Response
	 */
	public function store() {
		$inputs = Input::all();
		// var_dump($inputs);
		if ($inputs['reservacion'] != "") {
			$Reservaciones = Reservation::where('id', '=', $inputs['reservacion']);
		} else {
			if ($inputs['fecha'] == "") {
				return 'llene almenos la fecha';
			}
			$Reservaciones = Reservation::where('date', '=', $inputs['fecha']);
			if ($inputs['hora'] != 'Todas') {
				$Reservaciones = $Reservaciones->where('tour_id', '=', $inputs['hora']);
			}
			if ($inputs['tipoDeEmbarcacion'] != 'Ambos') {
				$Reservaciones = $Reservaciones->where('boat_id', '=', $inputs['tipoDeEmbarcacion']);
			}
			if ($inputs['activa'] == '0') {
				$Reservaciones = $Reservaciones->onlyTrashed();
			} elseif ($inputs['activa'] == 'Todas') {
				$Reservaciones = $Reservaciones->withTrashed();
			}
		}
		$Reservaciones = $Reservaciones->with('client', 'paymentstatus', 'boat')->orderBy('boat_id', 'ASC')->orderBy('tour_id', 'ASC')->orderBy('paymentStatus_id', 'DESC')->get();
		return View::make('backPage.panelAdministrativo.Reservations.list')->with('Reservaciones', $Reservaciones)->with('valores', $inputs);
		echo '<pre>';
		var_dump($reservacion);
		echo '</pre>';
	}

	/**
	 * Display the specified resource.
	 * GET /reservationadmin/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($numeroDeReserva) {
		if (!isset($numeroDeReserva)) {
			$inputs          = Input::all();
			$numeroDeReserva = $inputs['numeroDeReserva'];
		}
		$reservacion = Reservation::where('id', '=', $numeroDeReserva)->first();

		return View::make('backPage.panelAdministrativo.Reservations.individual')->with('Reservacion', $reservacion);
		echo '<pre>';
		var_dump($reservacion);
		echo '</pre>';

	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /reservationadmin/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /reservationadmin/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /reservationadmin/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id) {
		//
	}

}