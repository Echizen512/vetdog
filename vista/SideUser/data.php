<?php
require_once './../../assets/db/connectionMysql.php';
$json = file_get_contents('php://input');
$data = json_decode($json, true);

$ownerID = $_GET['ownerID'];

$sql = "SELECT id_pet FROM pet WHERE id_due = '$ownerID'";

$results = mysqli_query($conn,$sql);
$pet1 = mysqli_num_rows($results);

$sql2 = "SELECT quotesID FROM quotes WHERE ownerID = '$ownerID' AND status = true";

$results = mysqli_query($conn,$sql2);
$pet2 = mysqli_num_rows($results);

$response = array(
  'pet1' => $pet1,
  'pet2' => $pet2,
);

header('Content-Type: application/json');
echo json_encode($response);