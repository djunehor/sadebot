<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSraiLookupTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('srai_lookup', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('bot_id');
			$table->text('pattern');
			$table->integer('template_id')->index('template_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('srai_lookup');
	}

}
