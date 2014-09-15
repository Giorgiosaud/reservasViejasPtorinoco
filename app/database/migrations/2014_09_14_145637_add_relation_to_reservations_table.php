<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddRelationToReservationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table('reservations', function (Blueprint $table) {
				$table->integer('client_id')->unsigned();
				$table->foreign('client_id')->references('id')->on('clients')->onUpdate('cascade');
				$table->integer('boat_id')->unsigned();
				$table->foreign('boat_id')->references('id')->on('boats')->onUpdate('cascade');
				$table->integer('tour_id')->unsigned();
				$table->foreign('tour_id')->references('id')->on('tours')->onUpdate('cascade');
				$table->integer('paymentStatus_id')->unsigned();
				$table->foreign('paymentStatus_id')->references('id')->on('paymentstatus')->onUpdate('cascade');
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table('reservations', function (Blueprint $table) {
				$table->dropForeign('reservations_paymentstatus_id_foreign');
				$table->dropForeign('reservations_client_id_foreign');
				$table->dropForeign('reservations_boat_id_foreign');
				$table->dropForeign('reservations_tour_id_foreign');
			});
	}

}
