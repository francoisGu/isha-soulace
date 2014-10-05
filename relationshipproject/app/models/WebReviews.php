<?php

// app/models/Comment.php

class WebReviews extends Eloquent {
        // let eloquent know that these attributes will be available for mass assignment
	        protected $guarded = array();
        protected $table = 'review'; // table name
        public $timestamps = 'false' ; // to disable default timestamp fields
 
        // model function to store form data to database
        public static function saveFormData($data)
        {
            DB::table('review')->insert($data);
        }
 
}
}