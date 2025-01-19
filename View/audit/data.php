<?php
require_once './../../assets/db/connectionMysql.php';
$json = file_get_contents('php://input');
$data = json_decode($json, true);

$start = $_GET['start'];
$end = $_GET['end'];

$startF = date('Y-m-d 00:00:00', strtotime($start));
$endF = date('Y-m-d 00:00:00', strtotime($end));

$sql;

if (isset($_GET['now'])) {
  $end = date('Y-m-d 23:59:59', strtotime($_GET['start']));
  $sql = "SELECT table_name,userID,rol,action,date FROM audit WHERE date BETWEEN '$startF' AND '$endF' ORDER BY date DESC";

} else {
  $sql = "SELECT table_name,userID,rol,action,date FROM audit WHERE date BETWEEN '$startF' AND '$endF' ORDER BY date DESC";
}

//- AUDIT
$results = mysqli_query($conn, $sql);
$response = array();

foreach ($results as $key => $row) {
  $response[] = array(
    'number' => $key + 1,
    'table_name' => $row['table_name'],
    'userID' => $row['userID'],
    'rol' => $row['rol'],
    'action' => $row['action'],
    'date' => date('d/m/Y', strtotime($row['date'])),
  );
}

echo json_encode($response);