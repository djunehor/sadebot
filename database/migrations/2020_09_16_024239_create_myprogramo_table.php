<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMyprogramoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('myprogramo', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('user_name', 256)->unique('user_name');
			$table->string('password', 256);
			$table->string('last_ip', 25);
			$table->timestamp('last_login')->default(DB::raw('CURRENT_TIMESTAMP'));
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('myprogramo');
	}

}
