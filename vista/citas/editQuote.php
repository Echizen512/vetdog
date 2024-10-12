<?php
session_start();
require_once './../../assets/db/connectionMysql.php';
require_once './../../utils/audit.php';


//* update quote
if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
  $json = file_get_contents('php://input');
  $data = json_decode($json, true);
  header('Content-Type: application/json');

  $quotesID = $_GET['quotesID'];

  $sql = "SELECT COUNT(*) as totalPets FROM quotes_pets WHERE quotesID = '$quotesID'";
  $results = mysqli_query($conn,$sql);

  foreach($results as $row) {
    $numberPets = $row['totalPets'];
  } 

  if(empty($data['data']['id_vet']) || empty($data['data']['attended']) || empty($data['data']['cost']) || empty($data['data']['start']) || empty($data['data']['end']) || empty($_GET['quotesID']) || empty($data['checkboxValues'])) {
    $response = array('info' => '¡no puede enviar datos vacíos!');
    echo json_encode($response);
    exit;
  }

  $vetID = $data['data']['id_vet'];
  $attended = $data['data']['attended'];
  $cost = $data['data']['cost'];
  $start = $data['data']['start'];
  $end = $data['data']['end'];

  //* Modify the services
  $sqlDeleteAll = "DELETE FROM quotes_services WHERE quotesID = '$quotesID'";
  mysqli_query($conn, $sqlDeleteAll);

  foreach ($data['checkboxValues'] as $serviceID) {
    $sqlCheck = "SELECT price FROM service WHERE id_servi = '$serviceID'";
    $resultCheck = mysqli_query($conn, $sqlCheck);
    $rowCheck = mysqli_fetch_assoc($resultCheck);

    if ($rowCheck) {
      $price = intval($rowCheck['price']);
      $priceTotal = $price * intval($numberPets);

      // Insertar el servicio seleccionado en la cita
      $sqlInsert = "INSERT INTO quotes_services (quotesID, serviceID, price, priceTotal) VALUES ('$quotesID', '$serviceID', '$price', '$priceTotal')";
      mysqli_query($conn, $sqlInsert);
    }
  }

  $sql = "UPDATE quotes SET vetID = '$vetID', attended = '$attended', cost = '$cost', start = '$start', end = '$end' WHERE quotesID = '$quotesID'";
  
  if(mysqli_query($conn,$sql)) {
    //-audit
    $tableID = mysqli_insert_id($conn);
    $adminID = $_SESSION['adminID'];
    $action = "Se acepto una solicitud de cita";
    $rol = "administrador";
    $nameTable = "cita";
    audit($tableID,$nameTable,$adminID,$rol,$action);
    
    $response = array('success' => true);
    echo json_encode($response);
    exit;
  };
}