<?php

use Illuminate\Database\Migrations\Migration;

class Pagos extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		//
		Schema::create('pagos', function ($table) {
				$table->increments('id');
				$table->integer('idReservas')->unsigned()->foreign('idReservas')->references('numeroDeReserva')->on('reservas')->onUpdate('cascade');
				;
				$table->integer('idTipoDePago')->unsigned()->foreign('idTipoDePago')->references('id')->on('tiposDePagos')->onUpdate('cascade');
				;
				$table->float('monto');
				$table->longText('referencias');
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('pagos');
	}

}
