<?php

$greeting = 'Hello from variable';

$names = [
    'dave',
    'jon',
    'ben'
];

$person = [
    'age' => 30,
    'name' => 'Dave',
    'eyes' => 2
];

$person['job'] = 'racer';
$names[] = 'jerry';

// var_dump($person);
// die(var_dump($person));

require 'index.view.php';