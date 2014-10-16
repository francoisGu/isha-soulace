<?php

class ServiceReview extends \Eloquent {
	protected $fillable = ['service_provider_id','form_id', 'score', 'ratings', 'review'];

    protected $table = 'servicereview';

    public function serviceProvider(){
        
        return $this->belongsTo('ServiceProvider');
    
    }

    public static function has_reviewed($form_id) {
    	if(ServiceReview::where('form_id', '=', $form_id)->first())
    		return true;
    	return false;
    }
}
