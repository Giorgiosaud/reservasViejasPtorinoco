<?php

use Illuminate\Database\Migrations\Migration;

class Variables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('variables', function ($table) {
				$table->increments('id');
				$table->string('variable');
				$table->string('valor');
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('variables');
	}

}
