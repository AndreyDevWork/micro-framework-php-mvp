<?php
/** @var Db $db */

$posts = $db->query("SELECT * FROM posts ORDER BY id DESC")->findAll();

$recentPosts = $db->query("SELECT * FROM posts ORDER BY id DESC LIMIT 3")->findAll();

$title = 'My Blog | Home';
require VIEWS . '/index.tpl.php';