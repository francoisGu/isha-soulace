<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToWorkshopPaymentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('workshop_payment', function(Blueprint $table)
		{
			$table->foreign('Service_Provider_id', 'workshop_payment_ibfk_1')->references('Service_Provider_id')->on('service_provider')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('workshop_payment', function(Blueprint $table)
		{
			$table->dropForeign('Service_Provider_id');
		});
	}

}
