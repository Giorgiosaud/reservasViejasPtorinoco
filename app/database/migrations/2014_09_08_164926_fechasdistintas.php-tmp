<?php

use Illuminate\Database\Migrations\Migration;

class Fechasdistintas extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('fechasdistintas', function ($table) {
				$table->increments('id');
				$table->date('fecha');
				$table->mediumText('descripcion');
				$table->text('clase');
				$table->boolean('activa');
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('fechasdistintas');
	}

}
