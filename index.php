<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

$query = require 'core/database/bootstrap.php';

require 'core/Request.php';

$uri = Request::uri();

// 1. Load the routes
$router = Router::load('routes.php');

// 2. Require `routes.php`

// 3. Direct to the relevant controller 
// require $router->direct($uri);
require $router->direct(Request::uri(), Request::method());