<?php

class BoatController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /boat
	 *
	 * @return Response
	 */
	public function index() {
		if (Auth::check()) {
			$boats = Boat::all();
			// echo 'hola';
			return View::make('backPage.panelAdministrativo.Boat.show')->with('boats', $boats);
		}
	}
	public function getByDate($date) {
		if (Auth::check()) {
			$paseos        = Tour::all();
			$embarcaciones = Boat::all();

		} else {
			$paseos        = Tour::where('public', '=', '1')->get();
			$embarcaciones = Boat::where('public', '=', '1')->get();
		}
		foreach ($embarcaciones as $embarcacion) {
			// $datos[$embarcacion->name]           = [];
			$datos[$embarcacion->name]['maximo'] = $embarcacion->abordajemaximo;
			$datos[$embarcacion->name]['normal'] = $embarcacion->abordajenormal;
			foreach ($paseos as $paseo) {

				$reservas = Reservation::where('date', '=', $date)->where('tour_id', '=', $paseo->id)->where('boat_id', '=', $embarcacion->id)->get();
				if ($reservas->count() > 0):
				$datos[$embarcacion->name]['ocupados'][$paseo->id] = $reservas->sum('adults')+$reservas->sum('olders')+$reservas->sum('childs');

				 else :
				$datos[$embarcacion->name]['ocupados'][$paseo->id] = 0;
				endif;
				$precio                                                     = $paseo->prices()->orderBy('id', 'DESC')->first();
				$datos[$embarcacion->name]['precio'][$paseo->id]['adulto']  = $precio->adult;
				$datos[$embarcacion->name]['precio'][$paseo->id]['mayor']   = $precio->older;
				$datos[$embarcacion->name]['precio'][$paseo->id]['nino']    = $precio->child;
				$datos[$embarcacion->name]['disponiblesNormal'][$paseo->id] = ($datos[$embarcacion->name]['normal']-$datos[$embarcacion->name]['ocupados'][$paseo->id]) > 0?$datos[$embarcacion->name]['normal']-$datos[$embarcacion->name]['ocupados'][$paseo->id]:0;
				$datos[$embarcacion->name]['disponiblesMaximo'][$paseo->id] = ($datos[$embarcacion->name]['maximo']-$datos[$embarcacion->name]['ocupados'][$paseo->id]) > 0?($datos[$embarcacion->name]['maximo']-$datos[$embarcacion->name]['ocupados'][$paseo->id]):0;
			}
			$datos[$embarcacion->name]['disponiblesNormalDia'] = array_sum($datos[$embarcacion->name]['disponiblesNormal']);
			$datos[$embarcacion->name]['disponiblesMaximoDia'] = array_sum($datos[$embarcacion->name]['disponiblesMaximo']);
		}
		return Response::json(array('cupos' => $datos));

	}
	public function getByDatePriv($date) {

		$paseos        = Tour::all();
		$embarcaciones = Boat::all();
		foreach ($embarcaciones as $embarcacion) {
			// $datos[$embarcacion->name]           = [];
			$datos[$embarcacion->name]['maximo'] = $embarcacion->abordajemaximo;
			$datos[$embarcacion->name]['normal'] = $embarcacion->abordajenormal;
			foreach ($paseos as $paseo) {

				$reservas = Reservation::where('date', '=', $date)->where('tour_id', '=', $paseo->id)->where('boat_id', '=', $embarcacion->id)->get();
				if ($reservas->count() > 0):
				$datos[$embarcacion->name]['ocupados'][$paseo->id] = $reservas->sum('adults')+$reservas->sum('olders')+$reservas->sum('childs');

				 else :
				$datos[$embarcacion->name]['ocupados'][$paseo->id] = 0;
				endif;
				$precio                                                     = $paseo->prices()->orderBy('id', 'DESC')->first();
				$datos[$embarcacion->name]['precio'][$paseo->id]['adulto']  = $precio->adult;
				$datos[$embarcacion->name]['precio'][$paseo->id]['mayor']   = $precio->older;
				$datos[$embarcacion->name]['precio'][$paseo->id]['nino']    = $precio->child;
				$datos[$embarcacion->name]['disponiblesNormal'][$paseo->id] = ($datos[$embarcacion->name]['normal']-$datos[$embarcacion->name]['ocupados'][$paseo->id]) > 0?$datos[$embarcacion->name]['normal']-$datos[$embarcacion->name]['ocupados'][$paseo->id]:0;
				$datos[$embarcacion->name]['disponiblesMaximo'][$paseo->id] = ($datos[$embarcacion->name]['maximo']-$datos[$embarcacion->name]['ocupados'][$paseo->id]) > 0?($datos[$embarcacion->name]['maximo']-$datos[$embarcacion->name]['ocupados'][$paseo->id]):0;
			}
			$datos[$embarcacion->name]['disponiblesNormalDia'] = array_sum($datos[$embarcacion->name]['disponiblesNormal']);
			$datos[$embarcacion->name]['disponiblesMaximoDia'] = array_sum($datos[$embarcacion->name]['disponiblesMaximo']);
		}
		return Response::json(array('cupos' => $datos));

	}

	/**
	 * Show the form for creating a new resource.
	 * GET /boat/create
	 *
	 * @return Response
	 */
	public function create() {
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /boat
	 *
	 * @return Response
	 */
	public function store() {
		//
	}

	/**
	 * Display the specified resource.
	 * GET /boat/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /boat/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /boat/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /boat/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id) {
		//
	}

}