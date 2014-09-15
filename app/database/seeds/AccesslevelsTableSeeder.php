<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class AccesslevelsTableSeeder extends Seeder {

	public function run() {
		$faker = Faker::create();

		$level              = new Accesslevel;
		$level->name        = 'Administrator';
		$level->description = 'Administrador del Sitio';
		$level->save();
		$level              = new Accesslevel;
		$level->name        = 'Secretaria';
		$level->description = 'Secretaria del Oficina';
		$level->save();

	}

}