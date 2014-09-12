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
				$table->string('clase');
				$table->boolean('activa');
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
		Schema::drop('fechasdistintas');
	}

}
