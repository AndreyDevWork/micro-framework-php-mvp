<?php

use Core\Db;
use Core\Validator;

/** @var Db $db */

$db = db();

$data = load(['email', 'password']);
$validator = new Validator();
$validation = $validator->validate($data, [
    'email' => [
        'required' => true,
    ],
    'password' => [
        'required' => true,
    ],
]);


if (!$validation->hasErrors()) {
    if (!$user = $db->query('SELECT * FROM users WHERE email = ?', [$data['email']])->find()) {
        $_SESSION['error'] = 'Wrong email or password';
        redirect();
    }

    if (!password_verify($data['password'], $user['password'])) {
        $_SESSION['error'] = 'Wrong email or password';
        redirect();
    }

    $_SESSION['success'] = 'Successful login';

    foreach ($user as $key => $value) {
        if ($key != 'password') {
            $_SESSION['auth'][$key] = $value;
        }
    }

    redirect('/');
}

require VIEWS . '/users/login.tpl.php';
