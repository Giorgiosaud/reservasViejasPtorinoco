<?php

class Boat extends \Eloquent {
	protected $fillable = [];
	public function reservtions() {
		return $this->hasMany('Reservation');
	}
	public function tours() {
		return $this->belongsToMany('Tour')->withTimestamps();
	}
	public function getpublicAttribute() {
		$public = $this->attributes['public'];
		if ($public == 1) {
			return 'Si';
		} else {
			return 'No';
		}
	}
}