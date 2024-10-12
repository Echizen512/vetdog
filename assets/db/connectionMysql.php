<?php
  $dbHost = "localhost";
  $dbDatabase = "vetdog";
  $dbPasswrod = "";
  $dbUser = "root";

  $conn = mysqli_connect($dbHost, $dbUser, $dbPasswrod, $dbDatabase);

  if ($conn->connect_error) die("Conexión falló: " . $conn->connect_error);
?>
