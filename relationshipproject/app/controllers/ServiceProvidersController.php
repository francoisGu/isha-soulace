<?php

class ServiceProvidersController extends \BaseController {

    public function __construct() {
        $this->beforeFilter('csrf',  array('on'=>'post'));

        $this->beforeFilter('sentry', array('only'=>array('create', 'store', 'show','edit', 'update', 'destroy')));
        $this->beforeFilter('serviceProviders', array('only'=>array('create', 'store', 'show','edit', 'update', 'destroy')));
    }


	/**
	 * Display a listing of the resource.
	 * GET /serviceproviders
	 *
	 * @return Response
	 */
	public function index()
	{
		//
        $sps = ServiceProvider::paginate(20);

        return View::make('serviceProviders.index')->with('sps', $sps);
	}

	/**'
	 * Show the form for creating a new resource.
	 * GET /serviceproviders/create
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('serviceProviders.create');
		//
	}

	/**
     * Store a manually newly created resource in storage.
     * with default password 123456
	 * POST /serviceproviders
	 *
	 * @return Response
	 */
	public function store()
	{
		//
        $validator = Validator::make($data=Input::all(), ServiceProvider::$rules);

        if($validator->fails()){
            return Redirect::back()->withErrors($validator)->withInput();
        }

        User::register('ServiceProvider', array_merge($data, array('password' => Hash::make('123456'))));

        //$sp = ServiceProvider::create($data);
        /*Sentry::register(array_merge($data, array('userable_id' => $sp->id, 'userable_type' => get_class($sp), 'password' => Hash::make('123456'))));*/
        return Redirect::route('serviceProviders.index');

	}

	/**
	 * Display the specified resource.
	 * GET /serviceproviders/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        $sp = ServiceProvider::find($id);
		//
        return View::make('serviceProviders.show')->with('sp', $sp);
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /serviceproviders/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $sp = ServiceProvider::find($id);
        
        return View::make('serviceProviders.edit')->with('sp', $sp); 
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /serviceproviders/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        $sp = ServiceProvider::findOrFail($id);
        //dd($sp);
		//
        $validator = Validator::make($data = Input::all(), ServiceProvider::$rules);

        if($validator->fails()){
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $sp->update(array_merge($data, ['message' => 'success']));

        //dd($data);
        return Redirect::route('serviceProviders.show', $id);
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /serviceproviders/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        ServiceProvider::destroy($id);
        return Redirect::route('serviceProviders.index');
		//
	}

}
