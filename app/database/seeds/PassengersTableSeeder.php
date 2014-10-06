<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class PassengersTableSeeder extends Seeder {

	public function run() {
		$faker                    = Faker::create();
		$pasajero                 = new Passenger;
		$pasajero->reservation_id = '1';
		$pasajero->name           = 'Pasajero Nombre';
		$pasajero->lastname       = 'Pasajero Apellido';
		$pasajero->identification = 'V-18285912';
		$pasajero->email          = 'pasajero@test.com';
		$pasajero->phone          = '0333-234-1234';
		$pasajero->save();
		foreach (range(1, 1800) as $index) {
			$pasajero                 = new Passenger;
			$pasajero->reservation_id = $faker->numberBetween(1, 500);
			$pasajero->name           = $faker->firstName;
			$pasajero->lastname       = $faker->lastName;
			$pasajero->identification = $faker->randomElement($array = array('V', 'E', 'J', 'G')).'-'.$faker->numberBetween(100000, 100000000);
			$pasajero->email          = $faker->email;
			$pasajero->phone          = $faker->phoneNumber;
			$pasajero->save();
		}
	}

}