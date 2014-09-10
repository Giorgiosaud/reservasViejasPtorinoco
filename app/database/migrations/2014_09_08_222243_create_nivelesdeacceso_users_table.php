<?php

use Illuminate\Database\Migrations\Migration;

class CreateNivelesdeaccesoUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('nivelesDeAcceso_users', function ($table) {
				$table->increments('id');
				$table->integer('user_id');
				$table->integer('nivelesDeAcceso_id');

			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('nivelesDeAcceso_users');
	}

}
