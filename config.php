<?php

return [
    'database' => [
        'name' => 'mytodo',
        'username' => 'adam',
        'password' => 'admin',
        'connection' => 'mysql:host=localhost',
        'options' => [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]
    ]
];