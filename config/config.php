<?php
define("ROOT", dirname(__DIR__, 1));
define("WWW", ROOT . '/public');
define("CORE", ROOT . '/core');
define("CONFIG", ROOT . '/config');
define("APP", ROOT . '/app');
define("CONTROLLERS", APP . '/controllers');
define("VIEWS", APP . '/views');
define("PATH", "http://" . $_SERVER['HTTP_HOST']);
define("ERRORS_LOG_FILE", ROOT . '/errors.log');