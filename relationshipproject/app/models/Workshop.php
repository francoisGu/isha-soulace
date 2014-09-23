<?php

use Illuminate\Database\Eloquent\ModelNotFoundException;

class Workshop extends \Eloquent {
    protected $fillable = ['id','topic','description','unit', 'street_number', 'street_name', 'street_type', 'suburb', 'state', 'postcode', 'date','start_time','end_time','total_ticket_number','price'];
    protected $guarded = array('id', 'price');

    protected $table = "workshops";

    public function ticket(){
        return $this->hasMany('Ticket'); 
    }

    public function __toString()
    {
      return $this->name;
    }
}
