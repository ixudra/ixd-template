<?php


    return array(

        'driver'            => 'smtp',

        'host'              => 'smtp.mandrillapp.com',

        'port'              => 587,

        'username'          => 'jan.oris@ixudra.be',

        'password'          => 'YourApiKey',

        'from'              => array( 'address' => '', 'name' => '' ),

        'encryption'        => 'tls',

        'sendmail'          => '/usr/sbin/sendmail -bs',

        'pretend'           => false,

    );
