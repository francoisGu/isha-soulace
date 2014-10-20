<?php

return array(

    /**
     ** Model title
     **
     ** @type string
     **/

    'title' => 'Advertisements',

    /**
     ** The singular name of your model
     **
     ** @type string
     **/
    'single' => 'Advertisement',

    /**
     ** The class name of the Eloquent model that this config represents
     **
     ** @type string
     **/
    'model' => 'WorkshopAdvertisement',

    /**
     * The columns array
     *
     * @type array
     */

    'columns' => array(

        'id' => array(
            'title' => 'ID',
        ),

        'workshop_id' => array(
            'title' => 'Workshop Id',
        ),

        'start_date' => array(
            'title' => 'Start Date',
        ),

        'end_date' => array(
            'title' => 'End Date',
        ),

        'type' => array(
            'title' => 'Type',
        ),

        'paid' => array(
            'title' => 'Paid',
        ),
    ),

    /**
     * The edit fields array
     *
     * @type array
     */
    'edit_fields' => array(
       
       'id' => array(
            'title' => 'ID',
            'type' => 'text'
        ),

        'start_date' => array(
            'title' => 'Start Date',
            'type' => 'date'
        ),

        'end_date' => array(
            'title' => 'End Date',
            'type' => 'date'
        ),

        'type' => array(
            'title' => 'Type',
            'type' => 'text'
        ),

        // 'paid' => array(
        //     'title' => 'Paid',
        //     'type' => 'number'
        // ),
    ),
);
    
?>
