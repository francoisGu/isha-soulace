<?php

class Ticket extends \Eloquent {
    protected $fillable = ['workshop_id', 'class', 'ticketNumber', 'client_id'];

    protected $table = 'tickets';

    public function workshop(){
        return $this->belongsTo('Workshop');
    }

    public function client(){
        return $this->belongsTo('Client');
    }

    public static function generateTicket($workshop_id, $client_email){

        $workshop = Workshop::find($workshop_id);
        if(is_null($workshop)){
            return Response::make("the workshop doesn't exist");
        }

        $ticketNumber = uniqid($workshop->class . $workshop_id);


        $client = new Client(array('email' => $client_email));

        // attach client to workshop
        $workshop->clients()->save($client);

        // create a new ticket and store to db
        $ticket = Ticket::create(array(
            'workshop_id' => $workshop->id, 
            'class' => $workshop->class, 
            'ticketNumber' => $ticketNumber, 
            'client_id' => $client->id
        ));

        return Response::make('Ticket generated.');
    }

    /*
     * sendTicket to client email
     */
    public static function sendTicket(Ticket $ticket){

        Mailgun::send('emails.ticket', $data, function($message) use 
            ($userInfo) {
                $message -> to($userInfo['email'], 
                    'there') 
                    -> subject('Your ticket to workshop');
            });


    }

    public static function is_ticket_existed($ticket_number) {
        if (Ticket::where('ticketNumber', '=', $ticket_number)->first())
            return true;
        else return false;
    }
}
