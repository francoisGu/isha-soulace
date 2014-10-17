<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFamilyService extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('family_services', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('type');
            $table->string('title');
            $table->string('first_name');
				$table->string('last_name');
				
				$table->string('gender');
				$table->string('address_line_1');
				$table->string('address_line_2');
				$table->string('suburb');
				$table->integer('postcode');
				$table->string('state');
				$table->string('country');
				$table->string('service');
				$table->string('same_sex');
				$table->string('status');
				$table->string('employment');
				$table->string('residency_status');
				$table->string('property');
				$table->string('liabilities');
				$table->string('superannuation');
				$table->string('will');
				$table->string('children');
				$table->string('health');
				$table->string('contact_mode');
				$table->string('email');
				$table->string('phonenumber');
				$table->string('mobile');
				$table->string('contact_date');
				$table->string('select_time');
				$table->string('start_time');
				$table->string('end_time');
          
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
		//
		Schema::drop('family_services');
	}


}
