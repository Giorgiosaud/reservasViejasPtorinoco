<?php

class Mercadopago extends Eloquent {
	use SoftDeletingTrait;
	public function pago() {
		return $this->belongsTo('Payment');
	}
}
