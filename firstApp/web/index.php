<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Config\Router;
use Silex\Application;

$connector = new \App\Config\MySQLConnector();
$app = new Application();
$router = new Router($app, $connector);

$app->mount('/', $router->home());

header('Content-Type:application/json');

$app->run();
