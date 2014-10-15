<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateServiceReviewTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicereview', function(Blueprint $table)
    {

        $table->engine ='InnoDB';
        $table->increments('id');
        $table->integer('service_provider_id')->unsigned();
        $table->foreign('service_provider_id')->references('id')->on('serviceProviders');

        $table->string('form_id');

        $table->integer('score')->unsigned();

        $table->integer('ratings')->unsigned();

        $table->text('review');


        $table->timestamps();

        $table->index(array('service_provider_id', 'form_id'));
    });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ServiceReview');
    }

}
