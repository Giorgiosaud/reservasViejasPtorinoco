<?php

class PruebasMP extends \BaseController {

	public function obtenerPorId($id) {
		$busqueda = array('external_reference' => $id);
		do {
			$payment_info = MP::search_payment($busqueda);
		} while ($payment_info['status'] != '200');
		// $respuesta=$payment_info[];
		echo $payment_info['status'];
		$informacion = $payment_info['response']['results'][0]['collection']['status'];
		$cantidad    = count($payment_info['response']['results']);
		echo '<pre>'.var_dump($informacion).'</pre>';
		echo $cantidad;
		if ($informacion == "appr") {

		}
	}

	/**
	 * Display a listing of the resource.
	 * GET /pruebasmp
	 *
	 * @return Response
	 */
	public function index() {
		//
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /pruebasmp/create
	 *
	 * @return Response
	 */
	public function create() {
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /pruebasmp
	 *
	 * @return Response
	 */
	public function store() {
		//
	}

	/**
	 * Display the specified resource.
	 * GET /pruebasmp/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /pruebasmp/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /pruebasmp/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /pruebasmp/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id) {
		//
	}

}