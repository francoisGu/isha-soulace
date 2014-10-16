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


        'email' => array(
            'title' => 'Email',

        ),


        'identity' => array(
            'title' => 'Identity',

        ),

        'companyName' => array(
            'title' => 'Company Name',


        ),

        'acn' => array(
            'title' => 'ACN',


        ),

        'first_name' => array(
            'title' => 'First Name',

        ),

        'last_name' => array(
            'title' => 'Last Name',

        ),

        'abn' => array(
            'title' => 'ABN',


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

    /**
     * This is where you can define the model's custom actions
     */
    'global_actions' => array(
        //Clearing the site cache
        'view_map' => array(
            'title' => 'View Map',
            'messages' => array(
                'active' => 'Rendering map...',
                'success' => 'Map showed',
                'error' => 'There was an error while rendering map',
            ),
            //the settings data is passed to the function and saved if a truthy response is returned
            'action' => function()
            {
                //Cache::flush();

                //return true to flash the success message
                //return false to flash the default error
                //return a string to show a custom error
                //return a Response::download() to initiate a file download
                return Redirect::to('map');
            }
        ),
    ),

);

?>
