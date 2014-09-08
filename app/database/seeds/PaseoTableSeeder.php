<?php

class PaseoTableSeeder extends Seeder {

	public function run() {

		$paseo = Paseo::create(array(
				'horaDeZarpeEscrita' => "10:30 am",
				'orden'              => "1",
				'lunes'              => False,
				'martes'             => True,
				'miercoles'          => True,
				'jueves'             => True,
				'viernes'            => True,
				'sabado'             => True,
				'domingo'            => True,
			)
		);
		$paseo = Paseo::create(array(
				'horaDeZarpeEscrita' => "01:00 am",
				'orden'              => "2",
				'lunes'              => False,
				'martes'             => False,
				'miercoles'          => False,
				'jueves'             => False,
				'viernes'            => False,
				'sabado'             => False,
				'domingo'            => False,
			)
		);
		$paseo = Paseo::create(array(
				'horaDeZarpeEscrita' => "02:30 pm",
				'orden'              => "3",
				'lunes'              => False,
				'martes'             => True,
				'miercoles'          => True,
				'jueves'             => True,
				'viernes'            => True,
				'sabado'             => True,
				'domingo'            => True,
			)
		);
		$paseo = Paseo::create(array(
				'horaDeZarpeEscrita' => "05:30 pm",
				'orden'              => "4",
				'lunes'              => False,
				'martes'             => True,
				'miercoles'          => True,
				'jueves'             => True,
				'viernes'            => True,
				'sabado'             => True,
				'domingo'            => True,
			)
		);

	}

}