<?php
use Payum\Core\Storage\FilesystemStorage;
use Payum\Paypal\ExpressCheckout\Nvp\Api;
use Payum\Paypal\ExpressCheckout\Nvp\PaymentFactory as PaypalPaymentFactory;

$detailsClass = 'Payum\Core\Model\ArrayObject';
$tokenClass = 'Payum\Core\Model\Token';

$paypalPayment = PaypalPaymentFactory::create(new Api(array(
    'username' => 'relationship_api1.test.com',
    'password' => 'VLJSNMEBZ8ZQ6MGK',
    'signature' => 'AFCypIaCHccyImr-Ek-zIdMvhqwyAbvvbHcFzOhD663UvGEaHdzK8wEE',
    'sandbox' => true
)));

return array(
    'token_storage' => new FilesystemStorage(sys_get_temp_dir(), $tokenClass, 'hash'),
    'payments' => array(
        'paypal_es' => $paypalPayment,
    ),
    'storages' => array(
        $detailsClass => new FilesystemStorage(sys_get_temp_dir(), $detailsClass),
    )
);
