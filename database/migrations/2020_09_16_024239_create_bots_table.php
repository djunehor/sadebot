<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBotsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bots', function(Blueprint $table)
		{
			$table->integer('bot_id', true);
			$table->string('bot_name', 256);
			$table->string('bot_desc', 256);
			$table->integer('bot_active')->default(1);
			$table->integer('bot_parent_id')->default(0);
			$table->string('format', 10)->default('html');
			$table->enum('save_state', array('session','database'))->default('session');
			$table->integer('conversation_lines')->default(7);
			$table->integer('remember_up_to')->default(10);
			$table->text('debugemail', 65535);
			$table->integer('debugshow')->default(1);
			$table->integer('debugmode')->default(1);
			$table->text('error_response', 65535);
			$table->string('default_aiml_pattern', 256)->default('RANDOM PICKUP LINE');
			$table->string('unknown_user', 256)->default('Seeker');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('bots');
	}

}
