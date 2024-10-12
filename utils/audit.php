<?php
$dbHost = "localhost";
$dbDatabase = "vetdog";
$dbPasswrod = "";
$dbUser = "root";

$conn = mysqli_connect($dbHost, $dbUser, $dbPasswrod, $dbDatabase);
if ($conn->connect_error) die("Conexión falló: " . $conn->connect_error);

$GLOBALS['connection'] = $conn;

function audit($tableID, $nameTable ,$userID, $rol, $action): bool {
  $now = date('Y-m-d H:i:s');
  $sql = "INSERT INTO audit(tableID,table_name,userID,rol,action,date) VALUES('$tableID','$nameTable','$userID','$rol','$action','$now')";

  if (mysqli_query($GLOBALS['connection'], $sql)) return true;
  else return false;
}
