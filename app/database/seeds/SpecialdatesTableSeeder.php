	<?php

// Composer: "fzaninotto/faker": "v1.3.0"

class SpecialdatesTableSeeder extends Seeder {

	public function run() {

		$date = Specialdate::create(array(
				'date'        => '12-01-2013',
				'description' => 'prueba',
				'class'       => 'work',
				'active'      => true));
		$date = Specialdate::create(array(

				'date'        => '2014-01-12',
				'description' => 'prueba',
				'class'       => 'work',
				'active'      => true));
		$date = Specialdate::create(array(

				'date'        => '2014-08-31',
				'description' => 'prueba',
				'class'       => 'work',
				'active'      => true));
	}

}