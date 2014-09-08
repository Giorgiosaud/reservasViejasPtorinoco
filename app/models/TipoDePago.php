<?php

class TipoDePago extends Eloquent {

	protected $table = 'tiposDePagos';
	public function pagos() {
		return $this->hasMany('Pago');
	}
}
