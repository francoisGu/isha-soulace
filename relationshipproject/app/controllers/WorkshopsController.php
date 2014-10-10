<?php

class WorkshopsController extends \BaseController {

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
        $input = Input::all();
        $validator = Validator::make($input, Workshop::$rules);
        if ($validator->passes())
        {
            Workshop::create($input);
            //return Response::json(array('success' => true));
            return Redirect::route('workshops.index'); 
        
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
            return Redirect::route('workshops.index');
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
            $workshop = Workshop::find($id);
            $workshop->update($input);
            return Redirect::route('workshops.show', $id); 
        }

        return Redirect::route('workshops.edit')
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
        return Redirect::route('workshop.index');
		
        //Workshop::destroy($id);
        //return Response::json(array('success' => true));
	}

}
