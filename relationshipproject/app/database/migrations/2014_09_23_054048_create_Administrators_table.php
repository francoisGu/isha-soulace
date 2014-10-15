<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAdministratorsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('administrators', function(Blueprint $table)
    {

        $table->engine ='InnoDB';
        $table->increments('id');
        $table->string('type');

        $table->string('first_name')->nullable();
        $table->string('last_name')->nullable();
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
        Schema::drop('Administrators');
    }

}
