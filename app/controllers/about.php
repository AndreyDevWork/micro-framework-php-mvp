<?php

$title = 'About';
$content = '
  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus aliquid consequuntur delectus deserunt, distinctio, dolorum eligendi et explicabo facilis fugit iste magni nam, nobis non odio recusandae saepe tempore veniam.</p>
  
  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus aliquid consequuntur delectus deserunt, distinctio, dolorum eligendi et explicabo facilis fugit iste magni nam, nobis non odio recusandae saepe tempore veniam.</p>
  
  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus aliquid consequuntur delectus deserunt, distinctio, dolorum eligendi et explicabo facilis fugit iste magni nam, nobis non odio recusandae saepe tempore veniam.</p>';


$recentPosts = [
    1 => [
        'title' => 'Ti tl e4',
        'slug' => lcfirst(str_replace(' ', '-', 'Ti tl e4')),
    ],
    2 => [
        'title' => 'Ti tle 5',
        'slug' => lcfirst(str_replace(' ', '-', 'Ti tl e5')),
    ]
];

require VIEWS . '/about.tpl.php';