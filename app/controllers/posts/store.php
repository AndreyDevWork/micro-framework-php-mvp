<?php
$db = db();
/** @var \Core\Db $db */

use Core\Validator;

$fillable = ['title', 'content', 'excerpt'];
$data = load($fillable);

// validation
$validator = new Validator();
$validation = $validator->validate($data, [
    'title' => [
        'required' => true,
        'min' => 5,
        'max' => 190,
    ],
    'excerpt' => [
        'required' => true,
        'min' => 10,
        'max' => 190,
    ],
    'content' => [
        'required' => true,
        'min' => 100,
    ],
]);

if (!$validation->hasErrors()) {
    if ($db->query("INSERT INTO posts (`title`, `content`, `excerpt`) VALUES (:title, :content, :excerpt)", $data)) {
        $_SESSION['success'] = "Ok";
    } else {
        $_SESSION['error'] = 'DB Error';
    }
    redirect('/');
} else {
    require VIEWS . '/posts/create.tpl.php';
}
