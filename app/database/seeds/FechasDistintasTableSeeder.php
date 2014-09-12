<?php

class FechasDistintasTableSeeder extends Seeder {

	public function run() {
		$time = strtotime('10/16/2014');

		$fecha = FechaDistinta::create(array(

				'fecha'       => '12-01-2013',
				'descripcion' => 'prueba',
				'clase'       => 'work',
				'activa'      => true));
		$fecha = FechaDistinta::create(array(

				'fecha'       => '2014-01-12',
				'descripcion' => 'prueba',
				'clase'       => 'work',
				'activa'      => true));
		$fecha = FechaDistinta::create(array(

				'fecha'       => '2014-08-31',
				'descripcion' => 'prueba',
				'clase'       => 'work',
				'activa'      => true));
	}

}