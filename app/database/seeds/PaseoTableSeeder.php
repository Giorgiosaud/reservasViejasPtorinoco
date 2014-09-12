<?php

class PaseoTableSeeder extends Seeder {

	public function run() {

		$paseo = Paseo::create(array(
				'horaDeZarpeEscrita' => "10:30 am",
				'orden'              => "1",
				'publica'              => True,
                'lunes'              => False,
				'martes'             => True,
				'miercoles'          => True,
				'jueves'             => True,
				'viernes'            => True,
				'sabado'             => True,
				'domingo'            => True,
                'descripcion'          =>'Paseo normal'
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
                'descripcion'          =>'Paseo normal'
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
                'descripcion'          =>'Paseo normal'
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
                'descripcion'          =>'Paseo normal'
			)
		);

	}

}