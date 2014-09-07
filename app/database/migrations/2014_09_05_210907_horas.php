<?php

use Illuminate\Database\Migrations\Migration;

class Horas extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		//
		Schema::create('horas', function ($table) {
				$table->increments('id');
				$table->string('horaDeZarpeEscrita');
				$table->string('orden');
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
		//
		Schema::drop('horas');
	}

}
