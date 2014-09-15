<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class MakePassengersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('passengers', function (Blueprint $table) {
				$table->increments('id');
				// $table->integer('reservation_id')->unsigned();
				$table->string('name');
				$table->string('lastname');
				$table->string('identification')->nullable();
				$table->string('email')->nullable();
				$table->string('phone')->nullable();
				$table->timestamps();
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('passengers');
	}

}
