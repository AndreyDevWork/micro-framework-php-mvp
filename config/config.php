<?php

const ROOT = __DIR__ . '/..';
const WWW = ROOT . '/public';
const CORE = ROOT . '/core';
const CONFIG = ROOT . '/config';
const APP = ROOT . '/app';
const CONTROLLERS = APP . '/controllers';
const VIEWS = APP . '/views';
define('PATH', 'http://' . $_SERVER['HTTP_HOST']);
const ERRORS_LOG_FILE = ROOT . '/errors.log';
