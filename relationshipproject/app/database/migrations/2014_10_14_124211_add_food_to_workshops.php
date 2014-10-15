<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddFoodToWorkshops extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('workshops', function(Blueprint $table)
		{
            $table->boolean('food')->default(0);
			
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('workshops', function(Blueprint $table)
		{
            $table->drop_column('food');
		});
	}

}
