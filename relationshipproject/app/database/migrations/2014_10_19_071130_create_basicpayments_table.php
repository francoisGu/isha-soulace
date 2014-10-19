<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBasicPaymentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('basicpayments', function($t){
			$t->increments('id');
			$t->string('type')->nullable();
			$t->integer('pay_amount')->nullable();
			$t->string('email')->nullable();
			$t->integer('item_amount')->nullable();
			$t->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		Schema::drop('basicpayments');
	}

}
