<?php

class Client extends \Eloquent {
	use SoftDeletingTrait;
	protected $fillable = [];
	public function reservations() {
		return $this->hasMany('Reservation');
	}
	public function pagos() {
		return $this->hasMany('Payment');
	}
}