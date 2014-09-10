<?php

use Illuminate\Database\Migrations\Migration;

class CreatePaseosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('paseos', function ($table) {
				$table->increments('id');
				$table->string('horaDeZarpeEscrita');
				$table->string('orden');
				$table->boolean('lunes');
				$table->boolean('martes');
				$table->boolean('miercoles');
				$table->boolean('jueves');
				$table->boolean('viernes');
				$table->boolean('sabado');
				$table->boolean('domingo');
				$table->longText('Descripcion');
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
		Schema::drop('paseos');
	}

}
