<?php

// Composer: "fzaninotto/faker": "v1.3.0"

class MercadopagosTableSeeder extends Seeder {

	public function run() {

		$mercadopago                          = new Passenger;
		$mercadopago->idMercadoPago           = $faker->unique()->numberBetween(100000, 100000000);
		$mercadopago->site_id                 = '52675155';
		$mercadopago->operation_type          = 'regular_payment';
		$mercadopago->order_id                = '4442154';
		$mercadopago->external_reference      = '3';
		$mercadopago->status                  = 'approved';
		$mercadopago->status_detail           = "accredited";
		$mercadopago->payment_type            = "ticket";
		$mercadopago->date_created            = "2011-09-02T04:00:000Z";
		$mercadopago->last_modified           = "2011-09-02T04:00:000Z";
		$mercadopago->date_approved           = "2011-09-02T04:00:000Z";
		$mercadopago->money_release_date      = "2011-09-02T04:00:000Z";
		$mercadopago->currency_id             = "Tipo de moneda";
		$mercadopago->transaction_amount      = 10;
		$mercadopago->shipping_cost           = 0;
		$mercadopago->total_paid_amount       = 10;
		$mercadopago->net_received_amount     = 10;
		$mercadopago->reason                  = 'Paseo';
		$mercadopago->payerId                 = '36073078';
		$mercadopago->payerfirst_name         = 'payer-name';
		$mercadopago->payerlast_name          = 'payer-lastname';
		$mercadopago->payeremail              = 'payer-email';
		$mercadopago->payernickname           = 'payer-nick';
		$mercadopago->phonearea_code          = '0000';
		$mercadopago->phonenumber             = '0000000';
		$mercadopago->collectorid             = '68961616';
		$mercadopago->collectorfirst_name     = 'collector-name';
		$mercadopago->collectorlast_name      = 'collector-Lastname';
		$mercadopago->collectoremail          = 'collector-email';
		$mercadopago->collectornickname       = 'collector-nick';
		$mercadopago->collectorphonearea_code = '1111';
		$mercadopago->collectorphonenumber    = '1111111';
		$mercadopago->save();
	}

}