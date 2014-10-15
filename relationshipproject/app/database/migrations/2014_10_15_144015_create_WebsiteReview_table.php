<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWebsiteReviewTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('websitereview', function(Blueprint $table)
    {
        $table->increments('id');

        $table->text('email');

        $table->integer('score')->unsigned();

        $table->integer('ratings')->unsigned();

        $table->text('review');
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
        Schema::drop('WebsiteReview');
    }

}
