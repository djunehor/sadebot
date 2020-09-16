<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBotpersonalityTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('botpersonality', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->boolean('bot_id')->default(0);
			$table->string('name', 256)->default('');
			$table->text('value', 65535);
			$table->index(['bot_id','name'], 'botname');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('botpersonality');
	}

}
