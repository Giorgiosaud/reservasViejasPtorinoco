<?php

class VariablesTableSeeder extends Seeder {

	public function run() {
		$variable = Variables::create(array(
				'variable' => "Lunes",
				'valor'    => "1", ));
		$variable = Variables::create(array(
				'variable' => "Martes",
				'valor'    => "1", ));
		$variable = Variables::create(array(
				'variable' => "Miercoles",
				'valor'    => "1", ));
		$variable = Variables::create(array(
				'variable' => "Jueves",
				'valor'    => "1", ));
		$variable = Variables::create(array(
				'variable' => "Viernes",
				'valor'    => "1", ));
		$variable = Variables::create(array(
				'variable' => "Sabado",
				'valor'    => "1", ));
		$variable = Variables::create(array(
				'variable' => "Domingo",
				'valor'    => "1", ));
	}

}