<?php

class SpecialDateController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /specialdate
	 *
	 * @return Response
	 */
	public function index() {
		//
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /specialdate/create
	 *
	 * @return Response
	 */
	public function create() {
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /specialdate
	 *
	 * @return Response
	 */
	public function store() {
		//
	}

	/**
	 * Display the specified resource.
	 * GET /specialdate/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id) {
		$fechas = Specialdate::all();
		// echo $fechas->count();
		$cantidadDeFechas = $fechas->count();
		$i                = 0;
		foreach ($fechas as $fecha) {
			if ($fecha->active == 1) {
				$activo = true;
			} else {
				$activo = false;
			}
			$respuesta[$i][0] = $fecha->date;
			$respuesta[$i][1] = $activo;
			$respuesta[$i][2] = $fecha->class;
			$respuesta[$i][3] = $fecha->description;
			$i++;
		}
		$diasDeLaSemana = ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'];
		$i              = 0;
		foreach ($diasDeLaSemana as $dia) {
			$variable        = Variable::where('name', '=', $dia)->first();
			$weekDays[$i][0] = $dia;
			if ($variable->value == 0):
			$activo      = false;
			$clase       = "no se Trabaja";
			$descripcion = "mantenimiento";
			 else :
			$activo      = true;
			$clase       = "se Trabaja";
			$descripcion = "";
			endif;
			$weekDays[$i][1] = $activo;
			$weekDays[$i][2] = $clase;
			$weekDays[$i][3] = $descripcion;
			$i++;
		}
		$minimoReservar = Variable::where('name', '=', 'minDiasParaReservar')->first()->value;
		$temporadaBaja  = Variable::where('name', '=', 'temporadaBaja')->first()->value;
		return Response::json(array('dates' => $respuesta, 'weekDays' => $weekDays, 'temporadaBaja' => $temporadaBaja, 'minReservar' => $minimoReservar));
		return View::make('obtener/fechasDistintas')->with('fechas', $fechas);
	}

	public function get() {
		$fechas = Specialdate::all();
		return Response::json(array($fechas));
	}
	/**
	 * Show the form for editing the specified resource.
	 * GET /specialdate/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /specialdate/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /specialdate/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id) {
		//
	}

}