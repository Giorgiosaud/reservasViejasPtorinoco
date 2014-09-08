<?php

class Pago extends Eloquent {
	public function tipoDePago() {
		return $this->hasOne('TipoDePago');
	}
	public function reserva() {
		return $this->hasOne('Reserva');
	}
}
