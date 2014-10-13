<?php

class WorkshopAdvertisementsController extends \BaseController {


    protected $layout = "layouts.main";

    public function __construct(){
        $this->beforeFilter('csrf', array('on' => 'post'));
        $this->beforeFilter('sentry', array('only'=>array('create', 'store', 'show','edit', 'update', 'destroy')));
        $this->beforeFilter('serviceProviders', array('only'=>array('create', 'store', 'show','edit', 'update', 'destroy')));

    }
    /**
     * Display a listing of the resource.
     * GET /workshopadvertisements
     *
     * @return Response
     */
    public function index()
    {
        //
        //$advertisements = WorkshopAdvertisement::all();

        $advertisements = WorkshopAdvertisement::paginate(20);
        //$this->layout->content = View::make('workshopAdvertisements.index', array('advertisements' => $advertisements));
        return View::make('workshopAdvertisements.index', compact('advertisements'));

    }

    /**
     * Show the form for creating a new resource.
     * GET /workshopadvertisements/create
     *
     * @return Response
     */
    public function create()
    {
        $workshop_id = Input::get('workshop_id');
        $workshop = Workshop::find($workshop_id);
        //
        if(is_null($workshop)){
            return Redirect::back()->withErrors('Workshop ' . $workshop_id . ' not found!');
        }
        return View::make('workshopAdvertisements.create')->with('workshop', $workshop);
    }

    /**
     * Store a newly created resource in storage.
     * POST /workshopadvertisements
     *
     * @return Response
     */
    public function store()
    {
        //
        $validator = Validator::make($data=Input::all(), WorkshopAdvertisement::$rules);

        if($validator->fails()){
            return Redirect::back()->withErrors($validator)->withInput();
        }

        WorkshopAdvertisement::create($data);
        return Redirect::route('workshopAdvertisements.index');

    }

    /**
     * Display the specified resource.
     * GET /workshopadvertisements/{id}
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $advertisement = WorkshopAdvertisement::find($id);
        //
        return View::make('workshopAdvertisements.show')->with('workshopAdvertisement', $advertisement);
    }

    /**
     * Show the form for editing the specified resource.
     * GET /workshopadvertisements/{id}/edit
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $advertisement = WorkshopAdvertisement::find($id);
        return View::make('workshopAdvertisements.edit')->with('workshopAdvertisement', $advertisement);
        //return View::make('workshopAdvertisements.edit', compact('advertisement'));
        //
    }

    /**
     * Update the specified resource in storage.
     * PUT /workshopadvertisements/{id}
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $workshopAdvertisement = WorkshopAdvertisement::findOrFail($id);

        $validator = Validator::make($data = Input::all(), WorkshopAdvertisement::$rules);

        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $workshopAdvertisement->update($data);

        return Redirect::route('workshopAdvertisements.index');
        //
    }

    /**
     * Remove the specified resource from storage.
     * DELETE /workshopadvertisements/{id}
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        WorkshopAdvertisement::destroy($id);
        return Redirect::route('workshopAdvertisements.index');
        //
    }

    public function getPremiumAdvertisements(){
        
        $workshop = new Workshop;
        $premiumAds = $workshop->workshopAdvertisement()->where('type', '=', 'premium')->where('paid', '=', 1)->get();

        return View::make('workshopAdvertisements.premium', compact('premiumAds'));

    }

}
