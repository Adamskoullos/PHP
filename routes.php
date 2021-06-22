<?php

// This file is the router 

// $router->define([

//     '' => 'controllers/index.php',
//     'about' => 'controllers/about.php',
//     'contact' => 'controllers/contact.php',
//     'names' => 'controllers/add-name.php'

// ]);

$router->get('','PagesController@home');
$router->get('about','PagesController@about');
$router->get('contact','PagesController@contact');
// $router->post('names','controllers/add-name.php');