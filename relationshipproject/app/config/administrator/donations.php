<?php

return array(

    /**
     ** Model title
     **
     ** @type string
     **/

    'title' => 'Donations',

    /**
     ** The singular name of your model
     **
     ** @type string
     **/
    'single' => 'Donation',

    /**
     ** The class name of the Eloquent model that this config represents
     **
     ** @type string
     **/
    'model' => 'Donation',

    /**
     * The columns array
     *
     * @type array
     */
    'columns' => array(

        'id' => array(
            'title' => 'ID',
        ),

        'amount' => array(
            'title' => 'Donation Amount',
        ),

        'name' => array(
            'title' => 'Name',
        ),

        'email' => array(
            'title' => 'Email',
        ),

        'country' => array(
            'title' => 'Country',
        ),

        'address' => array(
            'title' => 'Address',
        ),

        'postcode' => array(
            'title' => 'Postcode',
        ),

        'phonenumber' => array(
            'title' => 'Phone Number',
        ),

        'mobile' => array(
            'title' => 'Mobile',
        ),
    ),

    /**
     * The edit fields array
     *
     * @type array
     */
    'edit_fields' => array(
       
        'name' => array(
            'title' => 'Name',
            'type' => 'text'
        ),

        'email' => array(
            'title' => 'Email',
            'type' => 'text'
        ),

        'country' => array(
            'title' => 'Country',
            'type' => 'text'
        ),

        'address' => array(
            'title' => 'Address',
            'type' => 'text'
        ),

        'postcode' => array(
            'title' => 'Postcode',
            'type' => 'number'
        ),

        'phonenumber' => array(
            'title' => 'Phone Number',
            'type' => 'number'
        ),

        'mobile' => array(
            'title' => 'Mobile',
            'type' => 'number'
        ),
    ),
);

?>
