<?php

class Mercadopago extends Eloquent {

	use SoftDeletingTrait;
	public static $unguarded = true;
	public function pago() {
		return $this->belongsTo('Payment');
	}
}
