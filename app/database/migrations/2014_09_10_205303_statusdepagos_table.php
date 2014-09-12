<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class StatusdepagosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('statusdepagos',function($table){
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
	public function down()
	{
		Schema::drop('statusdepagos');
	}

}
