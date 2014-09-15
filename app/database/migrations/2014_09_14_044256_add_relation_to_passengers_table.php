<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddRelationToPassengersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table('passengers', function (Blueprint $table) {
				$table->integer('reservation_id')->unsigned();
				$table->foreign('reservation_id')->references('id')->on('reservations');
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table('passengers', function (Blueprint $table) {
				$table->dropForeign('passengers_reservation_id_foreign');
			});
	}

}
