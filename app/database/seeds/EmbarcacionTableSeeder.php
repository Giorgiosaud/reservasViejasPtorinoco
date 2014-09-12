<?php

class EmbarcacionTableSeeder extends Seeder {

	public function run() {

		$embarcacion = Embarcacion::create(array(
				'embarcacion'    => "Catamaran",
				'orden'          => "1",
				'publico'          => True,
				'abordajeMaximo' => "50",
				'abordajeNormal' => "45",

			)
		);
		$embarcacion = Embarcacion::create(array(
                'embarcacion'    => "Lancha",
                'orden'          => "1",
                'publico'          => True,
                'abordajeMaximo' => "15",
                'abordajeNormal' => "13",
			)
		);
	}

}