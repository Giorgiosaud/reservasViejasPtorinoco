<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class MakeBoatsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('boats', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->integer('order');
			$table->boolean('public')->default(true);
			$table->integer('abordajemaximo');
			$table->integer('abordajenormal');
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
		Schema::drop('boats');
	}

}
