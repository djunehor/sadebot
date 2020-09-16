<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNodesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('nodes', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('route_id');
			$table->integer('a_id');
			$table->integer('b_id');

            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            $table->foreign('route_id')->references('id')->on('routes');
            $table->foreign('a_id')->references('id')->on('places');
            $table->foreign('b_id')->references('id')->on('places');
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
		Schema::drop('nodes');
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
	}

}
