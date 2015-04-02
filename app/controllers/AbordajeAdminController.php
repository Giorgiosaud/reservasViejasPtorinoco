<?php

class AbordajeAdminController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /abordajeadmin
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
		// Exit if not ajax
		return View::make('backPage.panelAdministrativo.Abordaje.form');
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /abordajeadmin/create
	 *
	 * @return Response
	 */
	public function create() {

	}

	/**
	 * Store a newly created resource in storage.
	 * POST /abordajeadmin
	 *
	 * @return Response
	 */
	public function store() {
		$inputs = Input::all();
		// return '<pre>'.var_dump($inputs).'</pre>';
		if ($inputs['fecha'] == "") {
			return 'llene almenos la fecha';
		}
		$Reservaciones = Reservation::where('date', '=', $inputs['fecha'])->where('tour_id', '=', $inputs['hora'])->where('boat_id', '=', $inputs['tipoDeEmbarcacion']);
		$Reservaciones = $Reservaciones->with('client', 'paymentstatus', 'boat')->orderBy('boat_id', 'ASC')->orderBy('tour_id', 'ASC')->orderBy('paymentStatus_id', 'DESC')->get();
		return View::make('backPage.panelAdministrativo.Abordaje.list')->with('Reservaciones', $Reservaciones)->with('valores', $inputs);
	}

	/**
	 * Display the specified resource.
	 * GET /abordajeadmin/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /abordajeadmin/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /abordajeadmin/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /abordajeadmin/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id) {
		//
	}

}