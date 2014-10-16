<?php
use Carbon\Carbon;

class PaypalController extends BaseController
{
	public function postDonation()
    {
        //$donationInfo = Input::all();
        $donationInfo = array(
                            'item' => 'donation',
                            'donation_amount' => 5,
                            'title' => 'Mr.',
                            'firstname' => 'Frank',
                            'lastname' => 'Gu',
                            'birthday' => '1900-04-01',
                            'email' => 'relationship@test.com',
                            'country' => 'Australia',
                            'address_home' => 'University of Melbourne',
                            'address_work' => 'University of Melbourne',
                            'suburb' => 'Carlton',
                            'postcode' => '3000',
                            'mobile' => '0423421775',
                            'receipt' => 'A',
                            'amount' => 1,
            );
        if (empty($donationInfo['donation_amount'])) {
            // change direct..
            return Redirect::back();
        }
        $donationInfo['id'] = 'DONATIONS';
        $donationInfo['topic'] = 'Donation';
        $donationInfo['price'] = $donationInfo['donation_amount'];
        $donationInfo['amount'] = 1;
        $donationInfo['description'] = 'Thank you for your donation!';

        //$this->getPaypalURL($donationInfo);
        $paypal_url = $this->getPaypalURL($donationInfo);
        return \Redirect::to($paypal_url);
    }

    public function postPayWorkshops()
    {
        $payWorkshopInfo = Input::all();
        
        if (!isset($payWorkshopInfo['workshop_id'])) {
            // change direct..
            return Redirect::back()->withErrors('Workshop not found!');
        }        
        $workshop = Workshop::find($payWorkshopInfo['workshop_id']);
        if($workshop == null){
            return Redirect::back()->withErrors('Workshop not found!');
        }

        $validator = Validator::make($payWorkshopInfo, array(
                        'email' => 'required|email',
                        'amount' => 'integer|between:0,'.$workshop->ticket_number, 
            ));
        if($validator->fails()){
            return Redirect::back()->withErrors($validator);
        }
        $paymentInfo = array(
                                'item' => 'workshop',
                                'price' => $workshop->price,
                                'amount' => $payWorkshopInfo['amount'],
                                'service_provider_id' => $workshop->service_provider_id,
                                'topic' => $workshop->topic,
                                'description' => $workshop->description,
                                'id' => $workshop->id,
        );

        $paypal_url = $this->getPaypalURL($paymentInfo);
        return \Redirect::to($paypal_url);
        
    }
    public function postPayAdvertisement()
    {
        //$workshopID = Input::all();
        //id
        //type
        $paymentInfo = array(
                    'advertisement_id' => 1,
                    'type' => '1',         
            );

        //check 
        $workshop_ads = WorkshopAdvertisement::find($paymentInfo['advertisement_id']);
        if (!$workshop_ads || $workshop_ads->paid != 0) {
            return Redirect::back();
        }

        $ads_info = AdvertisementType::where('type','=', $paymentInfo['type'])->first();

        $paymentInfo['item'] = 'advertisement';
        $paymentInfo['id'] = 'advertisement';
        $paymentInfo['topic'] = 'advertisements';
        $paymentInfo['price'] = $ads_info['price'];
        $paymentInfo['amount'] = 1;
        $paymentInfo['description'] = '~~~';

        $paypal_url = $this->getPaypalURL($paymentInfo);
        return \Redirect::to($paypal_url);

    }

    public function postPayForms()
    {
        $workshopID = Input::all();
        //$itemInfo = $this->getItemInfo('workshop',$itemRequired['workshopID']);

    }

    public function getPaypalURL($paymentInfo)
    {
        // /$paymentInfo['amount'] = (!empty($paymentInfo['amount']))? $paymentInfo['amount']:1;
        $storage = $this->getPayum()->getStorage('Payum\Core\Model\ArrayObject');

        $details = $storage->createModel();
        $details['L_PAYMENTREQUEST_0_NAME0']=$paymentInfo['topic'];
        $details['L_PAYMENTREQUEST_0_NUMBER0']= $paymentInfo['id'];//workshop_id
        $details['L_PAYMENTREQUEST_0_DESC0']=$paymentInfo['description'];
        $details['L_PAYMENTREQUEST_0_AMT0']=$paymentInfo['price'];
        $details['L_PAYMENTREQUEST_0_QTY0']=$paymentInfo['amount'];  
        $details['PAYMENTREQUEST_0_ITEMAMT']=$paymentInfo['price']*$paymentInfo['amount'];
        $details['PAYMENTREQUEST_0_AMT']=$paymentInfo['price']*$paymentInfo['amount'];
        $details['PAYMENTREQUEST_0_CURRENCYCODE'] = 'AUD';        
        $storage->updateModel($details);

        $captureToken = $this->getTokenFactory()->createCaptureToken('paypal_es', $details, 'payment_done');
        $details['RETURNURL'] = $captureToken->getTargetUrl();
        $details['CANCELURL'] = $captureToken->getTargetUrl();
        $storage->updateModel($details);

        //save payment info to cache
        $key = $captureToken->getDetails()->getID();
        $paymentInfo['payment_id'] = $key;
        $expiresAt = Carbon::now()->addMinutes(10);
        Cache::put($key, $paymentInfo, $expiresAt); 
        return $captureToken->getTargetUrl();
    }

    /**
     * @return \Payum\Core\Registry\RegistryInterface
     */
    protected function getPayum()
    {
        return \App::make('payum');

    }

    /**
     * @return \Payum\Core\Security\GenericTokenFactoryInterface
     */
    protected function getTokenFactory()
    {
        return \App::make('payum.security.token_factory');
    }
}
/*
$details['L_PAYMENTREQUEST_0_NAME0']='10% Decaf Kona Blend Coffee';
$details['L_PAYMENTREQUEST_0_NUMBER0']= 623083;  
$details['L_PAYMENTREQUEST_0_DESC0']='Size: 8.8-oz';
$details['L_PAYMENTREQUEST_0_AMT0']=9.95;
$details['L_PAYMENTREQUEST_0_QTY0']=2;  
$details['L_PAYMENTREQUEST_0_NAME1']='Coffee Filter bags';  
$details['L_PAYMENTREQUEST_0_NUMBER1']=623084;  
$details['L_PAYMENTREQUEST_0_DESC1']='Size: Two 24-piece boxes';  
$details['L_PAYMENTREQUEST_0_AMT1']=39.70;  
$details['L_PAYMENTREQUEST_0_QTY1']=2;  
$details['PAYMENTREQUEST_0_ITEMAMT']=99.30;  
$details['PAYMENTREQUEST_0_TAXAMT']=2.58;  
$details['PAYMENTREQUEST_0_SHIPPINGAMT']=3.00;  
$details['PAYMENTREQUEST_0_HANDLINGAMT']=2.99;  
$details['PAYMENTREQUEST_0_SHIPDISCAMT']=-3.00;  
$details['PAYMENTREQUEST_0_INSURANCEAMT']=1.00;  
$details['PAYMENTREQUEST_0_AMT']=105.87;  
$details['PAYMENTREQUEST_0_CURRENCYCODE']='USD';
*/
