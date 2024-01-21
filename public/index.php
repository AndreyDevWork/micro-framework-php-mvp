<?php
use Core\Db;

session_start();

require_once '../vendor/autoload.php';
require dirname(__DIR__) . '/config/config.php';

$db_config = require CONFIG . '/db.php';
$db = Db::getInstance()->getConnection($db_config);




$router = new \Core\Router();
require CONFIG . '/routes.php';
$router->match();




