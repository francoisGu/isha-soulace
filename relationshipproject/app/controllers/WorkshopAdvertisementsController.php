<?php

class WorkshopAdvertisementsController extends \BaseController {


    protected $layout = "layouts.main";

    public function __construct(){
        $this->beforeFilter('csrf', array('on' => 'post'));

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
        $workshop_id = Crypt::decrypt(Input::get('workshopid'));
        $workshop = Workshop::find($workshop_id);

        $types = array();
        $adTypes = AdvertisementType::get();

        foreach( $adTypes as $adType ){
            $types[$adType->type] = $adType->type . ' AU$ ' . $adType->price;
        }


        //
        if(is_null($workshop)){
            return Redirect::back()->withErrors('Workshop ' . $workshop_id . ' not found!');
        }
        return View::make('workshopAdvertisements.create')->with('workshop', $workshop)->with('types', $types);
    }

    /**
     * Store a newly created resource in storage.
     * POST /workshopadvertisements
     *
     * @return Response
     */
    public function store()
    {
        $validator = Validator::make($data=Input::all(), WorkshopAdvertisement::$rules);

        if($validator->fails()){
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $workshop_ads = WorkshopAdvertisement::create($data);

        if(Input::get('paynow')){

            $ads_info = AdvertisementType::where('type','=', $data['type'])->first();
            $data['item'] = 'advertisement';
            $data['id'] = $workshop_ads->id;

            $data['email'] = $workshop_ads->workshop->serviceProvider->email;
            //paypal config info
            $data['_id'] = 'advertisement';
            $data['_topic'] = $data['type'].' advertisements';
            $data['_price'] = $ads_info['price'];
            $data['_amount'] = 1;
            $data['_description'] = 'This is payment of '.$data['type'].' advertisements';
            $paypal_url = App::make('PaypalController')->getPaypalURL($data);
            return Redirect::to($paypal_url);
        }
        return Redirect::to('myworkshops');

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
        return View::make('workshopAdvertisements.edit')->with('workshopAdvertisement', $advertisement);
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
        $ad = WorkshopAdvertisement::find($id);

        $types = array();
        $adTypes = AdvertisementType::get();

        foreach( $adTypes as $adType ){
            $types[$adType->type] = $adType->type . ' AU$ ' . $adType->price;
        }


        return View::make('workshopAdvertisements.edit')->with('ad', $ad)->with('types', $types);
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

    $rules = array(
        'type'          => 'required|in:"general", "premium"',
    );

        $workshopAdvertisement = WorkshopAdvertisement::findOrFail($id);

        $validator = Validator::make($data = Input::all(), $rules);

        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $workshopAdvertisement->update($data);

        return Redirect::to('myworkshops');
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
