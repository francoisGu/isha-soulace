<?php

class SponsorController extends BaseController
{
	public function getSponsors(){
		return View::make('sponsors');
	}

	public function postSponsors(){
		$sponsorInfo = Input::all();
		if ($sponsorInfo['contact_time'] == 1 or $sponsorInfo['contact_time'] == 0){
			$sponsorInfo['contact_start'] ='9:00:00';
			$sponsorInfo['contact_end'] ='13:00:00';
		}elseif ($sponsorInfo['contact_time'] == 2) {
			$sponsorInfo['contact_start'] ='13:00:00';
			$sponsorInfo['contact_end'] ='17:00:00';
		}elseif ($sponsorInfo['contact_time'] == 3) {
			if ($sponsorInfo['start_time'] == '' or $sponsorInfo['end_time'] == '') {
				return Redirect::back()->with('message', 'You have to selet a contact time!');
			}

			$sponsorInfo['contact_start'] =$sponsorInfo['start_time'].':00';
			$sponsorInfo['contact_end'] = $sponsorInfo['end_time'].':00';
		}

		$validator = Validator::make($sponsorInfo, 
			array(
				'title'=> 'required|max:20',
				'firstname'=> 'required|max:20',
				'lastname'=> 'required|max:20',
                'birthday' => 'date',
                'email' => 'required|max:50|email', 
                'country' => 'max:20',
                'address_home' => 'max:200',
                'address_work' => 'max:200',
                'suburb' => 'max:50',
                'postcode' => 'max:20',
                'phonenumber' => 'required|max:20',
                'mobile' =>'max:20',
                'contact_date' =>'required|date',
				'contact_start' =>'required|max:20',
				'contact_end' =>'required|max:20'
			));
      
		if ($validator->fails()) {
			return Redirect::route('sponsors')
					->withErrors($validator)
					->withInput();
		}else{
			$sponsorInfo['name'] = $sponsorInfo['title'].' '.$sponsorInfo['firstname'].' '.$sponsorInfo['lastname'];
			$sponsorInfo['contacted'] = 0;
			$newSponsor = Sponsor::create($sponsorInfo);
			if ($newSponsor) {
		    	Mailgun::send('emails.sponsor', 
		    					$sponsorInfo, 
		    					function($message) use ($newSponsor) {
		            					$message->to($newSponsor->email, $newSponsor->name)
		            					->subject('Sponsorship');
		        }); 
		        return Redirect::back()->with('message', 'Thanks for your support.');				

			}else{

			}
		}
	}
}