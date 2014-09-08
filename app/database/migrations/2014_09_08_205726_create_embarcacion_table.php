<?php

use Illuminate\Database\Migrations\Migration;

class CreateEmbarcacionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('embarcations', function ($table) {
				$table->increments('id');
				$table->text('embarcacion');
				$table->integer('abordajeMaximo');
				$table->integer('abordajeNormal');
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('embarcations');
	}

}
