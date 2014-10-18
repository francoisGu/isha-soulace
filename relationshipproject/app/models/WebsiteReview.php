<?php

class WebsiteReview extends \Eloquent {
	protected $fillable = ['email', 'score', 'ratings', 'review'];

    protected $table = 'websitereview';

    public $timestamps = 'true' ;

    public static function has_reviewed($email) {
    	if(WebsiteReview::where('email', '=', $email)->first())
    		return true;
    	return false;
    }
}
