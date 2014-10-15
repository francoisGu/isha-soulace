<?php

// app/models/Comment.php

class Accommodation extends Eloquent {
        // let eloquent know that these attributes will be available for mass assignment
		protected $primaryKey = "Acc_id";
	      // protected $fillable = array('WR_email','WR_score', 'WR_rating', 'WR_review');
        protected $table = 'acc_service'; // table name
        public $timestamps = 'false' ; // to disable default timestamp fields
		
 
        // model function to store form data to database
        public static function saveFormData($data)
        {
            DB::table('acc_service')->insert($data);
        }
 
}
