<?php

// app/models/Comment.php

class WebReviews extends Eloquent {
        // let eloquent know that these attributes will be available for mass assignment
	protected $fillable = array('author', 'text'); 
}