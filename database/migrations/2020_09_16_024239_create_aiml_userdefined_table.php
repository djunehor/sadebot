<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAimlUserdefinedTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('aiml_userdefined', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('pattern', 256)->index('pattern');
			$table->string('thatpattern', 256)->index('thatpattern');
			$table->text('template', 65535);
			$table->string('user_id', 256)->index('user_id');
			$table->integer('bot_id')->index('bot_id');
			$table->timestamp('date')->default(DB::raw('CURRENT_TIMESTAMP'));
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('aiml_userdefined');
	}

}
