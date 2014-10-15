<?php

class WorkshopsController extends \BaseController {

    public function __construct() {
        $this->beforeFilter('csrf',  array('on'=>'post'));
    }


    /**
     * Display a listing of the resource.
     * GET /workshops
     *
     * @return Response
     */
    public function index()
    {
        //$workshops = Workshop::all();
        $workshops = Workshop::paginate(20);

        //return Response::json(Workshop::get());
        return View::make('workshops.index')
            ->with('workshops', $workshops);
        //
    }

    /**
     * Show the form for creating a new resource.
     * GET /workshops/create
     *
     * @return Response
     */
    public function create()
    {
        return View::make('workshops.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     * POST /workshops
     *
     * @return Response
     */
    public function store()
    {
        //
        //
        if(! Sentry::check()){
            return Redirect::to('users/login')->with('message', 'Please log in first'); 
        }

        $sp = Sentry::getUser()->userable;
        $input = Input::all();
        $validator = Validator::make($input, Workshop::$rules);

        if ($validator->passes())
        {
            try {
                $venue = Input::get('unit') . ' ' . Input::get('street_number') 
                    .' ' . Input::get('street_name') . ',' .  
                    Input::get('street_type') . ',' . Input::get('suburb') . ',' 
                    . Input::get('state') . ',' . Input::get('postcode');
                $geocode = Geocoder::geocode($venue);
                // ...
                Workshop::create(array_merge( array(
                    'service_provider_id' => $sp->id, 
                    'ticket_number' => Input::get('total_ticket_number'), 
                    'longitude' => $geocode['longitude'], 
                    'latitude' => $geocode['latitude']) , 
                    $input));
                //return Response::json(array('success' => true));
                //

                Session::flash('message', 'Address: ' . $venue . ' | Geocode: ' 
                    . $geocode{'latitude'}. ',' . $geocode['longitude']);
                return Redirect::to('myworkshops'); 

            } catch (\Exception $e) {
                // Here we will get "The FreeGeoIpProvider does not support 
                // Street addresses." ;)
                return Redirect::route('workshops.create')
                    ->withinput()
                    ->witherrors($validator)
                    ->with('message', $e->getMessage());
 
            }

        }

        return Redirect::route('workshops.create')
            ->withinput()
            ->witherrors($validator)
            ->with('message', 'there are validation errors');
    }

    /**
     * Display the specified resource.
     * GET /workshops/{id}
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $workshop = Workshop::find($id);
        if(is_null($workshop)){
            return Redirect::back();
        }

        return View::make('workshops.show')
            ->with('workshop', $workshop);
    }

    /**
     * Show the form for editing the specified resource.
     * GET /workshops/{id}/edit
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
        $workshop = Workshop::find($id);
        if(is_null($workshop)){
            return Redirect::route('workshops.index');
        }

        return View::make('workshops.edit')
            ->with('workshop', $workshop);
    }

    /**
     * Update the specified resource in storage.
     * PUT /workshops/{id}
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $input = Input::all();
        $validator = Validator::make($input, Workshop::$rules);
        if ($validator->passes())
        {
            try {
                $venue = Input::get('unit') . ' ' . Input::get('street_number') 
                    .' ' . Input::get('street_name') . ' ' .  
                    Input::get('street_type') . ', ' . Input::get('suburb') . ', 
                    ' . Input::get('state') . ', ' . Input::get('postcode');
                $geocode = Geocoder::geocode($venue);
                // ...

                $workshop = Workshop::find($id);
                $workshop->update(array_merge( array('ticket_number' => 
                    Input::get('total_ticket_number'), 'longitude' => 
                    $geocode['longitude'], 'latitude' => $geocode['latitude']) , 
                    $input));

                Session::flash('message', 'Address: ' . $venue . ' | Geocode: ' 
                    . $geocode{'latitude'}. ',' . $geocode['longitude'] );
                //Session::flash('message', var_dump($geocode));
                return Redirect::route('workshops.show', $id);
                    //->with('message', 'Update successful');
 

            } catch (\Exception $e) {

                return Redirect::to('workshops/' . $id . '/edit')
                    ->withInput()
                    ->withErrors($validator)
                    ->with('message', $e->getMessage());


            }


        }

        return Redirect::to('workshops/' . $id . '/edit')
            ->withInput()
            ->withErrors($validator)
            ->with('message', 'There are validation errors');

    }

    /**
     * Remove the specified resource from storage.
     * DELETE /workshops/{id}
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Workshop::find($id)->delete();
        //return Redirect::route('workshops.index');
        return Redirect::to('myworkshops');

        //Workshop::destroy($id);
        //return Response::json(array('success' => true));
    }

	/**
     *  	 
     * retrieve all workshops w.r.t currently loging user	 
	 * @return Response
	 */
    public function getMyWorkshops(){
        if(! Sentry::check()){
            return Redirect::to('users/login')->with('message', 'Please log in first.'); 
        }
        $sp = Sentry::getUser()->userable;
        //dd($sp->email);

        if(get_class($sp) == 'ServiceProvider'){
            $workshops = $sp->workshops;

            return View::make('serviceProviders.myWorkshops')->with('workshops', $workshops)->with('sp', $sp);
        
        }
    }

    public function findByPostcode($postcode){
        
        $workshops = Workshop::where('postcode', '=', $postcode)->get();

        if(count((array) $workshops) <= 5){
        
        }
    
    }

    public function expandRange($postcode, $range){
        
        $expand = [];
        //$workshops = Workshop::get(array('latitude','longitude'))->lists('id');

        $pos = Map::getPositionByPostcode($postcode); 

        Workshop::chunk(200, function($workshops){
            
            foreach($workshops as $workshop){

                dd($workshop);

                $lat = $workshop->latitude;
                $lon = $workshop->longitude;
                $dist = Map::calc_dist($lat, $lon, $pos['lat'], $pos['lon']);

                if($dist <= range){
                    array_push($expand, $workshop); 
                }
            }
        
        });

        return $expand;
    
    }

}
