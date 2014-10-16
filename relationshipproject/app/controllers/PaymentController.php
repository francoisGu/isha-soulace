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

        if (!$this->storagePaymentAction($token)) {
            # code...
            return Redirect::route('/'); 
        }

        $status = new GetHumanStatus($token);

        $this->getPayum()->getPayment($token->getPaymentName())->execute($status);

        return \Response::json(array(
            'status' => $status->getStatus(),
            'details' => iterator_to_array($status->getModel())
        ));
    }


    public function storagePaymentAction($token)
    {
        //get payment info from cache
        $payum_id = $token->getDetails()->getID();
        //$value = Cache::pull($payum_id);
        $value = Cache::pull($payum_id);
        //return print_r($value);
        /*
        if ($value['payment_done'] != false) {
            # code...
        }
        */
        //return print_r($value);

        if ($value) {
            # act with different payment
            if ($value['item'] == 'workshop') {
                $value['workshop_payment_amount'] = $value['amount'];
                $value['workshop_id'] = $value['id'];
                $payment = WorkshopPayment::create($value);
                if ($payment) {
                    $workshop = Workshop::find($value['id']);
                    $ticket_left = $workshop->ticket_number - $value['amount'];
                    $affectedRows = Workshop::where('id', '=', $value['id'])
                                ->update(array('ticket_number' => $ticket_left));  

                    }
                # send email
            }elseif ($value['item'] == 'advertisement') {
                    $affectedRows = WorkshopAdvertisement::where('id','=',$value['advertisement_id'])
                                    ->update(array('paid' => 1));  
            }elseif ($value['item'] == 'form') {
                # code...

            }elseif ($value['item'] == 'donation') {
                $title      = isset($value['title'])?($value['title'].' '):'';
                $firstname  = isset($value['firstname'])?($value['firstname'].' '):'';
                $lastname   = isset($value['lastname'])?$value['lastname']:'';
                $value['name'] = $title.$firstname.$lastname;
                $payment = Donation::create($value);
            }else{
                return false;
            }

        }else{
            return false;
        }
        return true;
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
