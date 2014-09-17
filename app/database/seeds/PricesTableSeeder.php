<?php

// Composer: "fzaninotto/faker": "v1.3.0"

class PricesTableSeeder extends Seeder {

	public function run() {
		$Price              = new Price;
		$Price->description = '2 horas';
		$Price->adult       = 500;
		$Price->older       = 250;
		$Price->child       = 250;
		$Price->save();
		$Price              = new Price;
		$Price->description = '1 hora';
		$Price->adult       = 400;
		$Price->older       = 200;
		$Price->child       = 200;
		$Price->save();
	}

}