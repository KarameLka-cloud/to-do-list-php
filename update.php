<?php
include 'config/connect.php';

$task_id = $_GET['id'];
$task = mysqli_query($connect, "SELECT * FROM tasks WHERE id=$task_id");
$task = mysqli_fetch_assoc($task);
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
  </style>
</head>
<body class="body">
<div class="create-task">
  <div class="">
    <form action="vendor/update.php" method="post">
      <input type="hidden" name="id" value="<?= $task_id ?>">
      <input class="input input-name" type="text" name="name" placeholder="Название задачи"
             value="<?= $task['name'] ?>">
      <textarea class="input input-description" name="description"
                placeholder="Описание задачи"><?= $task['description'] ?></textarea>
      <button class="btn-create" type="submit">Сохранить изменения</button>
    </form>
  </div>
</div>
</body>
</html>
