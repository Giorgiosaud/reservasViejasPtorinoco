<?php

use Illuminate\Database\Migrations\Migration;

class Pasajeros extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('pasajeros', function ($table) {
				$table->increments('id');
				$table->integer('reservas_numeroDeReserva')->unsigned();
				$table->string('nombres');
				$table->string('apellidos');
				$table->string('cedula')->nullable();
				$table->string('email')->nullable();
                $table->timestamps();
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
		Schema::drop('pasajeros');
	}

}
