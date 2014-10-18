<?php

class WorkshopsController extends \BaseController {

    protected $per_page = 1;

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
        $types = DB::table('workshop_types')->lists('type');
        $workshop_types = array();

        foreach($types as $type){
            $workshop_types[$type] = $type;
        }

        return View::make('workshops.create')->with('workshop_types', $workshop_types);
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
                //$venue = Input::get('unit') . ' ' . Input::get('street_number') 
                //.' ' . Input::get('street_name') . ',' .  
                //Input::get('street_type') . ',' . Input::get('suburb') . ',' 
                //. Input::get('state') . ',' . Input::get('postcode');
                //$geocode = Geocoder::geocode($venue);

                $venue = Util::getVenue(Input::all());

                $geocode = Map::validateAddress($venue, Input::get('postcode'));

                if(is_null($geocode)){
                    return Redirect::back()->withErrors('Location not 
                        found.')->withInput();
                }

                $class = DB::table('workshop_types')->where('type', Input::get('type'))->pluck('code');

                // ...
                Workshop::create(array_merge( array( 'class' => $class,
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
                    ->witherrors($e->getMessage());

            }

        }

        return Redirect::route('workshops.create')
            ->withinput()
            ->witherrors($validator);
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

        $workshop_types = $this->workshop_types();
        return View::make('workshops.profile')
            ->with('workshop', $workshop)->with('workshop_types', $workshop_types);
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

        $types = DB::table('workshop_types')->lists('type');
        $workshop_types = array();

        foreach($types as $type){
            $workshop_types[$type] = $type;
        }

        return View::make('workshops.profile')
            ->with('workshop', $workshop)->with('workshop_types', $workshop_types);
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

                $class = DB::table('workshop_types')->where('type', Input::get('type'))->pluck('code');


                $workshop = Workshop::find($id);
                $workshop->update(array_merge( array('class' => $class
                    ,'ticket_number' => 
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
                    ->withErrors( $e->getMessage());


            }


        }

        return Redirect::to('workshops/' . $id . '/edit')
            ->withInput()
            ->withErrors($validator);

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


    public function selectWorkshop($id){

        $ads = WorkshopAdvertisement::where('paid', '=', 1)->get();

        $types = $this->workshop_types();

        $jump_to = null;

        $workshop = Workshop::find($id);
        $count = 0;
        $page = 1;
        foreach($ads as $ad){

            $count ++;
            if($ad->workshop && $ad->workshop->id == $id){
                $page = floor($count / $this->per_page);
                $jump_to = "workshop" . $id;

                $url = URL::to('workshoplist' . '?page=' . $page);
                return Redirect::to($url)
                    ->with('jump_to', $jump_to);

            }
        }
    }

    /*
     *  return all workshops to workshop list
     */
    public function getWorkshoplist(){

        $ads = WorkshopAdvertisement::where('paid', '=', 1)->paginate($this->per_page);

        $types = $this->workshop_types();

        return View::make('workshops.workshoplist')
            ->with('ads', $ads)
            ->with('types', $types);
    }

    /*
     * search for workshops by postcode and within range of 30;
     */
    public function searchWorkshop(){

        // list of workshop types for view
        $types = $this->workshop_types();

        $type = Input::get('type');
        $class = WorkshopType::where('type', $type)->pluck('code');
        $postcode = trim(Input::get('postcode'));

        $workshops = array();

        if($postcode != ""){
            $temp = Map::expandRange('Workshop',$postcode, 30);
            if(! is_null($class)){
                foreach($temp as $workshop){
                    if($workshop->class == $class){
                        array_push($workshops, $workshop->id);
                    }
                }
            } else {
                foreach($temp as $workshop){
                    array_push($workshops, $workshop->id);
                }
            }

        } else{
            if($class != null){
                $temp = Workshop::all();
                foreach($temp as $workshop){
                    if($workshop->class == $class){
                        array_push($workshops, $workshop->id);
                    }
                } 
            } 
        }

        if(count($workshops) == 0){

            $workshops = Workshop::all()->lists('id');
            $ads = WorkshopAdvertisement::whereIn('workshop_id', $workshops)->where('paid', '=', 1)->paginate($this->per_page);
            return View::make('workshops.workshoplist')->with('ads', $ads)->with('types', $types)->withErrors('Sorry! No workshop found.');

        }

        $ads = WorkshopAdvertisement::whereIn('workshop_id', $workshops)->where('paid', '=', 1)->paginate($this->per_page);
        return View::make('workshops.workshoplist')->with('ads', $ads)->with('types', $types);

    }

    /*
     * return all workshop types
     */
    public function workshop_types(){

        $types = DB::table('workshop_types')->lists('type');
        $workshop_types = array();

        foreach($types as $type){
            $workshop_types[$type] = $type;
        }

        return $workshop_types;
    }
}
