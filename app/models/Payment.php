<?php

class Payment extends \Eloquent {
	protected $fillable = [];
	public function reservation() {
		return $this->belongsTo('Reservation');
	}
	public function paymenttype() {
		return $this->hasOne('Paymenttype');
	}
	public function mercadopago() {
		return $this->hasOne('Mercadopago');
	}
}