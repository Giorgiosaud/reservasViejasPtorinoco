<?php

class Cliente extends Eloquent {
	public function reservas() {
		return $this->hasMany('Reserva');
	}
	public function pagos() {
		return $this->hasMany('Pago');
	}


}
