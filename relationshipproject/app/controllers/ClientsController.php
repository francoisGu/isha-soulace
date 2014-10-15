<?php

class ClientsController extends \BaseController {

	/**
	 * Display a listing of clients
	 *
	 * @return Response
	 */
	public function index()
	{
		$clients = Client::all();

		return View::make('clients.index', compact('clients'));
	}

	/**
	 * Show the form for creating a new client
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('clients.create');
	}

	/**
	 * Store a newly created client in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Client::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Client::create($data);

		return Redirect::route('clients.index');
	}

	/**
	 * Display the specified client.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$client = Client::findOrFail($id);

		return View::make('clients.show', compact('client'));
	}

	/**
	 * Show the form for editing the specified client.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$client = Client::find($id);

		return View::make('clients.edit', compact('client'));
	}

	/**
	 * Update the specified client in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$client = Client::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Client::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$client->update($data);

		return Redirect::route('clients.index');
	}

	/**
	 * Remove the specified client from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Client::destroy($id);

		return Redirect::route('clients.index');
	}


    public function getClients(){

        $TYPE = Crypt::decrypt(Input::get('TYPE'));
        $id = Crypt::decrypt(Input::get('id'));

        $service = $TYPE::find($id);        

        $clients = [];

        if($service != null){
            $clients = $service->clients;
        }

        return View::make('workshops.myClients')->with('clients', $clients)->with('service', $service);
         
    }

    public function searchClients(){

        $TYPE = Crypt::decrypt(Input::get('TYPE'));
        $id = Crypt::decrypt(Input::get('id'));
        $content = trim(Input::get('content'));

        $service = $TYPE::find($id);
        $clients = $service->clients;

        $found = array();

        if($service){
            
            foreach($clients as $client){
                $ticket = Ticket::where('client_id', $client->id)->where('workshop_id', $service->id)->pluck('ticketNumber');
                if($content == $client->email || $content == $ticket){

                    array_push($found, $client);
                
                }
            }

        }

        if(count($found) == 0){
            return View::make('workshops.myClients')->with('clients', $clients)->with('service', $service)->withErrors('Client not found'); 
        }

        $clients = $found;
        return View::make('workshops.myClients')->with('clients', $clients)->with('service', $service);
    
    }



    public function getSPClients(){

        if(! Sentry::check()){
            return Redirect::to('users/login')->with('message', 'Please log in first.'); 
        }
        $sp = Sentry::getUser()->userable;
        //dd($sp->email);

        if(get_class($sp) == 'ServiceProvider'){
            $clients = $sp->clients;

            return View::make('serviceProviders.myClients')->with('clients', $clients)->with('sp', $sp);

        }
    }

    public function registerWorkshop($workshop_id){

        $workshop = Workshop::find($workshop_id);

        if($workshop == null){
            return Redirect::back()->withErrors('Workshop not found!');
        }

        $rules = array(
            'email' => 'required|email',
            'number' => 'integer|between:0,'.$workshop->ticket_number, 
        );
        
        $validator = Validator::make(Input::all(), $rules);
        if($validator->fails()){
            return Redirect::back()->withErrors($validator);
        }
        $email = Input::get('client_email');
        $number = Input::get('number');
        //$workshop_id = Input::get('workshop_id');

        dd( $email . '  ' . $number . '  ' . $workshop_id);
        // payment function goes here
    }

}
