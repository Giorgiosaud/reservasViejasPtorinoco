<?php

// Composer: "fzaninotto/faker": "v1.3.0"

class UsersTableSeeder extends Seeder {

	public function run() {

		$user = User::create(array(
				'name'     => "Administra Dor",
				'lastname' => "Princi Pal",
				'alias'    => "admin",
				'email'    => "admin@test.com",
				'password' => Hash::make('admin')));
	}

}