<?php

class PanelAdministrativoController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /administrativepanel
	 *
	 * @return Response
	 */
	public function index() {
		if (Auth::check()) {
			return 'Esta logueado';
		} else {
			return View::make('backPage.login');
		}
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /administrativepanel/create
	 *
	 * @return Response
	 */
	public function create() {
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /administrativepanel
	 *
	 * @return Response
	 */
	public function store() {
		$respuesta = Input::only('user', 'password');
		$user      = $respuesta['user'];
		$password  = $respuesta['password'];
		if (Auth::attempt(array('alias' => $user, 'password' => $password))) {
			return Redirect::intended('/administrativePanel');
		}
	}

	/**
	 * Display the specified resource.
	 * GET /administrativepanel/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /administrativepanel/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /administrativepanel/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /administrativepanel/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id) {
		//
	}

}