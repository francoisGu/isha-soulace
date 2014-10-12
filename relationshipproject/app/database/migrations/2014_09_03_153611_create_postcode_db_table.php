<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePostcodeDbTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('postcode_db', function(Blueprint $table)
		{
			$table->integer('postcode')->unsigned();
			$table->string('suburb', 45);
			$table->string('state', 4);
			$table->string('dc', 45);
			$table->string('type', 45);
			$table->float('lat', 10, 0)->default(0)->index('idx_lat');
			$table->float('lon', 10, 0)->default(0)->index('idx_lon');
			$table->primary(['postcode','suburb']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('postcode_db');
	}

}
