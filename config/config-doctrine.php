<?php

return [
    'paths' => [
        '/src'
    ],
    'driver'   => getenv('DOCTRINE_DRIVER'),
    'user'     => getenv('DOCTRINE_USER'),
    'password' => getenv('DOCTRINE_PWD'),
    'dbname'   => getenv('DOCTRINE_DBNAME'),
];