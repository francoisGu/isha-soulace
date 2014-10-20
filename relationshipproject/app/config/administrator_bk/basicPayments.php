<?php

return array(

    /**
     ** Model title
     **
     ** @type string
     **/

    'title' => 'All Payments',

    /**
     ** The singular name of your model
     **
     ** @type string
     **/
    'single' => 'PaymentInfo',

    /**
     ** The class name of the Eloquent model that this config represents
     **
     ** @type string
     **/
    'model' => 'BasicPayment',

    /**
     * The columns array
     *
     * @type array
     */
    'columns' => array(

        'id' => array('title' => 'ID'),
        'type' => array('title' => 'Type'),
        'email' => array('title' => 'eMail'),
        'pay_amount' => array('title' => 'Pay Amount'),
        'item_amount' => array('title' => 'Item Amount'),
    ),

    /**
     * The edit fields array
     *
     * @type array
     */
    'edit_fields' => array(
        'email' => array('title' => 'eMail', 'type' => 'text'),
    ),
);


?>
