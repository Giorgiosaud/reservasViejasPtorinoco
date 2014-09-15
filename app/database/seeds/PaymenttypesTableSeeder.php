<?php

class PaymenttypesTableSeeder extends Seeder {

	public function run() {

		$paymentType              = new Paymenttype;
		$paymentType->name        = 'Efectivo';
		$paymentType->description = 'Pago realizdo en efectivo';
		$paymentType->save();
		$paymentType              = new Paymenttype;
		$paymentType->name        = 'Cheque';
		$paymentType->description = 'Pago realizdo en Cheque';
		$paymentType->save();
		$paymentType              = new Paymenttype;
		$paymentType->name        = 'Debito Oficina';
		$paymentType->description = 'Pago realizdo en Debito por la oficina';
		$paymentType->save();
		$paymentType              = new Paymenttype;
		$paymentType->name        = 'Debito Casabote';
		$paymentType->description = 'Pago realizdo en Debito en Casa Bote';
		$paymentType->save();
		$paymentType              = new Paymenttype;
		$paymentType->name        = 'Mercadopago';
		$paymentType->description = 'Pago realizdo por Mercadopago';
		$paymentType->save();

	}

}