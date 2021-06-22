<?php

// print_r($_SERVER['SERVER_NAME']);
// print_r($_POST['name']);

App::get('database')->insert('users', [
    'name' => $_POST['name']
]);

header('Location: /');