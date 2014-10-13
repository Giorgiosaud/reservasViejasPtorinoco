<?php

class Payment extends \Eloquent {
	// protected $fillable = array('reservation_id', 'ammount', 'description', 'reservation_id', 'paymenttype_id');
	public function reservation() {
		return $this->belongsTo('Reservation');
	}

	public function paymenttype() {
		return $this->belongsTo('Paymenttype');
	}
	public function mercadopago() {
		return $this->hasOne('Mercadopago');
	}
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
	public function getdateOriginalAttribute() {
		return $tmpdate = $this->attributes['date'];
	}
}