<?php

class Tour extends \Eloquent {
	protected $fillable = [];
	public function reservation() {
		return $this->hasMany('Reservation');
	}
	public function boats() {
		return $this->belongsToMany('Boat');
	}
}