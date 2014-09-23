<?php

return array(

    'fetch'                 => PDO::FETCH_CLASS,

    'default'               => 'mysql',

    'connections'           => array(

        'mysql'             => array(
            'driver'            => 'mysql',
            'host'              => 'localhost',
            'database'          => 'ixd_YourAppName_test',
            'username'          => 'YourAppNameuser_test',
            'password'          => 'YourAppNamepwd_test',
            'charset'           => 'utf8',
            'collation'         => 'utf8_unicode_ci',
            'prefix'            => '',
        ),

    ),

    'migrations'            => 'migrations',

);
