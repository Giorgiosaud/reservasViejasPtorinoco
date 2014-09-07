<?php

use Illuminate\Database\Migrations\Migration;

class Clientes extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		//
		Schema::create('clientes', function ($table) {
				$table->increments('id');
				$table->string('nombres');
				$table->string('apellidos');
				$table->string('cedula')->unique();
				$table->string('telefono');
				$table->string('email')->unique();
				$table->softDeletes();

			});

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		//
		Schema::drop('clientes');
	}

}
