<?php

class ServiceReview extends \Eloquent {
	protected $fillable = ['service_provider_id','form_id', 'score', 'ratings', 'review'];

    protected $table = 'servicereview';

    public function serviceProvider(){
        
        return $this->belongsTo('ServiceProvider');
    
    }
}
