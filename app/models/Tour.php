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
}