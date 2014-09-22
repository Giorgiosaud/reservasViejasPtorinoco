<?php

class VariablesTableSeeder extends Seeder {

	public function run() {
		$variable = Variable::create(array(
				'name'  => "Lunes",
				'value' => True, ));
		$variable = Variable::create(array(
				'name'  => "Martes",
				'value' => True, ));
		$variable = Variable::create(array(
				'name'  => "Miercoles",
				'value' => True, ));
		$variable = Variable::create(array(
				'name'  => "Jueves",
				'value' => True, ));
		$variable = Variable::create(array(
				'name'  => "Viernes",
				'value' => True, ));
		$variable = Variable::create(array(
				'name'  => "Sabado",
				'value' => True, ));
		$variable = Variable::create(array(
				'name'  => "Domingo",
				'value' => True, ));
		$variable = Variable::create(array(
				'name'  => "minDiasParaReservar",
				'value' => '1', ));
		$variable = Variable::create(array(
				'name'  => "temporadaBaja",
				'value' => True, ));
		$variable = Variable::create(array(
				'name'  => "iva",
				'value' => "12", ));
		$variable = Variable::create(array(
				'name'  => "servicio",
				'value' => "10", ));
	}

}