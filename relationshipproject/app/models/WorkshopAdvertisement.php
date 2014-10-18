<?php

class WorkshopAdvertisement extends \Eloquent {
    protected $fillable = ['workshop_id', 'start_date', 'end_date', 'type'];

    protected $guarded = array('ticket_number');

    protected $table = 'workshopadvertisements';

    public static $rules = array(
        'start_date'    => 'required|date',  
        'end_date'      => 'required|date', 
        'type'          => 'required|in:"general", "premium"',
        'workshop_id'   => 'required|unique:workshopadvertisements'
    );

    public function workshop(){
        return $this->belongsTo('Workshop'); 
    }

    public static function getFourWeeksAgo($date){

        $d = date('Y-m-d',strtotime('4 weeks ago ' . $date)); 

        return $d; 
    }

    public static function getPaidAdvertisements(){

        $ads = WorkshopAdvertisement::where('paid', '=', 1)->get();
    
    }

    public static function getAdvertisements($number, $type){


        $ads = WorkshopAdvertisement::where('type', $type)->where('paid', '=', 1)->get();


        if($ads->count() < $number){
            return $ads;
        }
        $ads = $ads->toArray();
        $r = array_rand( $ads, $number);

        $retrieve = array();


        for($i = 0; $i < $number; $i++){
            $key = $r[$i];
            array_push($retrieve, WorkshopAdvertisement::find($key + 1)); 
        }

        return $retrieve;
    }

}
