<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWorkshopReviewTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('workshopreview', function(Blueprint $table)
		{

            $table->engine ='InnoDB';
			$table->increments('id');
            $table->integer('workshop_id')->unsigned();
            $table->foreign('workshop_id')->references('id')->on('workshops');

            $table->string('ticketNumber')->references('ticketNumber')->on('tickets')->unique();

            $table->integer('score')->unsigned();

            $table->integer('ratings')->unsigned();

            $table->text('review');

			$table->timestamps();

            $table->index(array('workshop_id', 'ticketNumber'));
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('workshopreview');
	}

}
