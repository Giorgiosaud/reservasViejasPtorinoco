<?php

class VariablesTableSeeder extends Seeder {

	public function run() {
		$variable = Variable::create(array(
				'variable' => "Lunes",
				'valor'    => True, ));
		$variable = Variable::create(array(
				'variable' => "Martes",
				'valor'    => True, ));
		$variable = Variable::create(array(
				'variable' => "Miercoles",
				'valor'    => True, ));
		$variable = Variable::create(array(
				'variable' => "Jueves",
				'valor'    => True, ));
		$variable = Variable::create(array(
				'variable' => "Viernes",
				'valor'    => True, ));
		$variable = Variable::create(array(
				'variable' => "Sabado",
				'valor'    => True, ));
		$variable = Variable::create(array(
				'variable' => "Domingo",
				'valor'    => True, ));
	}

}