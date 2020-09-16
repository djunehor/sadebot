<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoutesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('routes', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('origin', 100);
			$table->string('destination', 100);
			$table->integer('price');
			$table->integer('distance');
			$table->integer('vehicle_id');
			$table->text('nodes');
			$table->timestamps();

			DB::statement('SET FOREIGN_KEY_CHECKS=1;');
			$table->foreign('vehicle_id')->references('id')->on('vehicles');
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
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
		Schema::drop('routes');
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
	}

}
