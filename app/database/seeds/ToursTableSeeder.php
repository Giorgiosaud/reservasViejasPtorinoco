<?php

// Composer: "fzaninotto/faker": "v1.3.0"

class ToursTableSeeder extends Seeder {

	public function run() {

		$Tour              = new Tour;
		$Tour->departure   = '10:30 am';
		$Tour->name        = 'Playa';
		$Tour->order       = '1';
		$Tour->public      = true;
		$Tour->lunes       = false;
		$Tour->descripcion = 'Paseo que incluye parada en la Playa PicaPica';

		$Tour->save();
		$Tour              = new Tour;
		$Tour->departure   = '01:00 pm';
		$Tour->name        = 'Extra';
		$Tour->order       = '2';
		$Tour->public      = false;
		$Tour->lunes       = false;
		$Tour->descripcion = 'Paseo Extra cuando esta full';

		$Tour->save();
		$Tour              = new Tour;
		$Tour->departure   = '02:30 pm';
		$Tour->name        = 'Playa';
		$Tour->order       = '3';
		$Tour->public      = true;
		$Tour->lunes       = false;
		$Tour->descripcion = 'Paseo que incluye parada en la Playa PicaPica';

		$Tour->save();
		$Tour              = new Tour;
		$Tour->departure   = '05:00 am';
		$Tour->name        = 'Atardecer';
		$Tour->order       = '4';
		$Tour->public      = true;
		$Tour->lunes       = false;
		$Tour->descripcion = 'Paseo que incluye Atardecer en la union de los rios';
		$Tour->save();
	}

}