<?php

class BasicPayment extends Eloquent {
	protected $fillable = [
                            'type',
                            'pay_amount',
                            'email',
                            'item_amount',
                            ];
	protected $table = "basicpayments";
}