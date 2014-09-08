<?php

class Reserva extends Eloquent {

	protected $table      = 'reservas';
	protected $primaryKey = 'numeroDeReserva';
	public function pagos() {
		return $this->hasMany('Pago');
	}

}
