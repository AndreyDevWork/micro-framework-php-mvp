<?php
$posts = $db->query("SELECT * FROM posts ORDER BY id DESC")->fetchAll();
$recentPosts = $db->query("SELECT * FROM posts ORDER BY id DESC LIMIT 3")->fetchAll();

require VIEWS . '/index.tpl.php';