<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ClientsTableSeeder extends Seeder {

	public function run() {
		$faker = Faker::create('es_ES');
		foreach (range(1, 1000) as $index) {
			$cliente                 = new Client;
			$cliente->name           = $faker->firstName;
			$cliente->lastname       = $faker->lastName;
			$cliente->identification = $faker->randomElement($array = array('V', 'E', 'J', 'G')).'-'.$faker->unique()->numberBetween(100000, 100000000);
			$cliente->email          = $faker->unique()->email;
			$cliente->phone          = $faker->phoneNumber;
			$cliente->save();
		}
	}

}