<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuthTokensTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('auth_tokens', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('id_string');
			$table->integer('id_user');
			$table->string('token');
			$table->timestamp('expiry_date')->default(DB::raw('CURRENT_TIMESTAMP'));
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
		Schema::drop('auth_tokens');
	}

}
