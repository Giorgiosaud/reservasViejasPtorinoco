<?php

class Paymenttype extends \Eloquent {
	protected $fillable = [];
	public function paymenttype() {
		return $this->hasMany('Payment');
	}
}