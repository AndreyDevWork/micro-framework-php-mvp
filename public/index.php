<?php
define("ROOT", dirname(__DIR__, 1));
define("PUBLIC", ROOT . '/public');
define("CORE", ROOT . '/core');
define("APP", ROOT . '/app');
define("CONTROLLERS", APP . '/controllers');
define("VIEWS", APP . '/views');
define("PATH", "http://" . $_SERVER['HTTP_HOST']);

require CORE . '/funcs.php';

$uri = trim(parse_url($_SERVER['REQUEST_URI'])['path'], '/');

if ($uri === '') {
    require CONTROLLERS . '/index.php';
} elseif ($uri == 'about') {
    require CONTROLLERS . '/about.php';
} else {
    abort();
}

