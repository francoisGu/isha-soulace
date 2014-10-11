<?php

class Administrator extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = ['type', 'first_name', 'last_name', 'email'];

    public function user(){
    
        return $this->morphOne('User', 'userable');
    }

}
