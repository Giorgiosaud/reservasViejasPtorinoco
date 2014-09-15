<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class MakeReservationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('reservations', function (Blueprint $table) {
				$table->increments('id');
				// $table->integer('client_id')->unsigned();
				$table->date('date');
				// $table->integer('boat_id')->unsigned();
				// $table->integer('tour_id')->unsigned();
				// $table->integer('paymentStatus_id')->unsigned();
				$table->longText('references');
				$table->integer('adults')->default(0);
				$table->integer('olders')->default(0);
				$table->integer('childs')->default(0);
				$table->float('totalAmmount');
				$table->boolean('confirmed')->default(false);
				$table->string('madeBy')->default('client');
				$table->string('modifiedBy');
				$table->softDeletes();
				$table->timestamps();
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('reservations');
	}

}
