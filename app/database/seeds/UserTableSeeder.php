<?php

class UserTableSeeder extends Seeder {

	public function run() {
		$user = User::create(array(
				'nombres'       => "Administra Dor",
				'apellidos'     => "Princi Pal",
				'alias'         => "admin",
				'email'         => "admin@test.com",
				'password'      => Hash::make('admin')));
	}

}