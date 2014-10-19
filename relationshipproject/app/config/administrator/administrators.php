<?php

return array(

    /**
     ** Model title
     **
     ** @type string
     **/

    'title' => 'Administrators',

    /**
     ** The singular name of your model
     **
     ** @type string
     **/
    'single' => 'Administrator',

    /**
     ** The class name of the Eloquent model that this config represents
     **
     ** @type string
     **/
    'model' => 'Administrator',

    /**
     * The columns array
     *
     * @type array
     */
    'columns' => array(

        'id' => array('title' => 'ID'),
        'type' => array('title' =>'Type'),
        'first_name' => array('title' => 'First Name'),
        'last_name' => array('title' => 'Last Name'),
        'email' => array('title'=>'email'),
    ),

    /**
     * The edit fields array
     *
     * @type array
     */
    'edit_fields' => array(
       
        'type' => array('title' =>'Service Type','type' => 'text'),
        'first_name' => array('title' => 'First Name','type' => 'text'),
        'last_name' => array('title' => 'Last Name','type' => 'text'),
        'email' => array('title'=>'email','type' => 'text'),
    ),
);


?>
