<?php

use Core\Db;

$db = db();
/** @var Db $db */
$slug = routeParam('slug');


$post = $db->query('SELECT * FROM posts WHERE slug = :slug', [':slug' => $slug])->findOrFail();


$title = "My Blog :: {$post['title']}";
require VIEWS . '/posts/show.tpl.php';
