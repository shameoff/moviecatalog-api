<?php

use core\router\Router;

ini_set('display_errors', 1);
require_once 'config.php';
require_once 'application/autoloadClasses.php';

$request = new core\Http\Request();
$response = new core\Http\Response();

$router = new Router($request->getURI(), $request->getMethod());
//$router = new Router("/api/account/profile", "GET");

require 'application/routes/api-routes.php';

$router->run();

//$response->sendResponse();