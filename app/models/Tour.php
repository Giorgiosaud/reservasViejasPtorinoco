<?php

class Tour extends \Eloquent {
	protected $fillable = [];
	public function reservations() {
		return $this->hasMany('Reservation');
	}
	public function boats() {
		return $this->belongsToMany('Boat')->withTimestamps();
	}
	public function prices() {
		return $this->belongsToMany('Price')->withTimestamps();
	}
	public function getPrices() {
		$price = $this->prices()->orderBy('id', 'DESC')->first();
		return $price;
	}
	public function getlunesAttribute() {
		$lunes = $this->attributes['lunes'];
		if ($lunes == 1) {
			return 'Si';
		} else {
			return 'No';
		}
	}
	public function getmartesAttribute() {
		$martes = $this->attributes['martes'];
		if ($martes == 1) {
			return 'Si';
		} else {
			return 'No';
		}
	}
	public function getmiercolesAttribute() {
		$miercoles = $this->attributes['miercoles'];
		if ($miercoles == 1) {
			return 'Si';
		} else {
			return 'No';
		}
	}
	public function getjuevesAttribute() {
		$jueves = $this->attributes['jueves'];
		if ($jueves == 1) {
			return 'Si';
		} else {
			return 'No';
		}
	}
	public function getviernesAttribute() {
		$viernes = $this->attributes['viernes'];
		if ($viernes == 1) {
			return 'Si';
		} else {
			return 'No';
		}
	}
	public function getsabadoAttribute() {
		$sabado = $this->attributes['sabado'];
		if ($sabado == 1) {
			return 'Si';
		} else {
			return 'No';
		}
	}
	public function getdomingoAttribute() {
		$domingo = $this->attributes['domingo'];
		if ($domingo == 1) {
			return 'Si';
		} else {
			return 'No';
		}
	}

}