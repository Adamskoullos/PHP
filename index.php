<?php

require 'functions.php';

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

$devStack = [
    'stackName' => 'Lamp',
    'front-end' => 'Vue',
    'back-end' => 'Laravel',
    'specialty' => 'JavaScript',
    'cloud' => 'aws',
    'team' => 4,
    'boolean' => true
];

$person['job'] = 'racer';
$names[] = 'jerry';

$result = ageChecker(10);

// var_dump($person);
// die(var_dump($person));

require 'index.view.php';