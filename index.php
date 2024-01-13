<?php

$posts = [
  1 => [
    'title' => 'Title1',
    'desc' => '1Some quick example text to build on the card title and make up the bulk of the card',
    'slug' => 'title-1',
  ],
  2 => [
      'title' => 'Title2',
      'desc' => '2Some quick example text to build on the card title and make up the bulk of the card',
      'slug' => 'title-2',
  ],
  3 => [
      'title' => 'Ti3',
      'desc' => '3Some quick example text to build on the card title and make up the bulk of the card',
      'slug' => 'title-3',
  ],
  4 => [
      'title' => 'Title4',
      'desc' => '4Some quick example text to build on the card title and make up the bulk of the card',
      'slug' => 'title-4',
  ],
];



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

require 'app/views/index.tpl.php';