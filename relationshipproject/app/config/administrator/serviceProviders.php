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
    'single' => 'Service Provider',

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

        'id' => array('title' => 'ID'),
        'type' => array('title' =>'Service Type'),
        'acn' => array('title' => 'ACN'),
        'abn' => array('title' => 'ABN'),
        'companyName' => array('title' => 'Company Name'),
        'first_name' => array('title' => 'First Name'),
        'last_name' => array('title' => 'Last Name'),
        'email' => array('title'=>'Email'),
        'price' => array( 'title' => 'Price'),
        'verified' => array('title'=>'Verified'),
    ),

    /**
     * The edit fields array
     *
     * @type array
     */
    'edit_fields' => array(
        //'id' => array('title' => 'ID',),
        'identity' => array('title'=>'Identity', 'type'=>'bool'),
        'type' => array('title' =>'Service Type','type' => 'text'),
        'acn' => array('title' => 'ACN','type' => 'text'),
        'abn' => array('title' => 'ABN','type' => 'text'),
        // address
        'unit' => array('title' => 'Unit','type' => 'text'),
        'street_number'=>array('title'=> 'Street Number','type' => 'text'),
        'street_name'=>array('title'=> 'Street Name','type' => 'text'),
        'street_type'=>array('title'=> 'Street Type','type' => 'text'),
        'suburb'=>array('title'=> 'Suburb','type' => 'text'),
        'state'=>array('title'=> 'State','type' => 'text'),
        'postcode' => array('title' => 'Postcode','type' => 'number'),
        'phone' =>array('title' => 'Phone','type' => 'number'),
        'mobile' => array('title'=>'Mobile','type' => 'number'),
        'mode' => array('title'=>'Mode','type' => 'number'),
        'companyName' => array('title' => 'Company Name','type' => 'text'),
        'first_name' => array('title' => 'First Name','type' => 'text'),
        'last_name' => array('title' => 'Last Name','type' => 'text'),
        'email' => array('title'=>'Email','type' => 'text'),
        // 'price' => array( 
				    //     	'title' => 'Price(AU$)',
				    //     	'type' => 'number',
				    //     	'decimals' => 2,'thousands_separator' => ',',
        //     				'decimal_separator' => '.'),
        'verified' => array('title'=>'Verified','type' => 'bool'),
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
