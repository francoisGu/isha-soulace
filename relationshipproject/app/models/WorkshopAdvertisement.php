<?php

class WorkshopAdvertisement extends \Eloquent {
    protected $fillable = ['workshop_id', 'start_date', 'end_date', 'type'];

    protected $guarded = array('ticket_number');

    protected $table = 'workshopadvertisements';

    public static $rules = array(
        'start_date'    => 'required|date',  
        'end_date'      => 'required|date', 
        'type'          => 'required|in:"general", "premium"'
    );

    public function workshop(){
        return $this->belongsTo('Workshop'); 
    }
}
