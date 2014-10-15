<?php

class Review extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'reviews';

	protected $fillable = array('form_id', 'ratings', 'review_content');

    static public function getReview($form_id)
    {
    	$review =  Review::where('form_id', '=', $form_id)->first();
    	return $review;
    }

    static public function getReviews()
    {
    	return Review::all();
    }


 
// Alias Editor classes so they are easy to use
}
