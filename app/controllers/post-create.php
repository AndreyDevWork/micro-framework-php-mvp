<?php
use Core\Validator;

/** @var Db $db */

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

    if ($validation->hasErrors()) {
        print_arr($validation->getErrors());
    } else {
        if($db->query("INSERT INTO posts (`title`, `content`, `excerpt`) VALUES (:title, :content, :excerpt)", $data)) {
            redirect('/');

        } else {
            echo 'DB Error';
        }
    }
}

$title = "My Blog :: New post";

require VIEWS . '/post-create.tpl.php';