<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ClientsTableSeeder extends Seeder {

	public function run() {
		$faker                   = Faker::create('es_ES');
		$cliente                 = new Client;
		$cliente->name           = "Nombre de Prueba";
		$cliente->lastname       = 'Apellido De Prueba';
		$cliente->identification = 'V-12345678';
		$cliente->email          = 'pruebas@test.com';
		$cliente->phone          = '5555-555-5555';
		$cliente->save();
		foreach (range(1, 1000) as $index) {
			$cliente                 = new Client;
			$cliente->name           = $faker->firstName;
			$cliente->lastname       = $faker->lastName;
			$identification          = $faker->randomElement($array = array('V', 'E', 'J', 'G')).'-'.$faker->unique()->numberBetween(100000, 100000000);
			$cliente->identification = $identification;
			// $cliente->identificationhashed = Hash::make($identification);
			$cliente->email = $faker->unique()->email;
			$cliente->phone = $faker->unique()->phoneNumber;
			$cliente->save();
		}
	}

}