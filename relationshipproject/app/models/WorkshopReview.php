<?php

class WorkshopReview extends \Eloquent {
	protected $fillable = ['workshop_id', 'ticketNumber', 'score', 'ratings', 'review'];

    protected $table = 'workshopreview';

    public function workshop(){
        return $this->belongsTo('Workshop');
    }

    public static function has_reviewed($ticket_number) {
    	if(WorkshopReview::where('ticketNumber', '=', $ticket_number)->first())
    		return true;
    	return false;
    }

}
