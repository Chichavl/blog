<?php
/**
 * список постов
 * удаление постов
 */

require('../.config.php');
require('../DB.php');
require('../Post.php');

$_GET['page'] = ($_GET['page'] <= 0 ? 1 : $_GET['page']);
$page = ($_GET['page'] - 1) * $GLOBALS['config']['post']['per_page'];

$post = new Post;
$posts = $post->GetList('*', '', 'id DESC', $GLOBALS['config']['post']['per_page'], $page);


// удалить посты
if(isset($_POST['save']) && isset($_POST['delete']))
{
  $postDelete = new Post($_POST['delete']);
  $result = $postDelete->Delete();

  if(!$result)
    $message = '<div class="error">Пост не удален</div>';
  else
    $message = '<div class="ok">Пост удален</div>';
}


?><!doctype html>
<html lang="ru-RU">
<head>
  <meta charset="UTF-8">
  <title>Редактирование поста</title>
  <link rel="stylesheet" href="/includes/admin.css" />
</head>
<body>
<header>
  <nav><a href="/admin/">Главная страница</a><a href="post_edit.php">Создать пост</a></nav>
</header>

<section>
  <?= $message; ?>
  <form action="" method="post">
    <input type="hidden" name="save" value="1" />

    <table>
      <thead>
      <tr>
        <th>#</th>
        <th>Название</th>
        <th>Дата</th>
        <th><label>Удалить <input type="checkbox" id="deleteAll" value="" /></label></th>
      </tr>
      </thead>
      <?php
      foreach($posts as $post)
      {
        ?>
        <tr>
          <td><?= $post->params['id']; ?></td>
          <td><a href="post_edit.php?id=<?= $post->params['id']; ?>"><?= $post->params['name']; ?></a></td>
          <td><?= $post->params['date']; ?></td>
          <td><input type="checkbox" name="delete" value="<?= $post->params['id']; ?>" /></td>
        </tr>
      <?
      }
      ?>
      <tr>
        <td></td>
        <td></td>
        <td></td>
        <td>
          <button type="submit">Удалить</button>
        </td>
      </tr>
    </table>
  </form>
</section>

<footer>&copy; <a href="http://cetera.ru">Cetera labs</a> 2013</footer>
<script type="text/javascript" src="http://yandex.st/jquery/2.0.3/jquery.min.js"></script>
<script type="text/javascript" src="/includes/admin.js"></script>
</body>
</html>

