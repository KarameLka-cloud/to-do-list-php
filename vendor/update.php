<?php

require_once '../config/connect.php';

$id = $_POST['id'];
$name = $_POST['name'];
$description = $_POST['description'];

mysqli_query($connect, "UPDATE `tasks` SET `name` = '$name', `description` = '$description' WHERE `tasks`.`id` = '$id'");

header('Location: /');
