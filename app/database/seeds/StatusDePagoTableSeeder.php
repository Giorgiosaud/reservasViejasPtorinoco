<?php

class StatusDePagoTableSeeder extends Seeder {

	public function run() {
		$statusDePago = StatusDePago::create(array(
				'nombre'       => "Pagado",
				'descripcion'     => "El cliente pago completamente lo que debe",));
        $statusDePago = StatusDePago::create(array(
            'nombre'       => "Abonado",
            'descripcion'     => "El cliente abono parte de lo que debe",
        ));
        $statusDePago = StatusDePago::create(array(
            'nombre'       => "No Pagado",
            'descripcion'     => "El cliente no ha pagado",
        ));
	}

}