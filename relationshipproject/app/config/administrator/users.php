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
    'single' => 'user',

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

        'id' => array(
            'title' => 'ID',


        ),

        'email' => array(
            'title' => 'Email',

        ),

        /*'permissions' => array(*/
            //'title' => 'Permissions',
        //),

        'activated' => array(
            'title' => 'Activated?',

        ),

        'activation_code' => array(
            'title' => 'Activation Code',

        ),

        'activated_at' => array(
            'title' => 'Activated At',

        ),

        'last_login' => array(
            'title' => 'Last Login',

        ),

        'reset_password_code' => array(
            'title' => 'Reset Password Code',

        ),

        'first_name' => array(
            'title' => 'First Name',

        ),

        'last_name' => array(
            'title' => 'Last Name',

        ),

        'userable_id' => array(
            'title' => 'userable_id',

        ),

        'userable_type' => array(
            'title' => 'userable_type',

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

            'type'  => 'number'
        ),

        'email' => array(
            'title' => 'Email',
            'type'  => 'text'
        ),

        //'permissions' => array(
            //'title' => 'Permissions',

            //'type'  => 'text'
        //),

        'activated' => array(
            'title' => 'Activated?',
            'type'  => 'bool'
        ),

        'activation_code' => array(
            'title' => 'Activation Code',
            'type'  => 'text'
        ),

        'activated_at' => array(
            'title' => 'Activated At',
            'type'  => 'datetime'
        ),

        'last_login' => array(
            'title' => 'Last Login',
            'type'  => 'datetime'
        ),

        'reset_password_code' => array(
            'title' => 'Reset Password Code',
            'type'  => 'text'
        ),

        'first_name' => array(
            'title' => 'First Name',
            'type'  => 'text'
        ),

        'last_name' => array(
            'title' => 'Last Name',
            'type'  => 'text'
        ),

        //'userable_id' => array(
            //'title' => 'userable_id',
            //'type'  => 'number'
        //),

        'userable_type' => array(
            'title' => 'userable_type',
            'type'  => 'text'
        ),
    ),

);

?>
