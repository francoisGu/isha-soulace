<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWorkshopsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workshops', function(Blueprint $table)
    {

        $table->engine ='InnoDB';
        $table->string('class')->nullable();
        $table->increments('id');
        $table->integer('service_provider_id')->unsigned();
        $table->foreign('service_provider_id')->references('id')->on('serviceProviders');

        $table->string('topic', 100)->nullable();
        $table->longText('description')->nullable();
        $table->string('unit')->nullable();
        $table->string('street_number')->nullable();
        $table->string('street_name')->nullable();
        $table->string('street_type')->nullable();
        $table->string('suburb')->nullable();
        $table->string('state')->nullable();
        $table->integer('postcode')->unsigned()->nullable();
        $table->date('date')->nullable();
        $table->time('start_time')->nullable();
        $table->time('end_time')->nullable();
        $table->integer('total_ticket_number')->nullable();
        $table->integer('ticket_number')->nullable();
        $table->float('price')->nullable();
        
        $table->double('longitude')->nullable();
        $table->double('latitude')->nullable();

        $table->timestamps();

        $table->index(array('service_provider_id', 'longitude', 'latitude'));
    });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('workshops');
    }

}
