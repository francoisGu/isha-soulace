<?php

class WebsiteReview extends \Eloquent {
	protected $fillable = ['email', 'score', 'ratings', 'review'];

    protected $table = 'websitereview';
}
