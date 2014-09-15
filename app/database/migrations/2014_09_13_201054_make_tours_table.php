<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class MakeToursTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tours', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('departure');
			$table->string('name');
			$table->string('order');
			$table->boolean('public')->default(true);
			$table->boolean('lunes')->default(true);
			$table->boolean('martes')->default(true);
			$table->boolean('miercoles')->default(true);
			$table->boolean('jueves')->default(true);
			$table->boolean('viernes')->default(true);
			$table->boolean('sabado')->default(true);
			$table->boolean('domingo')->default(true);
			$table->text('descripcion');
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tours');
	}

}
