<?php

// Composer: "fzaninotto/faker": "v1.3.0"

class ToursBoatRelationTableSeeder extends Seeder {

	public function run() {
		$Tours = Tour::all();
		$Boats = Boat::all();
		foreach ($Tours as $tour) {
			foreach ($Boats as $boat) {
				$tour->boats()->attach($boat->id);
			}
		}
		// }
		// for ($i = 1; $i <= 4; $i++) {
		// 	$tours = Tour::find($i);
		// 	$tours->boats()->attach(1);
		// 	$tours->boats()->attach(2);
		// }

	}

}