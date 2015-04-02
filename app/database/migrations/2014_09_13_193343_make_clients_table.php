<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class MakeClientsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('clients', function (Blueprint $table) {
				$table->increments('id');
				$table->string('name');
				$table->string('lastname');
				$table->string('identification')->unique();
				$table->string('email')->unique();
				$table->string('phone');
				$table->integer('visitas')->default(0);
				$table->boolean('esAgencia')->default(false);
				$table->float('credit')->default(0);
				$table->softDeletes();
				$table->timestamps();
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('clients');
	}

}
