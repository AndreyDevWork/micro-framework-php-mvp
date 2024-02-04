<?php

$db = db();
/** @var \Core\Db $db */

$content = '
  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus aliquid consequuntur delectus deserunt, distinctio, dolorum eligendi et explicabo facilis fugit iste magni nam, nobis non odio recusandae saepe tempore veniam.</p>
  
  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus aliquid consequuntur delectus deserunt, distinctio, dolorum eligendi et explicabo facilis fugit iste magni nam, nobis non odio recusandae saepe tempore veniam.</p>
  
  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus aliquid consequuntur delectus deserunt, distinctio, dolorum eligendi et explicabo facilis fugit iste magni nam, nobis non odio recusandae saepe tempore veniam.</p>';



$recentPosts = $db->query("SELECT * FROM posts ORDER BY id DESC LIMIT 3")->findAll();

$title = 'My Blog | About';
require VIEWS . '/about.tpl.php';
