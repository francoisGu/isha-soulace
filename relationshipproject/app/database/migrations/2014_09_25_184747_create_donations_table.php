<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDonationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('donations', function($t){
			$t->increments('id');
			$t->integer('amount');
			$t->string('name')->nullable();
			$t->string('email')->nullable();
			$t->string('country')->nullable();
			$t->string('address')->nullable();
			$t->integer('postcode')->nullable();
			$t->string('phonenumber')->nullable();
			$t->string('mobile')->nullable();
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
		Schema::drop('donations');
	}

}
