<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$query = require 'database/bootstrap.php';

// Use the query to select the data and save to a variable 
$tasks = $query->fetchAll('todos', 'Task');
// dd($tasks);


require 'index.view.php';