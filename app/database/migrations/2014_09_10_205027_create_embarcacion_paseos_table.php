<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmbarcacionPaseosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('embarcacion_paseos', function ($table) {
            $table->increments('id');
            $table->integer('embarcacion_id')->unsigned();
            $table->integer('paseos_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();

        });
    }

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('embarcacion_paseos');
	}

}
