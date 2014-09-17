<?php

class ClientController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /client
	 *
	 * @return Response
	 */
	public function index() {
		//
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /client/create
	 *
	 * @return Response
	 */
	public function create() {
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /client
	 *
	 * @return Response
	 */

	public function store() {
		//
	}

	/**
	 * Display the specified resource.
	 * GET /client/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id) {
		$cliente = Client::where('identification', '=', $id)->first();
		if ($cliente):
		$datosDeCliente = array(
			'name'           => $cliente->name,
			'lastName'       => $cliente->lastname,
			'identification' => $cliente->identification,
			'email'          => $cliente->email,
			'phone'          => $cliente->phone
		);

		return Response::json(array('datos' => $datosDeCliente));
		 else :
		return Response::json(array('datos' => 'noExisten'));
		endif;
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /client/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /client/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /client/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id) {
		//
	}

}