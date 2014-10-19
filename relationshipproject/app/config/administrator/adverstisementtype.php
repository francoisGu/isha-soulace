<?php

return array(

    /**
     ** Model title
     **
     ** @type string
     **/

    'title' => 'Adverstisement Type',

    /**
     ** The singular name of your model
     **
     ** @type string
     **/
    'single' => 'adverstisementtype',

    /**
     ** The class name of the Eloquent model that this config represents
     **
     ** @type string
     **/
    'model' => 'AdvertisementType',

    /**
     * The columns array
     *
     * @type array
     */
    'columns' => array(

        'id' => array(
            'title' => 'ID',
        ),

        'type' => array(
            'title' => 'Type',
        ),

        'price' => array(
            'title' => 'Price',
        ),
    ),

    /**
     * The edit fields array
     *
     * @type array
     */
    'edit_fields' => array(
       
        'type' => array(
            'title' => 'type',
            'type' => 'text'
        ),

        'price' => array(
            'title' => 'Price',
            'type' => 'number'
        ),
    ),
);


?>
