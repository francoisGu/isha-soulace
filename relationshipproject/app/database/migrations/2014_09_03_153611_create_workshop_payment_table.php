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
			$table->increments('id');
			$table->integer('workshop_payment_amount');
			$table->integer('service_provider_id')->index('service_provider_id');
			$table->string('payment_id');
			$table->integer('workshop_id');

			$table->timestamps();
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
