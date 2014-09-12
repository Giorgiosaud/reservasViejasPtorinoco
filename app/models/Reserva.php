<?php

class Reserva extends Eloquent {

	protected $table      = 'reservas';
	protected $primaryKey = 'numeroDeReserva';
	public function pasajeros() {
		return $this->hasMany('Pasajero');
	}
	public function embarcacion() {
		return $this->belongsTo('Embarcacion');
	}
	public function statusDePago() {
		return $this->belongsTo('StatusDePago');
	}
	public function pagos() {
		return $this->hasMany('Pago');
	}
	public function cliente() {
		return $this->belongsTo('Cliente');
	}
	public function setreservaAttribute($reserva) {
		if ($reserva) {
			$this->attributes['reserva'] = date('Y-m-d', (strtotime($reserva)));
		} else {
			$this->attributes['reserva'] = '';
		}
	}

	public function getreservaAttribute() {
		$tmpdate = $this->attributes['reserva'];
		if ($tmpdate == "0000-00-00" || $tmpdate == "") {
			return "";
		} else {
			return date('d-m-Y', strtotime($tmpdate));
		}
	}
}
