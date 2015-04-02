<?php

// Composer: "fzaninotto/faker": "v1.3.0"

class UsersTableSeeder extends Seeder {

	public function run() {

		$user = User::create(array(
				'name'     => "zonapro	",
				'lastname' => "net",
				'alias'    => "zonapro",
				'email'    => "info@zonapro.net",
				'password' => Hash::make('zonapro123*')));
		$user->save();
		$user = User::create(array(
				'name'     => "Adminstracion",
				'lastname' => "Puertorinoco, C.A.",
				'alias'    => "administracion",
				'email'    => "info@puertorinoco.com",
				'password' => Hash::make('C4t4m4r4n')));
		$user->save();
		$user = User::create(array(
				'name'     => "Gerencia",
				'lastname' => "Puertorinoco,C.A",
				'alias'    => "gerencia",
				'email'    => "jorgeyane@gmail.com",
				'password' => Hash::make('Pu3rt0r1n0c0')));
		$user->save();
		$user = User::create(array(
				'name'     => 'recepcion',
				'lastname' => 'oficina',
				'alias'    => 'recepcion',
				'email'    => 'puertorinoco@gmail.com',
				'password' => Hash::make('C4t4m4r4n')));
		$user->save();
	}

}