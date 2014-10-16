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
        return $this->belongsToMany('ServiceProvider');
    }

    public static function is_email_existed($email) {
        if (Client::where('email', '=', $email)->first())
            return true;
        else return false;
    }

    public static function is_form_id_existed($form_id) {
        if (Client::where('email', '=', $email)->first())
            return true;
        else return false;
    }

}
