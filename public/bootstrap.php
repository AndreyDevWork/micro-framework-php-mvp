<?php
use \Core\Db;
use \Core\App;

$container = new \Core\ServiceContainer();

$container->setService(Db::class, function () {
    $db_config = require CONFIG . '/db.php';
    return Db::getInstance()->getConnection($db_config);
});

App::setContainer($container);