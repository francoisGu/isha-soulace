<?php
use Carbon\Carbon;

class PaypalController extends BaseController
{
	public function postDonation()
    {
        $donationInfo = Input::all();
        //return print_r($donationInfo);
        if (empty($donationInfo['amount'])) {
            if (empty($donationInfo['other_amount'])) {
                return Redirect::back()->withErrors('Amount cannot be 0.');;
            }else{
                $donationInfo['amount'] = $donationInfo['other_amount'];
            }            
        }
        $donationInfo['item'] = 'donation';
        //paypal info
        $donationInfo['_id'] = 'DONATIONS';
        $donationInfo['_topic'] = 'Donation';
        $donationInfo['_price'] = $donationInfo['amount'];
        $donationInfo['_amount'] = 1;
        $donationInfo['_description'] = 'Thank you for your donation!';

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
                                'service_provider_id' => $workshop->service_provider_id,
                                'amount' => $payWorkshopInfo['amount'],
                                'email' => $payWorkshopInfo['email'],
                                'id' => $workshop->id,
                                //paypal info
                                '_price' => $workshop->price,
                                '_amount' => $payWorkshopInfo['amount'],
                                '_topic' => $workshop->topic,
                                '_description' => $workshop->description,
                                '_id' => $workshop->id,
        );

        $paypal_url = $this->getPaypalURL($paymentInfo);
        return \Redirect::to($paypal_url);
        
    }

    //This function is implemented in WorkshopAdvvertisementsController
    public function postPayAdvertisement(){}

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
        $details['L_PAYMENTREQUEST_0_NAME0']=$paymentInfo['_topic'];
        $details['L_PAYMENTREQUEST_0_NUMBER0']= $paymentInfo['_id'];//workshop_id
        $details['L_PAYMENTREQUEST_0_DESC0']=$paymentInfo['_description'];
        $details['L_PAYMENTREQUEST_0_AMT0']=$paymentInfo['_price'];
        $details['L_PAYMENTREQUEST_0_QTY0']=$paymentInfo['_amount'];  
        $details['PAYMENTREQUEST_0_ITEMAMT']=$paymentInfo['_price']*$paymentInfo['_amount'];
        $details['PAYMENTREQUEST_0_AMT']=$paymentInfo['_price']*$paymentInfo['_amount'];
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
