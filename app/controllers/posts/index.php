<?php
/** @var \Core\Db $db */
$title = 'My Blog | Home';
$db = db();

$posts = $db->query("SELECT * FROM posts ORDER BY id DESC")->findAll();
$recentPosts = $db->query("SELECT * FROM posts ORDER BY id DESC LIMIT 3")->findAll();

require VIEWS . '/posts/index.tpl.php';