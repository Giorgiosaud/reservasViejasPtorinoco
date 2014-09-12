<?php

use Illuminate\Database\Migrations\Migration;

class CreateNivelesdeaccesoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('nivelesDeAcceso', function ($table) {
				$table->increments('id');
				$table->string('nivelDeAcceso');
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
		Schema::drop('nivelesDeAcceso');
	}

}
