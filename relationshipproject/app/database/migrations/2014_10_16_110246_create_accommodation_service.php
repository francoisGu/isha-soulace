<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccommodationService extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		
		Schema::create('accommodation_service', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('type');
            $table->string('title');
            $table->string('first_name');
				$table->string('last_name');
				$table->integer('age');
				$table->string('gender');
				$table->string('address_line_1');
				$table->string('address_line_2');
				$table->string('suburb');
				$table->integer('postcode');
				$table->string('state');
				$table->string('country');
				$table->integer('number_of_people');
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
		Schema::drop('accommodation_service');
	}

}
