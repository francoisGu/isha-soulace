<?php

class ServiceProvider extends \Eloquent {

    protected $fillable = array('identity', 'abn', 
        'acn','unit','street_number','street_name','street_type','suburb','state','postcode' ,'phone','mobile','mode','companyName', 'firstName', 'lastName', 'email');

    public static $rules = array();

    protected $table = 'serviceProviders';

    public function user(){
        return $this->morphOne('User', 'userable' );
    }

    public function workshops(){
        return $this->hasMany('Workshop'); 
    }

}
