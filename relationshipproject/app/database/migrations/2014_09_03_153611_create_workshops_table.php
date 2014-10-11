<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWorkshopsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('workshops', function(Blueprint $table)
		{
			$table->integer('Workshop_id', true);
			$table->string('Workshop_Topic', 100);
			$table->string('Workshop_Vanue', 200);
			$table->integer('Workshop_Tickets')->nullable();
			$table->integer('Workshop_Duration')->nullable();
			$table->integer('Service_Provider_id')->index('Service_Provider_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('workshops');
	}

}
