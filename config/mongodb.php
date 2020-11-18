<?php

return [
    'driver'   => 'mongodb',
    'host'     => env('MONGODB_HOST', '127.0.0.1'),
    'port'     => env('MONGODB_PORT', '27017'),
    'database' => env('MONGODB_DATABASE', 'forge'),
    'username' => env('MONGODB_USERNAME', ''),
    'password' => env('MONGODB_PASSWORD', ''),
    'options'  => [
        'database' => env('MONGODB_AUTHENTICATION_DATABASE', 'admin'),
    ]
];