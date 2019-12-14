<?php
session_start();

$conn = mysqli_connect(
  'localhost',
  'root',
  '',
  'php_login_database'
) or die(mysqli_error($mysqli));

?>
