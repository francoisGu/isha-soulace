<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWorkshopAdvertisementsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workshopAdvertisements', function(Blueprint $table)
    {
        $table->engine ='InnoDB';
        $table->increments('id');
        $table->integer('workshop_id')->unsigned()->unique();
        $table->foreign('workshop_id')->references('id')->on('workshops');
        $table->date('start_date')->nullable();
        $table->date('end_date')->nullable();
        $table->string('type')->default('general');
        $table->boolean('paid')->default(0);
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
        Schema::drop('WorkshopAdvertisements');
    }

}
