<?php
/** @var Db $db */

if($_SERVER['REQUEST_METHOD'] === 'POST') {

    $fillable = ['title', 'content', 'excerpt'];
    $data = load($fillable);

    // validation

    $errors = [];
    if (empty($data['title'])) {
        $errors['title'] = 'Title is required';
    }
    if (empty($data['content'])) {
        $errors['content'] = 'content is required';
    }
    if (empty($data['excerpt'])) {
        $errors['excerpt'] = 'excerpt is required';
    }

    if (empty($errors)) {
        if($db->query("INSERT INTO posts (`title`, `content`, `excerpt`) VALUES (:title, :content, :excerpt)", $data)) {
            echo 'Ok';
        } else {
            echo 'DB Error';
        }

//        redirect('/posts/create');
    }
}

$title = "My Blog :: New post";

require VIEWS . '/post-create.tpl.php';