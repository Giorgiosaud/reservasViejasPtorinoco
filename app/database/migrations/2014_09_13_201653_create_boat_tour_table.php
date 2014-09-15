<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBoatTourTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('boat_tour', function (Blueprint $table) {
				$table->increments('id');
				$table->integer('boat_id')->unsigned()->index();
				$table->foreign('boat_id')->references('id')->on('boats')->onDelete('cascade');
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
		Schema::drop('boat_tour');
	}

}
