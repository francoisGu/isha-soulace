<?php


class Client extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'clients';

    static public function getClients($user_id)
    {
    	$clients =  Client::where('service_provider_id', '=', $user_id)->get();
    	return $clients;
    }


 
// Alias Editor classes so they are easy to use
}
