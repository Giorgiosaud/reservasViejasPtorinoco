<?php

class ReservationAdminController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /reservationadmin
	 *
	 * @return Response
	 */
	public function __construct() {
		// Exit if not ajax
		$this->beforeFilter('ajax', array('only' => 'store'));
		// Exit if not a valid _token
		$this->beforeFilter('csrf', array('only' => array('store', 'update')));
	}
	public function index() {
		return View::make('backPage.panelAdministrativo.Reservations.form');
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /reservationadmin/create
	 *
	 * @return Response
	 */
	public function create() {
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /reservationadmin
	 *
	 * @return Response
	 */
	public function store() {
		$inputs = Input::all();
		// var_dump($inputs);
		if ($inputs['reservacion'] != "") {
			$Reservaciones = Reservation::where('id', '=', $inputs['reservacion']);
		} else {
			if ($inputs['fecha'] == "") {
				return 'llene almenos la fecha';
			}
			$Reservaciones = Reservation::where('date', '=', $inputs['fecha']);
			if ($inputs['hora'] != 'Todas') {
				$Reservaciones = $Reservaciones->where('tour_id', '=', $inputs['hora']);
			}
			if ($inputs['tipoDeEmbarcacion'] != 'Ambos') {
				$Reservaciones = $Reservaciones->where('boat_id', '=', $inputs['tipoDeEmbarcacion']);
			}
			if ($inputs['activa'] == '0') {
				$Reservaciones = $Reservaciones->onlyTrashed();
			} elseif ($inputs['activa'] == 'Todas') {
				$Reservaciones = $Reservaciones->withTrashed();
			}
		}
		$Reservaciones = $Reservaciones->with('client', 'paymentstatus', 'boat')->orderBy('boat_id', 'ASC')->orderBy('tour_id', 'ASC')->orderBy('paymentStatus_id', 'DESC')->get();
		return View::make('backPage.panelAdministrativo.Reservations.list')->with('Reservaciones', $Reservaciones)->with('valores', $inputs);
	}

	/**
	 * Display the specified resource.
	 * GET /reservationadmin/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($numeroDeReserva) {
		if (!isset($numeroDeReserva)) {
			$inputs          = Input::all();
			$numeroDeReserva = $inputs['numeroDeReserva'];
		}
		$reservacion = Reservation::withTrashed()->where('id', '=', $numeroDeReserva)->first();

		$paseos        = Tour::all();
		$embarcaciones = Boat::all();
		foreach ($embarcaciones as $embarcacion) {
			// $datos[$embarcacion->name]           = [];
			$datos[$embarcacion->name]['maximo'] = $embarcacion->abordajemaximo;
			$datos[$embarcacion->name]['normal'] = $embarcacion->abordajenormal;
			foreach ($paseos as $paseo) {

				$reservas      = Reservation::where('date', '=', $reservacion->dateOriginal)->where('tour_id', '=', $paseo->id)->where('boat_id', '=', $embarcacion->id)->get();
				$datos['test'] = $reservas->count();
				if ($reservas):
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
		$Boats = Boat::orderBy('order', 'ASC')->get();
		$Tours = Tour::orderBy('order', 'ASC')->get();
		return View::make('backPage.panelAdministrativo.Reservations.individual')->with('Reservacion', $reservacion)->with('datos', $datos)->with('boats', $Boats)->with('tours', $Tours);
		echo '<pre>';
		var_dump($reservacion);
		echo '</pre>';

	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /reservationadmin/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /reservationadmin/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id) {
		$inputs                  = Input::all();
		$Reserva                 = Reservation::find($id);
		$cliente                 = Client::find($Reserva->client_id);
		$cliente->name           = $inputs['name'];
		$cliente->lastname       = $inputs['lastname'];
		$cliente->identification = $inputs['identification'];
		$cliente->email          = $inputs['email'];
		$cliente->phone          = $inputs['phone'];
		$cliente->save();
		echo '<pre>';
		var_dump(Input::all());
		echo '</pre>';
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /reservationadmin/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id) {
		//
	}

}