<?php

// app/models/Comment.php

class ServicesReviews extends Eloquent {
        // let eloquent know that these attributes will be available for mass assignment
		protected $primaryKey = "WR_id";
	       protected $fillable = array('SR_form_id','SR_score', 'SR_rating', 'SR_review');
        protected $table = 'servicesreviews'; // table name
        public $timestamps = 'false' ; // to disable default timestamp fields
		
 
        // model function to store form data to database
        public static function saveFormData($data)
        {
            DB::table('servicesreviews')->insert($data);
        }
 
}
