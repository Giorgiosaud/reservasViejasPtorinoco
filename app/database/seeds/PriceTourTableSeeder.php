<?php

// Composer: "fzaninotto/faker": "v1.3.0"

class PriceTourTableSeeder extends Seeder {

	public function run() {
		$Tours = Tour::where('name', '=', 'Playa')->get();
		$Price = Price::where('description', '=', '2 horas')->first();
		foreach ($Tours as $tour) {
			$tour->prices()->attach($Price->id);
		}
		$Tours = Tour::where('name', '=', 'Extra')->orwhere('name', '=', 'Atardecer')->get();
		$Price = Price::where('description', '=', '1 hora')->first();
		foreach ($Tours as $tour) {
			$tour->prices()->attach($Price->id);
		}
	}

}