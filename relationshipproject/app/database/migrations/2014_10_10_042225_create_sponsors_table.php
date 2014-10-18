<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSponsorsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sponsors', function($t){
			$t->increments('id');
			$t->string('name')->nullable();
			$t->date('birthday')->nullable();
			$t->string('email')->nullable();
			$t->string('country')->nullable();
			$t->string('address_home')->nullable();
			$t->string('address_work')->nullable();
			$t->string('suburb')->nullable();
			$t->string('postcode')->nullable();
			$t->string('phonenumber')->nullable();
			$t->string('mobile')->nullable();
            $t->date('contact_date')->nullable();
			$t->time('contact_start')->nullable();
			$t->time('contact_end')->nullable();
			$t->integer('contacted');
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
		Schema::drop('sponsors');
	}

}
