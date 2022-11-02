<?php

use core\router\Router;

ini_set('display_errors', 1);
require_once 'config.php';
require_once 'application/autoloadClasses.php';


$router = new Router($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
//$router = new Router("/api/account/login", "POST");
require 'application/routes/api-routes.php';
$router->run();