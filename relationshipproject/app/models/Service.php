<?php

class Service extends \Eloquent {
    protected $fillable = ['type'];

    public static function serviceTypes(){
        $types = DB::table('services')->lists('type');

        $services = array();

        foreach($types as $type){

            $services[$type] = $type;


        }
        return $types;
    }

}
