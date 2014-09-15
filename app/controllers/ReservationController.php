<?php

class ReservationController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /reservation
	 *
	 * @return Response
	 */
	public function index() {
		$Boats = Boat::where('public', '=', '1')->orderBy('order', 'ASC')->get();
		$Tours = Tour::where('public', '=', '1')->orderBy('order', 'ASC')->get();
		return View::make('frontPage/vistaFormulario')->with('boats', $Boats)->with('tours', $Tours);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /reservation/create
	 *
	 * @return Response
	 */
	public function create() {
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /reservation
	 *
	 * @return Response
	 */
	public function store() {
		//
	}

	/**
	 * Display the specified resource.
	 * GET /reservation/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /reservation/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /reservation/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /reservation/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id) {
		//
	}

}