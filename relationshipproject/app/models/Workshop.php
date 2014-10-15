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
