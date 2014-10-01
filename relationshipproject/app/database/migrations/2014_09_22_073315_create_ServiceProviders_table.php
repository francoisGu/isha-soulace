<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateServiceProvidersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('serviceProviders', function(Blueprint $table)
		{

            $table->engine ='InnoDB';
			$table->increments('id');
            $table->string('identity');
            $table->string('acn')->nullable();
            $table->string('abn')->nullable();
            $table->string('unit')->nullable();
            $table->string('street_number')->nullable();
            $table->string('street_name')->nullable();
            $table->string('street_type')->nullable();
            $table->string('suburb')->nullable();
            $table->string('state')->nullable();
            $table->integer('postcode')->unsigned()->nullable();
            $table->string('phone')->nullable();
            $table->string('mobile')->nullable();
            $table->boolean('mode')->default(0);
            $table->string('companyName')->nullable();
            $table->string('firstName')->nullable();
            $table->string('lastName')->nullable();
            $table->string('email')->unique();

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
		Schema::drop('ServiceProviders');
	}

}
