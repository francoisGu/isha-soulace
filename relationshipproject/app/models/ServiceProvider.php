<?php


class ServiceProvider extends Eloquent {

	public function user() {
		return $this->belongsTo('User');
	}

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'service_providers';

	protected $fillable = array('identity', 'abn', 'acn','address','phone','mobile','mode','user_id','companyname');
     
    static public function getServiceProvider($user_id) {   	
			$serviceProvider = ServiceProvider::where('user_id', '=', $user_id)->first();
            return $serviceProvider;			
    }

    static public function updateServiceProvider($user_id) {
    	$serviceProvider = ServiceProvider::getServiceProvider($user_id)
    	->update(array('identity' => Input::get('identity'),
    	               'abn' => Input::has('ABN') ? Input::get('ABN') : null,
    	               'acn' => Input::has('ACN') ? Input::get('ACN') : null,
    	               'address' => Input::has('address') ? Input::get('address') : null,
    	               'phone' => Input::has('phone') ? Input::get('phone') : null,
    	               'mobile' => Input::has('mobile') ? Input::get('mobile') : null,
    	               'mode' => Input::has('mode') ? Input::get('mode') : null,
    	               'companyname' => Input::has('companyname') ? Input::get('companyname') : null,
    	               ));
    }

    
	}