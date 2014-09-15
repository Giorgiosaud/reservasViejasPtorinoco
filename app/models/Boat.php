<?php

class Boat extends \Eloquent {
	protected $fillable = [];
	public function reservtions() {
		return $this->hasMany('Reservation');
	}
	public function tours() {
		return $this->belongsToMany('Tour');
	}
}