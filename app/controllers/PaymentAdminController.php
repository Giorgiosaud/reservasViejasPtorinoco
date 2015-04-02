<?php

class PaymentAdminController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /paymentadmin
	 *
	 * @return Response
	 */
	public function index() {
		//
		echo 'hola';
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /paymentadmin/create
	 *
	 * @return Response
	 */
	public function create() {
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /paymentadmin
	 *
	 * @return Response
	 */
	public function store() {
		$paymentType=Paymenttype::find(Input::get('paymenttype'));
		$payment                 = new Payment();
		$payment->ammount=Input::get('ammount');
		$payment->description=Input::get('description');
		$payment->date=Input::get('fecha');
		$payment->paymenttype()->associate($paymentType);
		$reserva=Reservation::find(Input::get('reserva'));
		$deuda=$reserva->totalAmmount ;
		$pagadoPrevio=$reserva->payments()->sum('ammount');
		$pagadoConPagoActual=$pagadoPrevio+$payment->ammount;

		if($pagadoConPagoActual>=$deuda){
			$reserva->paymentStatus_id='4';
		}
		elseif ($pagadoConPagoActual>0) {
			$reserva->paymentStatus_id='3';	
		}
		else{
			$reserva->paymentStatus_id='1';
		}
		$reserva->payments()->save($payment);
		$reserva->save();
		// $payment=Payment::find($reserva->payment->orderBy('created_at','desc')->id);
		$return = '<tr><td>'.$payment->date.'</td><td>'.$payment->paymenttype->name.'</td><td class="paymentAmmount">'.$payment->ammount.'</td><td>'.$payment->description.'</td><td>borrar</td></tr>';
		return $return;
	}

	/**
	 * Display the specified resource.
	 * GET /paymentadmin/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /paymentadmin/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /paymentadmin/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /paymentadmin/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id) {
		//
	}

}