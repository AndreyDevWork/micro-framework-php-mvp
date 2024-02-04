<?php

/** @var Db $db */

use Core\Db;
use Core\Pagination;

$title = 'My Blog | Home';
$db = db();

$page = $_GET['page'] ?? 1;
$perPage = 3;
$total = $db->query('SELECT COUNT(*) FROM posts')->getColumn();
$pagination = new Pagination((int) $page, $perPage, $total);

$start = $pagination->getStart();

$posts = $db->query("SELECT * FROM posts ORDER BY id DESC LIMIT $start, $perPage")->findAll();
$recentPosts = $db->query("SELECT * FROM posts ORDER BY id DESC LIMIT 3")->findAll();

require VIEWS . '/posts/index.tpl.php';
