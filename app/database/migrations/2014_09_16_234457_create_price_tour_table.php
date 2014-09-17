<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePriceTourTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('price_tour', function (Blueprint $table) {
				$table->increments('id');
				$table->integer('price_id')->unsigned()->index();
				$table->foreign('price_id')->references('id')->on('prices')->onDelete('cascade');
				$table->integer('tour_id')->unsigned()->index();
				$table->foreign('tour_id')->references('id')->on('tours')->onDelete('cascade');
				$table->timestamps();
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('price_tour');
	}

}
