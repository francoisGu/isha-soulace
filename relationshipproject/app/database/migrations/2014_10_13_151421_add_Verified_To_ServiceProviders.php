<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddVerifiedToServiceProviders extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('serviceProviders', function(Blueprint $table)
		{
			
            $table->boolean('verified')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('serviceProviders', function(Blueprint $table)
		{
            $table->drop_column('verified');
		});
	}

}
