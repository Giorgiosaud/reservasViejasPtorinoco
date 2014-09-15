<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ReservationsTableSeeder extends Seeder {

	public function run() {
		$faker = Faker::create();

		foreach (range(1, 500) as $index) {
			$Reservation                   = new Reservation;
			$Reservation->client_id        = $faker->numberBetween(1, 100);
			$Reservation->date             = $faker->date;
			$Reservation->boat_id          = $faker->numberBetween(1, 2);
			$Reservation->tour_id          = $faker->numberBetween(1, 3);
			$Reservation->paymentStatus_id = $faker->numberBetween(1, 2);
			$Reservation->references       = $faker->text;
			$Reservation->adults           = $faker->numberBetween(1, 3);
			$Reservation->olders           = $faker->numberBetween(1, 3);
			$Reservation->childs           = $faker->numberBetween(1, 3);
			$Reservation->confirmed        = $faker->numberBetween(0, 1);
			$Reservation->madeBy           = 'Client';
			$Reservation->save();
		}
	}

}