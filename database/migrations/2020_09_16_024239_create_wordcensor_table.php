<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWordcensorTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('wordcensor', function(Blueprint $table)
		{
			$table->integer('censor_id', true);
			$table->string('word_to_censor', 50);
			$table->string('replace_with', 50)->default('****');
			$table->string('bot_exclude', 256);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('wordcensor');
	}

}
