<?php

// app/models/Comment.php

class WebReviews extends Eloquent {
        // let eloquent know that these attributes will be available for mass assignment
		protected $primaryKey = "WR_id";
	       protected $fillable = array('WR_email','WR_score', 'WR_rating', 'WR_review');
        protected $table = 'webreviews'; // table name
        public $timestamps = 'false' ; // to disable default timestamp fields
		
 
        // model function to store form data to database
        public static function saveFormData($data)
        {
            DB::table('webreviews')->insert($data);
        }
 
}
