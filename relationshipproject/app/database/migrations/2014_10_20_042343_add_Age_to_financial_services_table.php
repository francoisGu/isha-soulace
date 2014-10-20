<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddAgeToFinancialServicesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('financial_services', function(Blueprint $table)
		{
            $table->integer('age')->default(0)->unsigned();
			
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('financial_services', function(Blueprint $table)
		{
			
            $table->drop_column('age');
		});
	}

}
