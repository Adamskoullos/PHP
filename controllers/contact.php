<?php

// Code to run to fetch any data ready for view

$tasks = $app['database']->fetchAll('todos', 'Task');



require 'views/contact.view.php';