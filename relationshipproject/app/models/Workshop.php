<?php

use Illuminate\Database\Eloquent\ModelNotFoundException;

class Workshop extends \Eloquent {
    protected $fillable = ['class', 'food','service_provider_id','topic','description','unit', 'street_number', 'street_name', 'street_type', 'suburb', 'state', 'postcode', 'date','start_time','end_time','total_ticket_number', 'ticket_number', 'price', 'longitude', 'latitude'];
    protected $guarded = array('id');

    public static $rules = array(
        //'service_provider_id'   => 'required',
        'topic'                 => 'required',
        'description'           => 'required',
        'unit'                  => 'required',
        'street_number'         => 'required|integer',
        'street_name'           => 'required',
        'street_type'           => 'required',
        'suburb'                => 'required',
        'state'                 => 'required',
        'postcode'              => 'required|integer',
        'date'                  => 'required|date_format:Y-m-d',
        'start_time'            => 'required|date_format:H:i',
        'end_time'              => 'required|date_format:H:i',
        'total_ticket_number'   => 'required|integer',
        'price'                 => 'required|numeric' 
    
    );

    protected $table = "workshops";


    public function getStartTimeAttribute($value)
    {
        //$this->getAttribute('start_time')
        //return date_format($value, 'H:i');
        return date('H:i', strtotime($value));
    }

    public function getEndTimeAttribute($value)
    {
        //$this->getAttribute('end_time')
        //return date_format($value, 'H:i');
        return date('H:i', strtotime($value));
    }

    public function workshopAdvertisement(){
        return $this->hasOne('WorkshopAdvertisement');
    }

    public function tickets(){
        return $this->hasMany('Ticket'); 
    }

    public function serviceProvider(){
        return $this->belongsTo('ServiceProvider');
    }

    public function clients(){
        return $this->belongsToMany('Client');
    }

    public function reviews(){
        return $this->hasMany('WorkshopReview');
    }
}
