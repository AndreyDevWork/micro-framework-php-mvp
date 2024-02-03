<?php

/** @var Router $router */

use Core\Middleware\AuthMiddleware;
use Core\Middleware\GuestMiddleware;
use Core\Router;

const MIDDLEWARE = [
    'auth' => AuthMiddleware::class,
    'guest' => GuestMiddleware::class
];

// Posts
$router->get('', 'posts/index.php');
$router->get('posts', 'posts/show.php');
$router->get('posts/create', 'posts/create.php')->only('auth');
$router->post('posts', 'posts/store.php');
$router->delete('posts', 'posts/destroy.php');

// Pages
$router->get('about', 'about.php');

// User
$router->get('register', 'users/register.php')->only('guest');
$router->post('register', 'users/store.php')->only('guest');
$router->get('login', 'users/login.php')->only('guest');
$router->get('logout', 'users/logout.php');

