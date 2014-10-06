<?php

class Paymentstatus extends \Eloquent {
	protected $table = 'paymentstatus';
	// protected $fillable = [];
	public function reservations() {
		return $this->hasMany('Reservation');
	}

}