<?php

use Payum\Core\Registry\RegistryInterface;
use Payum\Core\Request\GetHumanStatus;
use Payum\Core\Security\HttpRequestVerifierInterface;
use Symfony\Component\HttpFoundation\Request;

class PaymentController extends BaseController
{
	public function examples()
	{
		return \View::make('payment_examples');
	}

    public function done($payum_token)
    {
        /** @var Request $request */
        $request = \App::make('request');
        $request->attributes->set('payum_token', $payum_token);

        $token = $this->getHttpRequestVerifier()->verify($request);
        $status = new GetHumanStatus($token);
        $this->getPayum()->getPayment($token->getPaymentName())->execute($status);
        $_url = $this->storagePaymentAction($token, $status->getStatus());

        return Redirect::to($_url)->withErrors('Payment successful.');
        
        // return \Response::json(array(
        //     'status' => $status->getStatus(),
        //     'details' => iterator_to_array($status->getModel())
        // ));
    }


    public function storagePaymentAction($token, $status)
    {
        //get payment info from cache
        $payum_id = $token->getDetails()->getID();
        $value = Cache::get($payum_id);
        //$value = Cache::get($payum_id);
        if ($value) {
            if ($status == 'success'){
                //save to Payment table
                $paymentInfo = array(
                            'type' => $value['item'],
                            'pay_amount'=> $value['_amount']*$value['_price'],
                            'email'=> $value['email'],
                            'item_amount'=> $value['_amount'],
                    );
                $payment = BasicPayment::create($paymentInfo);
            }
            # act with different payment
            if ($value['item'] == 'workshop') {
                if ($status == 'success') {
                    $value['workshop_payment_amount'] = $value['amount'];
                    $value['workshop_id'] = $value['id'];
                    $payment = WorkshopPayment::create($value);
                    if ($payment) {
                        // take off available ticket in workshop table
                        $workshop = Workshop::find($value['id']);
                        $ticket_left = $workshop->ticket_number - $value['amount'];
                        $affectedRows = Workshop::where('id', '=', $value['id'])
                                    ->update(array('ticket_number' => $ticket_left));  

                        // create tickets and send emails
                        for($i= 0; $i< $value['amount']; $i++){
                             // create ticket for client
                            $newTicket = Ticket::generateTicket($value['workshop_id'],  $value['email']);
                            // send email 
                            Ticket::sendTicket($newTicket, $value['email']);
                        }                 
                    }
                }
                return 'workshoplist';
            }elseif ($value['item'] == 'advertisement') {
                if ($status == 'success') {
                    $affectedRows = WorkshopAdvertisement::where('id','=',$value['id'])
                                    ->update(array('paid' => 1)); 
                }
                return 'myworkshops';
            }elseif ($value['item'] == 'form') {
                # code...

            }elseif ($value['item'] == 'donation') {
                if ($status == 'success') {
                    $title      = isset($value['title'])?($value['title'].' '):'';
                    $firstname  = isset($value['firstname'])?($value['firstname'].' '):'';
                    $lastname   = isset($value['lastname'])?$value['lastname']:'';
                    $value['name'] = $title.$firstname.$lastname;
                    $payment = Donation::create($value);
                }
                return 'donations';
            }
        }
        return 'home';
    }

    /**
     * @return RegistryInterface
     */
    protected function getPayum()
    {
        return \App::make('payum');
    }

    /**
     * @return HttpRequestVerifierInterface
     */
    protected function getHttpRequestVerifier()
    {
        return \App::make('payum.security.http_request_verifier');
    }
}
