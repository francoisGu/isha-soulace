<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWorkshopPaymentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('workshop_payment', function(Blueprint $table)
		{
			$table->integer('Workshop_Payment_id', true);
			$table->integer('Workshop_Payment_Amount');
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
		Schema::drop('workshop_payment');
	}

}
