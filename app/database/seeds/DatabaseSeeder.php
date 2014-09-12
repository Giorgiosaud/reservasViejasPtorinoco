<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		Eloquent::unguard();

		$this->call('UserTableSeeder');
		$this->call('EmbarcacionTableSeeder');
        $this->call('FechasDistintasTableSeeder');
        $this->call('NivelesDeAccesoTableSeeder');
        $this->call('PaseoTableSeeder');
        $this->call('StatusDePagoTableSeeder');
        $this->call('VariablesTableSeeder');
	}

}
