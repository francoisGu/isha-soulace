<?php

// app/models/Comment.php

class Accommodation extends Eloquent {
        // let eloquent know that these attributes will be available for mass assignment
		protected $primaryKey = "id";
		protected $fillable = ['service_provider_id','form_id', 'score', 'ratings', 'review'];
							
        protected $table = 'accommodation_service'; // table name
        //public $timestamps = 'false' ; // to disable default timestamp fields
		
 
        // model function to store form data to database
        public static function saveFormData($data)
        {
            DB::table('accommodation_service')->insert($data);
        }
		public function serviceProvider(){
        return $this->belongsToMany('ServiceProvider');
    }
 
}