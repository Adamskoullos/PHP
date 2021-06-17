<?php

require 'db.php';
require 'functions.php';
require 'classes.php';

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

$tasks = [
new Task('Go to the banana shop'),
new Task('Buy some bananas'),
new Task('Eat some bananas'),
new Task('Throw the banana skin')
];

$tasks[2]->toggleComplete();


// var_dump($person);
// die(var_dump($person));
require 'index.view.php';