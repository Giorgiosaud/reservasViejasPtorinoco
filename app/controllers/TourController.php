<?php

class TourController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /tour
	 *
	 * @return Response
	 */
	public function index() {
		if (Auth::check()) {
			$Tours = Tour::all();
			return View::make('backPage.panelAdministrativo.Tours.show')->with('Tours', $Tours);
		}
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /tour/create
	 *
	 * @return Response
	 */
	public function create() {
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /tour
	 *
	 * @return Response
	 */
	public function store() {
		//
	}

	/**
	 * Display the specified resource.
	 * GET /tour/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /tour/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /tour/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /tour/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id) {
		//
	}

}