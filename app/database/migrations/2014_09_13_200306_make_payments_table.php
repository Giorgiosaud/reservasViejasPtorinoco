<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class MakePaymentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('payments', function (Blueprint $table) {
				$table->increments('id');
				// $table->integer('reservation_id')->unsigned();
				$table->date('date');
				// $table->integer('paymenttype_id')->unsigned();
				// $table->integer('mercadopago_id')->unsigned();
				$table->float('ammount')->default(0);
				$table->text('description');
				$table->timestamps();
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('payments');
	}

}
