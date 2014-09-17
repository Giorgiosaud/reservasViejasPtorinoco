<?php

// Composer: "fzaninotto/faker": "v1.3.0"

class PaymentstatusTableSeeder extends Seeder {

	public function run() {

		$status              = new Paymentstatus;
		$status->name        = 'No ha abonado nada';
		$status->description = '0% abono';
		$status->save();

		$status              = new Paymentstatus;
		$status->name        = 'Aguante';
		$status->description = '0% abono pero necesito que se quede';
		$status->save();

		$status              = new Paymentstatus;
		$status->name        = 'Parcialmente Pagado';
		$status->description = 'Falta por pagar';
		$status->save();

		$status              = new Paymentstatus;
		$status->name        = 'Pagado';
		$status->description = 'Ya pago el 100%';
		$status->save();
	}

}