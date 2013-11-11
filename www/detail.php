<?php
/**
 * пост подробно
 */

require('./.config.php');
require('./DB.php');
require('./Post.php');


$post = new Post($_GET['id']);


?><!doctype html>
<html lang="ru-RU">
<head>
  <meta charset="UTF-8">
  <title><?=$post->params['name'];?></title>
  <link rel="stylesheet" href="/includes/admin.css" />
</head>
<body>
<header>
  <h1><?=$post->params['name'];?></h1>
</header>

<section>
  <article>
    <?= $post->params['message']; ?>
  </article>
  <aside>
    <nav>
      <ul>
        <li><a href="/">Последние посты</a></li>
      </ul>
    </nav>
  </aside>
</section>

<footer>&copy; <a href="http://cetera.ru">Cetera labs</a> 2013</footer>
</body>
</html>

