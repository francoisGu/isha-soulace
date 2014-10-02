<?php

use Illuminate\Database\Eloquent\ModelNotFoundException;

class Workshop extends \Eloquent {
    protected $fillable = ['topic','description','unit', 'street_number', 'street_name', 'street_type', 'suburb', 'state', 'postcode', 'date','start_time','end_time','total_ticket_number','price'];
    protected $guarded = array('id');

    public static $rules = array(
        'topic'                 => 'required',
        'description'           => 'required',
        'unit'                  => 'required',
        'street_number'         => 'required',
        'street_name'           => 'required',
        'street_type'           => 'required',
        'suburb'                => 'required',
        'state'                 => 'required',
        'postcode'              => 'required',
        'date'                  => 'required',
        'start_time'            => 'required',
        'end_time'              => 'required',
        'total_ticket_number'   => 'required',
        'price'                 => 'required' 
    
    );

    protected $table = "workshops";

    public function ticket(){
        return $this->hasMany('Ticket'); 
    }

    public function __toString()
    {
      return $this->name;
    }
}
