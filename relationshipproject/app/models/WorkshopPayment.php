<?php

class WorkshopPayment extends \Eloquent {
	protected $fillable = [ 
		'workshop_payment_amount',
		'payment_id',
		'workshop_id',
		'service_provider_id',
	];
	protected $table = "workshop_payment";
}