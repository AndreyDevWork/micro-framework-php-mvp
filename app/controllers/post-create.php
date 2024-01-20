<?php
use Core\Validator;

/** @var \Core\Db $db */

if($_SERVER['REQUEST_METHOD'] === 'POST') {

    $fillable = ['title', 'content', 'excerpt'];
    $data = load($fillable);

    // validation
    $validator = new Validator();
    $validation = $validator->validate($data,[
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
        if($db->query("INSERT INTO posts (`title`, `content`, `excerpt`) VALUES (:title, :content, :excerpt)", $data)) {
            $_SESSION['success'] = "Ok";
        } else {
            $_SESSION['error'] = 'DB Error';
        }
//        redirect();
    }
}

$title = "My Blog :: New post";

require VIEWS . '/post-create.tpl.php';