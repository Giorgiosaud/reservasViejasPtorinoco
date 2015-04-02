<?php

class ReservationController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /reservation
	 *
	 * @return Response
	 */
	public function __construct() {
		// Exit if not ajax
		$this->beforeFilter('ajax', array('only' => 'store'));
		// Exit if not a valid _token
		$this->beforeFilter('csrf', array('only' => 'store'));
	}
	public function index() {
		if (Auth::check()) {
			$Boats = Boat::orderBy('order')->get();
			$Tours = Tour::orderBy('order')->get();

		} else {
			$Boats = Boat::where('public', '=', '1')->orderBy('order', 'ASC')->get();
			$Tours = Tour::where('public', '=', '1')->orderBy('order', 'ASC')->get();
		}
		$tempaltaAdult    = Variable::where('name', '=', 'adultosPagoClubTemporadaAlta')->get();
		$tempaltaAdultMay = Variable::where('name', '=', 'ninosymayoresPagoClubTemporadaAlta')->get();
		$tempBajaAdult    = Variable::where('name', '=', 'adultosPagoClubTemporadaBaja')->get();
		$tempBajaAdultMay = Variable::where('name', '=', 'ninosymayoresPagoClubTemporadaBaja')->get();
		$temporadaBaja    = Variable::where('name', '=', 'temporadaBaja')->first()->value;
		return View::make('frontPage.vistaFormulario')->with('boats', $Boats)->with('tours', $Tours)->with(compact('tempaltaAdult'))->with(compact('tempaltaAdultMay'))->with(compact('tempBajaAdult'))->with(compact('tempBajaAdultMay'))->with(compact('temporadaBaja'));
	}
	public function reservaInfo($id) {
		if (Auth::check()) {
			$reservacion  = Reservation::where('id', '=', $id)->first();
			$creditoUsado = 0;
			$cliente      = $reservacion->client()->first();
			// Mercadopago::sandbox_mode(TRUE);
			$preference_data = array(
				"items" => array(
					array(
						"title"       => "Paseo en Catamaran",
						"quantity"    => 1,
						"currency_id" => "VEF",
						"unit_price"  => $reservacion->montoConServicio,
						"description" => "Paquete completo reservado en Catamaran",
					)
				),
				"payer" => array(
					array(
						"name"    => $cliente->name,
						"surname" => $cliente->lastname,
						"email"   => $cliente->email
					)
				),
				"back_urls" => array(
					"success"  => "http://reservas.puertorinoco.com/reserva/sucess/".$reservacion->id,
					"failure"  => "http://reservas.puertorinoco.com/reserva/failure/".$reservacion->id,
					"pending"  => "http://reservas.puertorinoco.com/reserva/pending/".$reservacion->id
				),
				"payment_methods"           => array(
					"excluded_payment_methods" => array(),
					"excluded_payment_types"   => array(
						array("id"                => "ticket"),
						array("id"                => "atm")
					)
				),
				"external_reference" => $reservacion->id
			);
			$preference = MP::create_preference($preference_data);
			$linkmp     = $preference['response']['init_point'];
			return View::make('frontPage.vistaReserva')->with('reservacion', $reservacion)->with('linkmp', $linkmp)->with('creditoUsado', $creditoUsado);} else {
			return 'logueate';
		}

	}
	public function pagoDistintoIntro() {
		return View::make('backPage.pagoscasabote');
	}
	public function pagoDistinto() {
		$inputs = Input::all();
		// return $inputs['monto'];
		$monto = (float) $inputs['monto'];
		if (Auth::check()) {
			$preference_data = array(

				"items" => array(
					array(
						"title"       => "Pago en Casabote",
						"currency_id" => "VEF",
						"unit_price"  => $monto,
						"quantity"    => 1,
						"category_id" => "tickets",
						"description" => "Paquete completo reservado en Catamaran",
						'picture_url' => 'http://www.puertorinoco.com/home/images/galeria_puertorinoco/IMG_3932.jpg',
					)
				),
				"payer" => array(
					array(
						"name"    => $inputs['nombre'],
						"surname" => "casabote", //apellido
						"email"   => $inputs['email']
					)
				),
				// 'back_urls'=array(
				// 			'success'=>'urlsuccess',
				// 			'pending'=>'urlPending',
				// 			'failure'='urlfailure'),
				// auto_return=>'approved',
				//
				"payment_methods"           => array(
					"excluded_payment_methods" => array(
						// array("id"=>'visa'),
						// array("id"=>'master'),
						// array("id"=>'mercantil'),
						// array("id"=>'provincial'),
						// array("id"=>'account_money'),
					),
					"excluded_payment_types" => array(
						// array("id"              => "ticket"),
						// array("id"              => "account_money"),
						// array("id"              => "bank_transfer"),
						// array("id"              => "atm"),
						// array("id" => "credit_card"),
						// array("id" => "debit_card")
					),
					// 'installments'=>'1',
					// 'default_payment_method_id'=>array("id"=>'visa'),
					// default_installments=>'1'
				),
				// 'shipments'=>array(
				// 			'receiver_address'=>array(
				// 							'zip_code'=>'12341',
				// 							'street_name'=>'stname m',
				// 							'street_number'=>'123',
				// 							'floor'=>'2',
				// 							'apartment'=>'2-A'
				// 							)
				// 			),
				//
				// 'notification_url'->'urlnotif',
				"external_reference" => "Pago en Casa Bote"
				// 'expires'=>'true',//true La preferencia sólo es válida en un período de tiempo determinado
				// 'expiration_date_from'=>'date',//Fecha de inicio de validez de la preferencia de pago
				// 'expiration_date_to'=>'date',//Fecha de fin de validez de la preferencia de pago (Ver ISO-8601)
				// 'additional_info'=>'informacion aadicional',
				// 'marketplace_fee'=>'Comisión que cobras a través de tu MercadoPago Application',
				//
			);
			$preference = MP::create_preference($preference_data);
			$linkmp     = $preference['response']['init_point'];
			return View::make('backPage.pagoCB')->with('linkmp', $linkmp);} else {
			return 'logueate';
		}

	}
	/**
	 * Show the form for creating a new resource.
	 * GET /reservation/create
	 *
	 * @return Response
	 */
	public function create() {
		// $input = Input::get('name', 'lastName');
		// var_dump($input);
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /reservation
	 *
	 * @return Response
	 */
	public function store() {
		$rules = array(
			'rifInicio'      => 'required',
			'identification' => 'required',
			'name'           => 'regex:/^([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/',
			'lastName'       => 'regex:/^([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/',
			'email'          => 'required|email',
			'phone'          => 'required',
			'fecha'          => 'required|date_format:Y-m-d',
			'pasajesadultos' => 'integer',
			'3eraEdad'       => 'integer',
			'ninos'          => 'integer',
			'hora'           => 'required',
			'Boat'           => 'required',
			'condiciones'    => 'required',
		);
		$messages = array(
			'required' => 'Este Campo debe ser llenado',
			'alpha'    => 'Este Campo debe ser llenado solo con letras quizas necesites reescribir este dato',
			'integer'  => 'Este Campo debe ser llenado solo con numeros',
			'email'    => 'Este Campo debe ser llenado con un correo valido',
		);
		$validator = Validator::make(Input::all(), $rules, $messages);
		if ($validator->fails()) {

			// get the error messages from the validator
			$messages = $validator->messages();
			var_dump($messages);

			// redirect our user back to the form with the errors from the validator
			return Redirect::to('reserva')->withErrors($validator)->withInput();
		}

		$input = Input::all();
		// var_dump($input);
		$client      = Input::only('rifInicio', 'identification', 'name', 'lastName', 'email', 'phone');
		$reservation = Input::only('fecha', 'pasajesadultos', '3eraEdad', 'ninos', 'hora', 'Boat');
		// var_dump($reservation);
		//verificar si cliente existe
		//
		$searchClient = Client::where('identification', '=', $client['rifInicio'].'-'.$client['identification'])->orwhere('email', '=', $client['email'])->orwhere('phone', '=', $client['phone'])->get();
		if ($searchClient->count() > 0):
		//si existe lo utilizo
		$cliente = $searchClient->first();
		 else :
		// sino lo creo
		$cliente = new Client;
		endif;
		// actualizar o crear datos de cliente
		$cliente->name           = $client['name'];
		$cliente->lastname       = $client['lastName'];
		$cliente->identification = $client['rifInicio'].'-'.$client['identification'];
		$cliente->email          = $client['email'];
		$cliente->phone          = $client['phone'];
		$cliente->save();
		// verificar si est duplicada la reserva
		$boat = Boat::where('name', '=', $reservation['Boat'])->first();
		$tour = Tour::where('id', '=', $reservation['hora'])->first();

		$precio              = $tour->getPrices();
		$montoTotal          = ($reservation['pasajesadultos']*$precio->adult)+($reservation['3eraEdad']*$precio->older)+($reservation['ninos']*$precio->child);
		$busquedaReservacion = Reservation::where('client_id', '=', $cliente->id)
		                                                                    ->where('date', '=', $reservation['fecha'])
		                                                                    ->where('boat_id', '=', $boat->id)
			->where('tour_id', '=', $tour->id)->get();

		if ($busquedaReservacion->count() > 0):

		return View::make('frontPage.vistaReservaDuplicada')->with('busquedaReservacion', $busquedaReservacion);
		 else :
		if ($cliente->credit > 0) {
			$montoTotal = $montoTotal-($cliente->credit);
			if ($montoTotal >= 0) {
				$creditoUsado    = $cliente->credit;
				$cliente->credit = 0;
			} else {
				$creditoUsado    = $cliente->credit;
				$cliente->credit = -$montoTotal;
				$montoTotal      = 0;
			}
			$cliente->save();
		} else {
			$creditoUsado = $cliente->credit;
		}
		$reservacion               = new Reservation;
		$reservacion->date         = $reservation['fecha'];
		$reservacion->references   = 'Nueva Reservacion';
		$reservacion->adults       = $reservation['pasajesadultos'];
		$reservacion->olders       = $reservation['3eraEdad'];
		$reservacion->childs       = $reservation['ninos'];
		$reservacion->totalAmmount = $montoTotal;
		$reservacion->client_id    = $cliente->id;
		$reservacion->boat_id      = $boat->id;
		$reservacion->tour_id      = $tour->id;
		if (Auth::check()) {
			$reservacion->madeBy = Auth::user()->alias;
		}
		$reservacion->save();
		if ($reservacion->totalAmmount > 0):
		$preference_data = array(

			"items" => array(
				array(
					"title"       => "Paseo en Catamaran",
					"quantity"    => 1,
					"currency_id" => "VEF",
					"unit_price"  => $reservacion->montoConServicio,
					"description" => "Paquete completo reservado en Catamaran",
				)
			),
			"payer" => array(
				array(
					"name"    => $cliente->name,
					"surname" => $cliente->lastname,
					"email"   => $cliente->email
				)
			),
			"back_urls" => array(
				"success"  => "http://reservas.puertorinoco.com/reserva/sucess/".$reservacion->id,
				"failure"  => "http://reservas.puertorinoco.com/reserva/failure/".$reservacion->id,
				"pending"  => "http://reservas.puertorinoco.com/reserva/pending/".$reservacion->id
			),
			"payment_methods"           => array(
				"excluded_payment_methods" => array(),
				"excluded_payment_types"   => array(
					array("id"                => "ticket"),
					array("id"                => "atm")
				)
			),
			"external_reference" => $reservacion->id
		);
		$preference = MP::create_preference($preference_data);
		$linkmp     = $preference['response'][MP::text_mp_sandbox_mode()];
		endif;
		$data = array('reservacion' => $reservacion, 'linkmp' => $linkmp, 'creditoUsado' => $creditoUsado);
		Mail::send('frontPage.vistaReserva', $data, function ($message) use ($cliente, $reservacion) {
				$message->subject('Reservacion '.$reservacion->id.' hecha por '.$reservacion->client->name.' '.$reservacion->client->lastname);
				$message->to($cliente->email);
				$url = URL::to('/reservas/informacion/').'/'.$reservacion->id;
				$message->cc('puertorinoco@gmail.com');
			});
		return View::make('frontPage.vistaReserva')->with('reservacion', $reservacion)->with('linkmp', $linkmp)->with('creditoUsado', $creditoUsado);
		endif;

	}

	/**
	 * Display the specified resource.
	 * GET /reservation/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function recibirPago($id) {
		$serverResponse                       = Input::all();
		$id                                   = $id;
		$payment_info                         = MP::get_payment_info($id);
		$payment_info                         = MP::get_payment_info($id);
		$respuesta['idMercadoPago']           = $payment_info["response"]["collection"]["id"];
		$respuesta['site_id']                 = $payment_info["response"]["collection"]["site_id"];
		$respuesta['operation_type']          = $payment_info["response"]["collection"]["operation_type"];
		$respuesta['order_id']                = $payment_info["response"]["collection"]["order_id"];
		$respuesta['external_reference']      = $payment_info["response"]["collection"]["external_reference"];
		$respuesta['status']                  = $payment_info["response"]["collection"]["status"];
		$respuesta['status_detail']           = $payment_info["response"]["collection"]["status_detail"];
		$respuesta['payment_type']            = $payment_info["response"]["collection"]["payment_type"];
		$respuesta['date_created']            = $payment_info["response"]["collection"]["date_created"];
		$respuesta['last_modified']           = $payment_info["response"]["collection"]["last_modified"];
		$respuesta['date_approved']           = $payment_info["response"]["collection"]["date_approved"];
		$respuesta['money_release_date']      = $payment_info["response"]["collection"]["money_release_date"];
		$respuesta['currency_id']             = $payment_info["response"]["collection"]["currency_id"];
		$respuesta['transaction_amount']      = $payment_info["response"]["collection"]["transaction_amount"];
		$respuesta['shipping_cost']           = $payment_info["response"]["collection"]["shipping_cost"];
		$respuesta['finance_charge']          = isset($payment_info["response"]["collection"]["finance_charge"])?$payment_info["response"]["collection"]["finance_charge"]:'0';
		$respuesta['total_paid_amount']       = $payment_info["response"]["collection"]["total_paid_amount"];
		$respuesta['net_received_amount']     = $payment_info["response"]["collection"]["net_received_amount"];
		$respuesta['reason']                  = $payment_info["response"]["collection"]["reason"];
		$respuesta['payerId']                 = $payment_info["response"]["collection"]["payer"]["id"];
		$respuesta['payerfirst_name']         = $payment_info["response"]["collection"]["payer"]["first_name"];
		$respuesta['payerlast_name']          = $payment_info["response"]["collection"]["payer"]["last_name"];
		$respuesta['payernickname']           = $payment_info["response"]["collection"]["payer"]["nickname"];
		$respuesta['payeremail']              = $payment_info["response"]["collection"]["payer"]["email"];
		$respuesta['phonearea_code']          = $payment_info["response"]["collection"]["payer"]["phone"]["area_code"];
		$respuesta['phonenumber']             = $payment_info["response"]["collection"]["payer"]["phone"]["number"];
		$respuesta['phoneextension']          = $payment_info["response"]["collection"]["payer"]["phone"]["extension"];
		$respuesta['collectorid']             = $payment_info["response"]["collection"]["collector"]["id"];
		$respuesta['collectorfirst_name']     = $payment_info["response"]["collection"]["collector"]["first_name"];
		$respuesta['collectorlast_name']      = $payment_info["response"]["collection"]["collector"]["last_name"];
		$respuesta['collectoremail']          = $payment_info["response"]["collection"]["collector"]["email"];
		$respuesta['collectornickname']       = $payment_info["response"]["collection"]["collector"]["nickname"];
		$respuesta['collectorphonearea_code'] = $payment_info["response"]["collection"]["collector"]["phone"]["area_code"];
		$respuesta['collectorphonenumber']    = $payment_info["response"]["collection"]["collector"]["phone"]["number"];
		$respuesta['collectorphoneextension'] = $payment_info["response"]["collection"]["collector"]["phone"]["extension"];
		// Mercadopago::unguard();
		$nuevoMP = Mercadopago::create($respuesta);
		// $statusCode = $payment_info[;
		// if($respuesta)
		//
		return View::make('frontPage.PagoRecibido')->with('respuesta', $respuesta);
		// return Response::view('frontPage.PagoRecibido')->with('respuesta', $respuesta)->header('Content-Type', $type);
	}
	public function recibirPago2() {
		$serverResponse = Input::all();
		$id             = $serverResponse['id'];
		// $id                                   = $serverResponse['idMercadoPago'];
		// return $id;
		$payment_info = MP::get_payment_info($id);
		// return '<pre>'.var_dump($payment_info).'</pre>';
		$respuesta['idMercadoPago']           = $payment_info["response"]["collection"]["id"];
		$respuesta['site_id']                 = $payment_info["response"]["collection"]["site_id"];
		$respuesta['operation_type']          = $payment_info["response"]["collection"]["operation_type"];
		$respuesta['order_id']                = $payment_info["response"]["collection"]["order_id"];
		$respuesta['external_reference']      = $payment_info["response"]["collection"]["external_reference"];
		$respuesta['status']                  = $payment_info["response"]["collection"]["status"];
		$respuesta['status_detail']           = $payment_info["response"]["collection"]["status_detail"];
		$respuesta['payment_type']            = $payment_info["response"]["collection"]["payment_type"];
		$respuesta['date_created']            = $payment_info["response"]["collection"]["date_created"];
		$respuesta['last_modified']           = $payment_info["response"]["collection"]["last_modified"];
		$respuesta['date_approved']           = $payment_info["response"]["collection"]["date_approved"];
		$respuesta['money_release_date']      = $payment_info["response"]["collection"]["money_release_date"];
		$respuesta['currency_id']             = $payment_info["response"]["collection"]["currency_id"];
		$respuesta['transaction_amount']      = $payment_info["response"]["collection"]["transaction_amount"];
		$respuesta['shipping_cost']           = $payment_info["response"]["collection"]["shipping_cost"];
		$respuesta['finance_charge']          = isset($payment_info["response"]["collection"]["finance_charge"])?$payment_info["response"]["collection"]["finance_charge"]:'0';
		$respuesta['total_paid_amount']       = $payment_info["response"]["collection"]["total_paid_amount"];
		$respuesta['net_received_amount']     = $payment_info["response"]["collection"]["net_received_amount"];
		$respuesta['reason']                  = $payment_info["response"]["collection"]["reason"];
		$respuesta['payerId']                 = $payment_info["response"]["collection"]["payer"]["id"];
		$respuesta['payerfirst_name']         = $payment_info["response"]["collection"]["payer"]["first_name"];
		$respuesta['payerlast_name']          = $payment_info["response"]["collection"]["payer"]["last_name"];
		$respuesta['payernickname']           = $payment_info["response"]["collection"]["payer"]["nickname"];
		$respuesta['payeremail']              = $payment_info["response"]["collection"]["payer"]["email"];
		$respuesta['phonearea_code']          = $payment_info["response"]["collection"]["payer"]["phone"]["area_code"];
		$respuesta['phonenumber']             = $payment_info["response"]["collection"]["payer"]["phone"]["number"];
		$respuesta['phoneextension']          = $payment_info["response"]["collection"]["payer"]["phone"]["extension"];
		$respuesta['collectorid']             = $payment_info["response"]["collection"]["collector"]["id"];
		$respuesta['collectorfirst_name']     = $payment_info["response"]["collection"]["collector"]["first_name"];
		$respuesta['collectorlast_name']      = $payment_info["response"]["collection"]["collector"]["last_name"];
		$respuesta['collectoremail']          = $payment_info["response"]["collection"]["collector"]["email"];
		$respuesta['collectornickname']       = $payment_info["response"]["collection"]["collector"]["nickname"];
		$respuesta['collectorphonearea_code'] = $payment_info["response"]["collection"]["collector"]["phone"]["area_code"];
		$respuesta['collectorphonenumber']    = $payment_info["response"]["collection"]["collector"]["phone"]["number"];
		$respuesta['collectorphoneextension'] = $payment_info["response"]["collection"]["collector"]["phone"]["extension"];
		// Log::info($id);
		// $pago['date']           = date('Y-m-d', strtotime($respuesta['date_created']));
		// $pago['ammount']        = $respuesta['total_paid_amount'];
		// $pago['description']    = 'pago con: '.$respuesta['payment_type'].' <span class="idMP">el id de mercadopago es: '.$respuesta['idMercadoPago'].' </span>';
		// $pago['mercadopago_id'] = $respuesta['idMercadoPago'];
		$reserva     = Reservation::find($respuesta['external_reference']);
		$tipoDePago  = Paymenttype::find(5);
		$mercadopago = Mercadopago::firstOrNew(array('idMercadoPago' => $respuesta['idMercadoPago']));
		if ($mercadopago) {

			foreach ($respuesta as $key => $value) {
				if ($key != 'id') {
					$mercadopago->$key = $value;
				}
			}
			$mercadopago->save();
			// echo '<pre>'.var_dump($mercadopago).'</pre>';
			$pago = Payment::firstOrNew(array('mercadopago_id' => $respuesta['idMercadoPago']));
			if ($pago) {
				// $pago                 = Payment::where('mercadopago_id', '=', $respuesta['idMercadoPago']);
				$pago->date           = date('Y-m-d', strtotime($respuesta['date_created']));
				$pago->ammount        = $respuesta['total_paid_amount'];
				$pago->description    = 'pago con: '.$respuesta['payment_type'].' el id de mercadopago es: <span class="idMP">'.$respuesta['idMercadoPago'].' </span>';
				$pago->mercadopago_id = $respuesta['idMercadoPago'];
				$pago->reservation_id = $respuesta['external_reference'];
				$pago->paymenttype_id = '5';
				$pago->save();
				// echo '<pre>'.var_dump($pago).'</pre>';
			} else {
				$pago                 = new Payment;
				$pago->date           = date('Y-m-d', strtotime($respuesta['date_created']));
				$pago->ammount        = $respuesta['total_paid_amount'];
				$pago->description    = 'pago con: '.$respuesta['payment_type'].' el id de mercadopago es: <span class="idMP">'.$respuesta['idMercadoPago'].' </span>';
				$pago->mercadopago_id = $respuesta['idMercadoPago'];
				$pago->reservation_id = $respuesta['external_reference'];
				$pago->paymenttype_id = '5';
				$pago->save();
				// echo '<pre>'.var_dump($pago).'</pre>';

			}

			// return 'Listo';
		} else {
			$mercadopago = new Mercadopago;
			foreach ($respuesta as $key => $value) {
				if ($key != 'id') {
					$mercadopago->$key = $value;
				}
			}
			$mercadopago->save();
			$pago                 = new Payment;
			$pago->date           = date('Y-m-d', strtotime($respuesta['date_created']));
			$pago->ammount        = $respuesta['total_paid_amount'];
			$pago->description    = 'pago con: '.$respuesta['payment_type'].' <span class="idMP">el id de mercadopago es: '.$respuesta['idMercadoPago'].' </span>';
			$pago->mercadopago_id = $respuesta['idMercadoPago'];
			$pago->reservation_id = $respuesta['external_reference'];
			$pago->paymenttype_id = '5';
			$pago->save();

		}
		$reserva->uptateAmmounts();
		$reserva->save();

		return View::make('backPage.responsePayment')->with('mercadopago', $mercadopago)->with('pago', $pago)->with('respuesta', $respuesta);
	}
	public function show($id) {
		//
	}
	public function testPayment() {
		$mercadopago = Mercadopago::firstOrNew(array('idMercadoPago' => '1414685527'));
		return View::make('backPage.testPayment')->with('mercadopago', $mercadopago);
	}
	public function successPayment($id) {

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