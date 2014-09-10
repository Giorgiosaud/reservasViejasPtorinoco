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
				$table->integer('cliente_id')->unsigned();
				$table->date('fechaDelPaseo');
				$table->integer('embarcacion_id')->unsigned();
                $table->integer('paseo_id')->unsigned();
				$table->integer('statusDelPago')->unsigned();
				$table->longText('referencias');
				$table->integer('cuposAdultos')->default('0');
				$table->integer('cuposAdultosMayores')->default('0');
				$table->integer('cuposNinos')->default('0');
				$table->boolean('confirmado')->default('0');
				$table->string('creadoPor')->default('cliente');
				$table->string('modificadoPor')->nullable();
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
