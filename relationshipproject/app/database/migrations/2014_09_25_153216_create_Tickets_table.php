<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTicketsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function(Blueprint $table)
    {
        $table->engine ='InnoDB';

        $table->increments('id');
        $table->integer('workshop_id')->unsigned();
        $table->foreign('workshop_id')->references('id')->on('workshops');

        $table->string('class')->references('class')->on('workshops');

        $table->string('client_id')->nullable();

        $table->unique(array('class', 'workshop_id', 'id'));
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
        Schema::drop('Tickets');
    }

}
