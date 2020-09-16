<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAimlTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('aiml', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('bot_id')->default(1)->index('bot_id');
			$table->string('pattern', 256)->index('pattern');
			$table->string('thatpattern', 256)->index('thatpattern');
			$table->text('template', 65535);
			$table->string('topic', 256)->index('topic');
			$table->string('filename', 256);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('aiml');
	}

}
