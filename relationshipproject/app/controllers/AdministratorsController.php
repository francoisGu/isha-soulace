<?php

class AdministratorsController extends \BaseController {

	/**
	 * Display a listing of administrators
	 *
	 * @return Response
	 */
	public function index()
	{
		$administrators = Administrator::all();

		return View::make('administrators.index', compact('administrators'));
	}

	/**
	 * Show the form for creating a new administrator
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('administrators.create');
	}

	/**
	 * Store a newly created administrator in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Administrator::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Administrator::create($data);

		return Redirect::route('administrators.index');
	}

	/**
	 * Display the specified administrator.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$administrator = Administrator::findOrFail($id);

		return View::make('administrators.show', compact('administrator'));
	}

	/**
	 * Show the form for editing the specified administrator.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$administrator = Administrator::find($id);

		return View::make('administrators.edit', compact('administrator'));
	}

	/**
	 * Update the specified administrator in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$administrator = Administrator::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Administrator::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$administrator->update($data);

		return Redirect::route('administrators.index');
	}

	/**
	 * Remove the specified administrator from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Administrator::destroy($id);

		return Redirect::route('administrators.index');
	}

}
