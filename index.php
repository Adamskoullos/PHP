<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

$query = require 'core/database/bootstrap.php';

$router =new Router;

require 'routes.php';

$uri = trim($_SERVER['REQUEST_URI'], '/');

require $router->direct($uri);