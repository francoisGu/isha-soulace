<?php

// app/models/Comment.php

class Mental extends Eloquent {
        // let eloquent know that these attributes will be available for mass assignment
		protected $primaryKey = "id";
	       //protected $fillable = array('WR_email','WR_score', 'WR_rating', 'WR_review');
        protected $table = 'mental_services'; // table name
        public $timestamps = 'false' ; // to disable default timestamp fields
		
 
        // model function to store form data to database
        public static function saveFormData($data)
        {
            DB::table('mental_services')->insert($data);
        }
 
}