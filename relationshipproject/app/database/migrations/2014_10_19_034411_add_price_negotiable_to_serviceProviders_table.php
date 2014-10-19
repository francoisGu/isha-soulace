<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddPriceNegotiableToServiceProvidersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('serviceProviders', function(Blueprint $table)
		{
			
            $table->integer('price')->default(0);
            $table->boolean('negotiable')->default(0);
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
			
            $table->drop_column('price');
            $table->drop_column('negotiable');
		});
	}

}
