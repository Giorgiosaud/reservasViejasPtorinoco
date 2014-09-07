<?php

use Illuminate\Database\Migrations\Migration;

class Relaciones extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		// Schema::table('reservas', function ($table) {
		// 		$table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade');
		// 		$table->foreign('hora_id')->references('id')->on('horas')->onUpdate('cascade');
		// 		$table->foreign('statusDelPago')->references('id')->on('tiposDePagos')->onUpdate('cascade');
		// 	});
		// Schema::table('pasajeros', function ($table) {
		// 		$table->foreign('idReservas')->unsigned()->references('numeroDeReserva')->on('reservas')->onUpdate('cascade');
		// 	});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		// Schema::table('reservas', function ($table) {
		// 		$table->dropForeign('reservas_user_id_foreign');
		// 		$table->dropForeign('reservas_hora_id_foreign');
		// 		$table->dropForeign('reservas_statusdelpago_foreign');
		// 	});
		// Schema::table('pasajeros', function ($table) {
		// 		$table->dropForeign('pasajeros_idreservas_foreign');
		// 	});
	}

}
