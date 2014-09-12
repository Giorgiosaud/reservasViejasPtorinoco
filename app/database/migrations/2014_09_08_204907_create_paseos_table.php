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
                $table->string('nombre');
                $table->string('orden');
                $table->boolean('publica')->default('1');
				$table->boolean('lunes')->default('1');
				$table->boolean('martes')->default('1');
				$table->boolean('miercoles')->default('1');
				$table->boolean('jueves')->default('1');
				$table->boolean('viernes')->default('1');
				$table->boolean('sabado')->default('1');
				$table->boolean('domingo')->default('1');
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
		Schema::drop('paseos');
	}

}
