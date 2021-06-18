<?php

// require bootstrap.php ??

// Use the query to select the data and save to a variable 
$tasks = $query->fetchAll('todos', 'Task');
// dd($tasks);


require 'views/index.view.php';