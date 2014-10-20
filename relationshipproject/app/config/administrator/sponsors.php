<?php

return array(

    /**
     ** Model title
     **
     ** @type string
     **/

    'title' => 'Sponsors',

    /**
     ** The singular name of your model
     **
     ** @type string
     **/
    'single' => 'Sponsor',

    /**
     ** The class name of the Eloquent model that this config represents
     **
     ** @type string
     **/
    'model' => 'Sponsor',

    /**
     * The columns array
     *
     * @type array
     */
    'columns' => array(

        'id' => array(
            'title' => 'ID',
        ),

        'name' => array(
            'title' => 'Name',
        ),

        'birthday' => array(
            'title' => 'Birthday',
        ),

        'email' => array(
            'title' => 'Email',
        ),

        'country' => array(
            'title' => 'Country',
        ),

        'address_home' => array(
            'title' => 'Address Line 1',
        ),

        'address_work' => array(
            'title' => 'Address Line 2',
        ),

        'suburb' => array(
            'title' => 'Suburb',
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

        'contact_date' => array(
            'title' => 'Contact Date',
        ),

        'contact_start' => array(
            'title' => 'Contact Start',
        ),

        'contact_end' => array(
            'title' => 'Contact End',
        ),

        'contacted' => array(
            'title' => 'Contacted',
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

        'birthday' => array(
            'title' => 'Birthday',
            'type' => 'date'
        ),

        'address_home' => array(
            'title' => 'Address Line 1',
            'type' => 'text'
        ),

        'address_work' => array(
            'title' => 'Address Line 2',
            'type' => 'text'
        ),

        'suburb' => array(
            'title' => 'Suburb',
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

        'contact_date' => array(
            'title' => 'Contact Date',
            'type' => 'date'
        ),

        'contact_start' => array(
            'title' => 'Contact Start',
            'type' => 'time'
        ),

        'contact_end' => array(
            'title' => 'Contact End',
            'type' => 'time'
        ),

        'contacted' => array(
            'title' => 'Contacted',
            'type' =>'bool'
        ),
    ),
);

?>
