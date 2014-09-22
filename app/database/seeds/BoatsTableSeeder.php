<?php

// Composer: "fzaninotto/faker": "v1.3.0"

class BoatsTableSeeder extends Seeder {

	public function run() {

		$boat                 = new Boat;
		$boat->name           = 'Catamaran';
		$boat->order          = '1';
		$boat->abordajemaximo = '50';
		$boat->abordajenormal = '40';
		$boat->abordajeminimo = '8';
		$boat->save();
		$boat                 = new Boat;
		$boat->name           = 'Lancha';
		$boat->order          = '2';
		$boat->abordajeminimo = '5';
		$boat->abordajemaximo = '15';
		$boat->abordajenormal = '13';
		$boat->save();

	}

}