<?php

class PasajerosAdminController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /pasajerosadmin
	 *
	 * @return Response
	 */
	public function index() {
		//
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /pasajerosadmin/create
	 *
	 * @return Response
	 */
	public function create() {
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /pasajerosadmin
	 *
	 * @return Response
	 */
	public function store() {
		$Passenger                 = new Passenger;
		$Passenger->name           = Input::get('name');
		$Passenger->lastname       = Input::get('lastname');
		$Passenger->identification = Input::get('identification');
		$Passenger->email          = Input::get('email');
		$Passenger->phone          = Input::get('phone');
		$Passenger->reservation_id = Input::get('reserva');
		$Passenger->save();
		$return = '<tr><td>'.$Passenger->name.'</td><td>'.$Passenger->lastname.'</td><td>'.$Passenger->identification.'</td><td>'.$Passenger->email.'</td><td>'.$Passenger->phone.'</td><td>borrar</td></tr>';
		return $return;
	}

	/**
	 * Display the specified resource.
	 * GET /pasajerosadmin/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /pasajerosadmin/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /pasajerosadmin/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /pasajerosadmin/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id) {
		//
	}

}