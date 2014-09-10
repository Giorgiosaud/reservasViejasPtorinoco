<?php

use Illuminate\Database\Migrations\Migration;

class CreateEmbarcacionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('embarcaciones', function ($table) {
				$table->increments('id');
				$table->text('embarcacion');
				$table->string('orden');
				$table->boolean('lunes');
				$table->boolean('martes');
				$table->boolean('miercoles');
				$table->boolean('jueves');
				$table->boolean('viernes');
				$table->boolean('sabado');
				$table->boolean('domingo');
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
		Schema::drop('embarcaciones');
	}

}
