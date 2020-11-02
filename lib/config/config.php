<?php
//configurations array

return $config =[
    'mode' => 'development', //development and production
    'default_controller' => 'login',
    'page_title' => '',


    /**
     * Database settings. N.B. Only PDO settings
     */
    //mysql config params
    'db' => [
        'host'=> 'localhost',
        'port' => '', // leave blank for default :3306
        'username' => 'root',
        'password'=> '',
        'database' => 'piqast',
        
        //auto connect to db
        'db_auto' => true,
        'persist' => true,
        'options' => [
            'development' => [PDO::ATTR_ERRMODE=> PDO::ERRMODE_WARNING, PDO::ATTR_PERSISTENT => true ],
            'production' => [PDO::ATTR_PERSISTENT => true],
            'test' => []
        ]
    ],

    'auto_load' => [
        'enable' => true,
        'classes' => [
           'Inflect',
           //'fluentpdo/FluentPDO/FluentPDO', //fluentpdo
           
        ],
        'libs' => [
            'hashfunctions'
        ]
    ],

    //Base classes for system that extend your class of choice.
    'child_classes'=>[
        'enable' => true,
        'auto_parent' => true, // automatic load of parent
        'classes' => [
           [
            'FluentModel' => 'fluentpdo/FluentPDO/FluentPDO'  //fluentpdo child
            ], 
        ]
        
    ],


        'encryption'=>[
            'enable' => false, //sets crypt function to be used in encrypt function
            'salt' => ""
        ]

];