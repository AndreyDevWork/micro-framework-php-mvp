<?php
global $db;
/** @var Db $db */


$id = $_GET['id'] ?? 0;
$post = $db->query("SELECT * FROM posts WHERE id = :id", [':id' => $id])->findOrFail();


$title = "My Blog :: {$post["title"]}";
require VIEWS . '/posts/show.tpl.php';