<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	
		//
		 public function up()
        {
        Schema::create('review', function($t) {
          $t->increments('id');
          $t->string('email', 50);
          $t->string('rating', 5);
          $t->text('review');
          $t->timestamps();
        });
        }

        /**
         * Reverse the migrations.
         */
        public function down()
        {
                Schema::drop('entries');
        }
	


}
