<?php

return [
    'isDevMode' => false,
    'paths'     => [
        dirname(__DIR__, 3)
    ],
    'dbParams' => [
        'driver'    => 'pdo_mysql',
        'user'      => 'car-rental-ca',
        'password'  => 'car-rental-ca',
        'dbname'    => 'car-rental-ca',
        'host'      => '172.24.0.2'
    ]
];
