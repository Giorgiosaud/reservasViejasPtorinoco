<?php

use Illuminate\Database\Migrations\Migration;

class TiposDePagos extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		//
		Schema::create('tiposDePagos', function ($table) {
				$table->increments('id');
				$table->string('nombre');
				$table->longText('descripcion');
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
		Schema::drop('tiposDePagos');
	}

}
