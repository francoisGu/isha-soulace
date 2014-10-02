<?php

class Ticket extends \Eloquent {
	protected $fillable = ['workshop_id', 'class', 'ticketNumber', 'client_id'];

    protected $table = 'tickets';

    public function workshop(){
        return $this->belongsTo('Workshop');
    }

    public static function generateTicket($workshop_id, $client_id){

        $workshop = Workshop::find($workshop_id);
        if(is_null($workshop)){
            return Response::make("the workshop doesn't exist");
        }
        $ticketNumber = uniqid($workshop->class . $workshop_id);

        Ticket::create(array('workshop_id' => $workshop_id, 'class' => '$workshop->class', 'ticketNumber' => $ticketNumber, 'client_id' => $client_id) );
        
    }
}
