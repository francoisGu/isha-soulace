<?php

class WorkshopReview extends \Eloquent {
	protected $fillable = ['workshop_id', 'ticketNumber', 'score', 'ratings', 'review'];

    protected $table = 'workshopreview';

    public function workshop(){
        return $this->belongsTo('Workshop');
    }

}
