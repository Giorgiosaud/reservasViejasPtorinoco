<?php

class Paymenttype extends \Eloquent {
	protected $fillable = [];
	public function paymenttype() {
		return $this->belongsTo('Payment');
	}
}