<?php
session_start();
if (!isset($_SESSION['ownerID'])) header('location: ./../login.php');
require_once './../../../assets/db/connectionMysql.php';

$id_due = $_SESSION['ownerID'];

$conexion = mysqli_connect("localhost","root","","vetdog");
$query = $conexion->query("SELECT * FROM owner WHERE id_due = $id_due");

while ($row = $query->fetch_assoc())
?>
