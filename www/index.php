<?php
/**
 * список постов
 */

require('./.config.php');
require('./DB.php');
require('./Post.php');

$_GET['page'] = ($_GET['page'] <= 0 ? 1 : $_GET['page']);
$page = ($_GET['page'] - 1) * $GLOBALS['config']['post']['per_page'];

$post = new Post;
$posts = $post->GetList('*', '', 'id DESC', $GLOBALS['config']['post']['per_page'], $page);


?><!doctype html>
<html lang="ru-RU">
<head>
  <meta charset="UTF-8">
  <title>Блог гениального автора</title>
  <link rel="stylesheet" href="/includes/style.css" />
</head>
<body>
<header>
  <h1>Блог гениального автора</h1>
</header>

<section>
  <article>
    <?php
    foreach($posts as $post)
    {
      ?>
      <div>
        <h2><a href="detail.php?id=<?= $post->params['id']; ?>"><?= $post->params['name']; ?></a></h2>
        <time><?= $post->params['date']; ?></time>
      </div>
    <?
    }
    ?>
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

