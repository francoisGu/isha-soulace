<?php

class Donation extends \Eloquent {
	protected $fillable = [ 'amount',
                            'name',
                            'email',
                            'country',
                            'address',
                            'postcode',
                            'phonenumber',
                            'mobile',
                            ];
	protected $table = "donations";
}