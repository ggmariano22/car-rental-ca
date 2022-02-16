<?php

return [
    'isDevMode' => getenv('APP_ENV') === 'development' ? true : false,
    'paths'     => [
        dirname(__DIR__, 3)
    ],
    'dbParams' => [
        'driver'    => getenv('DOCTRINE_DRIVER'),
        'user'      => getenv('DOCTRINE_USER'),
        'password'  => getenv('DOCTRINE_PWD'),
        'dbname'    => getenv('DOCTRINE_DBNAME'),
        'host'      => getenv('DOCTRINE_HOST')
    ]
];
