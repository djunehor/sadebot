<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->text('user_name', 65535)->nullable();
			$table->string('session_id', 256)->nullable();
			$table->integer('bot_id')->nullable();
			$table->integer('chatlines')->nullable();
			$table->string('ip', 100)->nullable();
			$table->text('referer', 65535)->nullable();
			$table->text('browser', 65535)->nullable();
			$table->timestamp('date_logged_on')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->timestamp('last_update')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->text('state', 65535)->nullable();
			$table->integer('id_role')->nullable();
			$table->string('name', 250)->nullable();
			$table->string('password', 250)->nullable();
			$table->string('email', 250)->nullable();
			$table->timestamps();
			$table->string('remember_token', 250)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
