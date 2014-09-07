<?php

class UserTableSeeder extends Seeder {

	public function run() {
		$user = User::create(array(
				'nombres'       => "Jorge Luis",
				'apellidos'     => "Saud Rosal",
				'alias'         => "GiorgioSaud",
				'email'         => "jorgelsaud@gmail.com",
				'nivelDeAcceso' => "root",
				'password'      => Hash::make('17762267')));
	}

}