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
			return View::make('backPage.panelAdministrativo.inicio');
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
		$respuesta = Input::only('user', 'password', 'recordar');
		$user      = $respuesta['user'];
		$password  = $respuesta['password'];
		$password  = $respuesta['password'];
		$recordar  = $respuesta['recordar'];
		if ($recordar = 'Si') {
			$recordar = true;
		} else {
			$recordar = false;
		}
		if (Auth::attempt(array('alias' => $user, 'password' => $password), $recordar)) {
			return Redirect::intended('/PanelAdministrativo');
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