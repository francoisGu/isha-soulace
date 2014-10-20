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
    'single' => 'BasicPayment',

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
    /*'columns' => array(*/

        //'id' => array('title' => 'ID', ),
        //'type' => array('title' => 'Type', ),
        //'email' => array('title' => 'Email', ),
        //'pay_amount' => array('title' => 'Pay Amount', ),
        //'item_amount' => array('title' => 'Item Amount',),
    /*),*/

    'columns' => array(

        'id' => array(
            'title' => 'ID',
        ),
        'type' => array(
            'title' => 'Type',
        ),

        'pay_amount' => array(
            'title' => 'Pay Amount',
        ),

        'item_amount' => array(
            'title' => 'Item Amount',
        ),

        'email' => array(
            'title' => 'Email'
        ),

    ),

    /**
     * The edit fields array
     *
     * @type array
     */
    'edit_fields' => array(
        'email' => array('title' => 'Email', 'type' => 'text'),
        'pay_amount' => array('title' => 'Pay Amount', 'type' => 'number'),
    ),
);


?>
