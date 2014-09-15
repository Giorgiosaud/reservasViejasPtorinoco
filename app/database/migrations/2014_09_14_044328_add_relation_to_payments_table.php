<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddRelationToPaymentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table('payments', function (Blueprint $table) {
				$table->integer('reservation_id')->unsigned();
				$table->foreign('reservation_id')->references('id')->on('reservations')->onUpdate('cascade');
				$table->integer('paymenttype_id')->unsigned();
				$table->foreign('paymenttype_id')->references('id')->on('paymenttypes')->onUpdate('cascade');
				$table->integer('mercadopago_id')->nullable()->unsigned();
				$table->foreign('mercadopago_id')->references('id')->on('mercadopagos')->onUpdate('cascade');
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table('payments', function (Blueprint $table) {
				$table->dropForeign('payments_reservation_id_foreign');
				$table->dropForeign('payments_paymenttype_id_foreign');
				$table->dropForeign('payments_mercadopago_id_foreign');
			});
	}

}
