<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class MakeMenuitemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('menuitems', function (Blueprint $table) {
				$table->increments('id');
				$table->string('name');
				$table->integer('level')->default(1);
				$table->integer('parent_id')->nullable();
				$table->string('url');
				$table->text('description');
				$table->timestamps();
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('menuitems');
	}

}
