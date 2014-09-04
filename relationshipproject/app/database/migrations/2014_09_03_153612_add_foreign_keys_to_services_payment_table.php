<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToServicesPaymentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('services_payment', function(Blueprint $table)
		{
			$table->foreign('Service_Provider_id', 'services_payment_ibfk_1')->references('Service_Provider_id')->on('service_provider')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('Client_id', 'services_payment_ibfk_2')->references('Client_id')->on('client')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('services_payment', function(Blueprint $table)
		{
			$table->dropForeign('Service_Provider_id');
			$table->dropForeign('Client_id');
		});
	}

}
