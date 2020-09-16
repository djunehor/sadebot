<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuthAppsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('auth_apps', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('id_string');
			$table->string('name');
			$table->boolean('abolished')->default(0);
			$table->dateTime('abolished_at')->nullable();
			$table->integer('abolished_by')->nullable();
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
		Schema::drop('auth_apps');
	}

}
