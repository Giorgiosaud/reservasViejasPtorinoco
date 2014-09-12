<?php

class NivelesDeAccesoTableSeeder extends Seeder {

	public function run() {
		$NivelDeAcceso = NivelDeAcceso::create(array(
				'nivelDeAcceso'       => 'Administrador',
				'descripcion'     => 'El Puede Editar y entrar en lo que desee'
        )
        );
        $NivelDeAcceso = NivelDeAcceso::create(array(
                'nivelDeAcceso'       => 'Secretaria',
                'descripcion'     => 'Puede visualizar y modificar reservas'
            )
        );

	}

}