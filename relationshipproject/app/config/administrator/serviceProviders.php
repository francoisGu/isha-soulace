<?php

return array(

    /**
     ** Model title
     **
     ** @type string
     **/

    'title' => 'Service Providers',

    /**
     ** The singular name of your model
     **
     ** @type string
     **/
    'single' => 'serviceProvider',

    /**
     ** The class name of the Eloquent model that this config represents
     **
     ** @type string
     **/
    'model' => 'ServiceProvider',

    /**
     * The columns array
     *
     * @type array
     */
    'columns' => array(

        'id' => array(
            'title' => 'ID',


        ),

        'topic' => array(
            'title' => 'Topic',

        ),

        'description' => array(
            'title' => 'Descritption',


        ),

        'unit' => array(
            'title' => 'Unit',

        ),

        'street_number' => array(
            'title' => 'Street Number',

        ),

        'street_name' => array(
            'title' => 'Street Name',

        ),

        'street_type' => array(
            'title' => 'Street Type',

        ),

        'suburb' => array(
            'title' => 'Suburb',

        ),

        'state' => array(
            'title' => 'State',

        ),

        'postcode' => array(
            'title' => 'Postcode',

        ),

        'date' => array(
            'title' => 'Date',

        ),

        'start_time' => array(
            'title' => 'Start Time',

        ),

        'end_time' => array(
            'title' => 'End Time',

        ),

        'total_ticket_number' => array(
            'title' => 'Total Ticket Number',

        ),

        'price' => array(
            'title' => 'Price' 
        )
    ),

    /**
     * The edit fields array
     *
     * @type array
     */
    'edit_fields' => array(

        'topic' => array(
            'title' => 'Topic',
            'type' => 'text'

        ),

        'description' => array(
            'title' => 'Descritption',
            'type' => 'text'


        ),

        'unit' => array(
            'title' => 'Unit',
            'type' => 'text'

        ),

        'street_number' => array(
            'title' => 'Street Number',
            'type' => 'text'

        ),

        'street_name' => array(
            'title' => 'Street Name',
            'type' => 'text'

        ),

        'street_type' => array(
            'title' => 'Street Type',
            'type' => 'text'

        ),

        'suburb' => array(
            'title' => 'Suburb',
            'type' => 'text'

        ),

        'state' => array(
            'title' => 'State',
            'type' => 'text'

        ),

        'postcode' => array(
            'title' => 'Postcode',
            'type' => 'text'

        ),

        'date' => array(
            'title' => 'Date',
            'type' => 'date'

        ),

        'start_time' => array(
            'title' => 'Start Time',
            'type' => 'time'

        ),

        'end_time' => array(
            'title' => 'End Time',
            'type' => 'time'

        ),

        'total_ticket_number' => array(
            'title' => 'Total Ticket Number',
            'type' => 'number'

        ),

        'price' => array(
            'title' => 'Price (AU$)',
            'type' => 'number',
            //'symbol' => 'AU$', //optional, defaults to ''
            'decimals' => 2, //optional, defaults to 0
            'thousands_separator' => ',', //optional, defaults to ','
            'decimal_separator' => '.', //optional, defaults to '.'
        ),

    ),

);

?>
