<?php

class Passenger extends \Eloquent {
	protected $fillable = [];
	public function reservation() {
		return $this->belongsTo('Reservation');
	}
}