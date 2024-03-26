<?php

require_once '../config/connect.php';

$name = $_POST['name'];
$description = $_POST['description'];
mysqli_query($connect, "INSERT INTO `tasks` (`id`, `name`, `description`) VALUES (NULL, '$name', '$description')");
//var_dump($_POST);
header('Location: /');
