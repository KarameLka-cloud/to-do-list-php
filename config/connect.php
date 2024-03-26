<?php

$connect = mysqli_connect('localhost', 'root', '', 'to_do_list');

if (!$connect) {
  die("Error connect to database!");
}
