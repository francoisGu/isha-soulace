<?php

return array(

    /**
     ** Model title
     **
     ** @type string
     **/

    'title' => 'Users',

    /**
     ** The singular name of your model
     **
     ** @type string
     **/
    'single' => 'User',

    /**
     ** The class name of the Eloquent model that this config represents
     **
     ** @type string
     **/
    'model' => 'User',

    /**
     * The columns array
     *
     * @type array
     */
    'columns' => array(

        'id' => array('title' => 'ID'), 
        'email' => array('title' => 'Email'),
        'last_login' => array('title' => 'Last Login'),
        'first_name' => array('title' => 'First Name',),
        'last_name' => array('title' => 'Last Name',),
        'userable_type' => array('title' => 'User Type'),
    ),

    /**
     * The edit fields array
     *
     * @type array
     */
    'edit_fields' => array(
        'email' => array('title' => 'Email','type'  => 'text'),
        'first_name' => array('title' => 'First Name','type'  => 'text'),
        'last_name' => array('title' => 'Last Name','type'  => 'text'),
    ),

);

?>
