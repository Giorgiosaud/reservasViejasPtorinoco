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
				$table->integer('reservas_numeroDeReserva')->unsigned();
				$table->date('fecha');
				$table->integer('tiposDePagos_id')->unsigned();
				$table->integer('mercadopago_id')->unsigned();
				$table->float('monto');
				$table->longText('referencias');
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
		Schema::drop('pagos');
	}

}
