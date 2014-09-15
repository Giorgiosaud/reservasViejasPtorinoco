<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class PaymentsTableSeeder extends Seeder {

	public function run() {
		$faker = Faker::create();

		foreach (range(1, 100) as $index) {
			$payment                 = new Payment;
			$payment->reservation_id = $faker->numberBetween(1, 500);
			$payment->date           = $faker->date;
			$payment->paymenttype_id = $faker->numberBetween(1, 5);
			// $payment->mercadopago_id = $faker->numberBetween(1, 5);//Revisar
			$payment->ammount     = $faker->numberBetween(0, 2000);
			$payment->description = $faker->text;
			$payment->save();

		}
	}

}