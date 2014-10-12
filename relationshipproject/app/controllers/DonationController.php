<?php

class DonationController extends BaseController {

protected $layout = "layouts.menu";


public function getDonations() {
	$this->layout->content = View::make('donations');
}

}



