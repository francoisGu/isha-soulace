<?php

class Sponsor extends \Eloquent {
	protected $fillable = [
                            'name',
                            'birthday',
                            'email',
                            'country',
                            'address_home',
                            'address_work',
                            'suburb',
                            'postcode',
                            'phonenumber',
                            'mobile',
                            'contact_date',
                            'contact_start',
                            'contact_end', 
                            'contacted'
                            ];
	protected $table = "sponsors";
}