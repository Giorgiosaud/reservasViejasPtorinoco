<?php

class EmbarcacionTableSeeder extends Seeder {

	public function run() {

		$embarcacion = Paseo::create(array(
				'embarcacion'    => "Catamaran",
				'orden'          => "1",
				'lunes'          => False,
				'martes'         => True,
				'miercoles'      => True,
				'jueves'         => True,
				'viernes'        => True,
				'sabado'         => True,
				'domingo'        => True,
				'abordajeNormal' => "45",
				'abordajeMaximo' => "50",

			)
		);
		$embarcacion = Paseo::create(array(
				'embarcacion'    => "Lancha",
				'orden'          => "2",
				'lunes'          => False,
				'martes'         => True,
				'miercoles'      => True,
				'jueves'         => True,
				'viernes'        => True,
				'sabado'         => True,
				'domingo'        => True,
				'abordajeNormal' => "13",
				'abordajeMaximo' => "15",

			)
		);
	}

}