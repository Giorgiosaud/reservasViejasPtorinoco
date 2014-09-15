<?php

class Reservation extends \Eloquent {
	protected $fillable = [];
	use SoftDeletingTrait;
	public function setdateAttribute($date) {
		if ($date) {
			$this->attributes['date'] = date('Y-m-d', (strtotime($date)));
		} else {
			$this->attributes['date'] = '';
		}
	}

	public function getdateAttribute() {
		$tmpdate = $this->attributes['date'];
		if ($tmpdate == "0000-00-00" || $tmpdate == "") {
			return "";
		} else {
			return date('d-m-Y', strtotime($tmpdate));
		}
	}
	public function passenger() {
		return $this->hasMany('Passenger');
	}
	public function payment() {
		return $this->hasMany('Payment');
	}
	public function client() {
		return $this->belongsTo('Client');
	}
	public function paymenttype() {
		return $this->belongsTo('Paymenttype');
	}
	public function boat() {
		return $this->belongsTo('Boat');
	}
	public function tour() {
		return $this->belongsTo('Tour');
	}
}