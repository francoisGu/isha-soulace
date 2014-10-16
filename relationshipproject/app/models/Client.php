<?php

class Client extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = ['email'];

    protected $table = 'clients';

    public function workshops(){
        return $this->belongsToMany('Workshop');
    }

    public function serviceProviders(){
        return $this->belongsToMany('ServiceProvider', 'client_serviceProvider', 'client_id', 'serviceProvider_id');
    }

}
