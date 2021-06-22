<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

Require 'vendor/autoload.php';

require 'core/database/bootstrap.php';

// require 'core/Request.php';


Router::load('routes.php')->direct(Request::uri(), Request::method());