<?php

session_start();

require_once '../vendor/autoload.php';
require dirname(__DIR__) . '/config/config.php';
require_once __DIR__ . '/bootstrap.php';

$router = new \Core\Router();
require CONFIG . '/routes.php';
$router->match();
