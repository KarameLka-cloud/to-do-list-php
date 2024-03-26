<?php
include 'config/connect.php';
?>

<!doctype html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <link rel="stylesheet" href="style/normalize.css">
  <title>Document</title>
  <style>
      * {
          font-family: sans-serif;
          text-decoration: none;
          box-sizing: border-box;
      }

      button {
          cursor: pointer;
      }

      .body {
          width: 900px;
          margin: 0 auto;
          padding: 20px 0;
      }

      .create-task {
          margin-bottom: 10px;
      }

      .input {
          width: 100%;
      }

      .input-name {
          padding: 10px;
          margin-bottom: 10px;
      }

      .input-description {
          padding: 10px;
          margin-bottom: 10px;
          resize: none;
          height: 100px;
      }

      .btn-create {
          background-color: #1f72a9;
          color: #fff;
          padding: 8px;
          border: none;
      }

      .list-item {
          background-color: #76af80;
          padding: 20px;
          border-radius: 10px;
      }

      .list-item:not(:last-child) {
          margin-bottom: 10px;
      }

      .item-name {
          margin-top: 0;
          color: white;
      }

      .item-description {
          color: white;
      }

      .btn-item {
          display: inline-block;
          padding: 8px;
          color: white;
      }

      .btn-change {
          background-color: #036280;
      }

      .btn-delete {
          background-color: #AA1803;
      }
  </style>
</head>
<body class="body">
<div class="create-task">
  <div class="">
    <form action="vendor/create.php" method="post">
      <input class="input input-name" type="text" name="name" placeholder="Название задачи">
      <textarea class="input input-description" name="description" placeholder="Описание задачи"></textarea>
      <button class="btn-create" type="submit">Создать задачу</button>
    </form>
  </div>
</div>

<hr>

<div class="list">
  <?php
  $query = mysqli_query($connect, 'SELECT * FROM tasks');
  for ($data = []; $res = mysqli_fetch_assoc($query); $data[] = $res) ;
  foreach ($data as $task) { ?>
    <div class="list-item item">
      <h2 class="item-name"><?= $task['name'] ?></h2>
      <p class="item-description"><?= $task['description'] ?></p>
      <a class="btn-item btn-change" href="update.php?id=<?= $task['id'] ?>">Изменить</a>
      <a class="btn-item btn-delete" href="vendor/delete.php?id=<?= $task['id'] ?>">Удалить</a>
    </div>
  <?php } ?>
  <?php if (empty($data)) { ?>
    <p style="text-align: center;">Список пуст. Создайте задачу :)</p>
  <?php } ?>
</div>
</body>
</html>
