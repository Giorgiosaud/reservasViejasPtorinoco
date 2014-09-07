<?php

use Illuminate\Database\Migrations\Migration;

class Users extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		//
		Schema::create('users', function ($table) {
				$table->increments('id');
				$table->string('nombres');
				$table->string('apellidos');
				$table->string('alias')->unique();
				$table->string('email')->unique();
				$table->string('nivelDeAcceso');
				$table->string('password');
				$table->rememberToken()->nullable();
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
		Schema::drop('users');
	}

}
