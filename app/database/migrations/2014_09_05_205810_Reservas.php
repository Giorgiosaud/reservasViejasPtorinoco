<?php

use Illuminate\Database\Migrations\Migration;

class Reservas extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		//
		Schema::create('reservas', function ($table) {
				$table->increments('numeroDeReserva');
				$table->integer('user_id')->unsigned();
				$table->date('fechaDelPaseo');
				$table->integer('hora_id')->unsigned();
				$table->integer('statusDelPago')->unsigned();
				$table->longText('referencias');
				$table->integer('cuposAdultos');
				$table->integer('cuposAdultosMayores');
				$table->integer('cuposNinos');
				$table->boolean('confirmado');
				$table->string('creadoPor')->default('cliente');
				$table->string('modificadoPor')->default('cliente');
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
		Schema::drop('reservas');
	}

}
