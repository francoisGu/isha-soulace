<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateServicesPaymentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('services_payment', function(Blueprint $table)
		{
			$table->integer('Services_Payment_id', true);
			$table->integer('Services_Payment_Amount');
			$table->integer('Service_Provider_id');
			$table->integer('Client_id')->index('Client_id');
			$table->index(['Service_Provider_id','Client_id'], 'Service_Provider_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('services_payment');
	}

}
