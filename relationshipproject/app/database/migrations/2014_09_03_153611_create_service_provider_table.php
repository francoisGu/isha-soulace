<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateServiceProviderTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('service_provider', function(Blueprint $table)
		{
			$table->integer('Service_Provider_id', true);
			$table->string('Service_Provider_name', 15);
			$table->string('Service_Provider_Email', 20);
			$table->string('Service_Provider_Profession', 20);
			$table->integer('Service_Provider_OfficeNumber')->nullable();
			$table->string('Service_Provider_Suburb', 20);
			$table->integer('Service_Provider_Postcode');
			$table->integer('Service_Provider_Charges')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('service_provider');
	}

}
