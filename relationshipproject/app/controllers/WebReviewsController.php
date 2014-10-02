<?php

class WebReviewsController extends \BaseController {
public function create()
{
 //add new book form
       return View::make('review.create');
}

public function store()
{
   
    //get all book information
    $bookInfo = Input::all();
    //validate book information with the rules
      //$validation=Validator::make($bookInfo,$rules);
      //if($validation->passes())
     // {
      //save new book information in the database 
      //and redirect to index page
          Review::create($bookInfo);
          //return Redirect::route('books.index')
            // ->withInput()
            // ->withErrors($validation)
            // ->with('message', 'Successfully created book.');
     // }
      //show error message
     // return Redirect::route('books.create')
      //     ->withInput()
      //     ->withErrors($validation)
       //    ->with('message', 'Some fields are incomplete.');
}

}
