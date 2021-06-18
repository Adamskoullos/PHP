<?php

// Code to run to fetch any data ready for view

$tasks = $query->fetchAll('todos', 'Task');



require 'views/contact.view.php';