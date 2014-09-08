<?php
class ReservarController extends BaseController {

	/**
	 * Show the profile for the given user.
	 */
	public function mostrarFormulario() {
		JavaScript::put(['foo' => 'bar']);
		return View::make('frontPage.vistaFormulario');
	}

}