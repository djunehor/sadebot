<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUndefinedDefaultsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('undefined_defaults', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('bot_id');
			$table->integer('user_id')->default(0);
			$table->text('pattern', 65535);
			$table->string('template', 256);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('undefined_defaults');
	}

}
