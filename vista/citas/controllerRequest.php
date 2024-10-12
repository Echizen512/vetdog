<?php
session_start();
require_once './../../assets/db/connectionMysql.php';
require_once './../../utils/audit.php';

//* create quote
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $json = file_get_contents('php://input');
  $data = json_decode($json, true);

  //* Verify all data is empty
  if (!$_SESSION['owner_id'] || empty($data['data']['id_vet']) || empty($data['data']['attended']) || empty($data['data']['cost']) || empty($data['data']['start']) || empty($data['data']['end']) || count($data['checkboxValues']) === 0 || empty($data['arrIdPets']) || empty($data['numberPets'])) {
    $response = array('msg' => '¡No puede enviar datos vacíos!');

    header('Content-Type: application/json');
    echo json_encode($response);
  } else {
    // Insert all data into Quotes 
    $ownerID = $_SESSION['owner_id'];
    $vetID = $data['data']['id_vet'];
    $attended = $data['data']['attended'];
    $cost = $data['data']['cost'];
    $start = $data['data']['start'];
    $end = $data['data']['end'];
    $dateCreation = date('Y-m-d H:i:s');
    $numberPets = $data['numberPets'];
    $status = 0;
    $numberQuote = "FAC-" . rand(100000, 999999);

    $sql = "INSERT INTO quotes(ownerID,vetID,number_quote,attended,cost,start,end,dateCreation,status) VALUES ('$ownerID','$vetID','$numberQuote','$attended','$cost','$start','$end','$dateCreation',$status)";

    if (mysqli_query($conn, $sql)) {
      //Insert data the services and ddgs into children tables
      $lastIDS = mysqli_insert_id($conn);
      $lastID = intval($lastIDS);
      $arrIdPets = explode(',', $data['arrIdPets'][0]);

      //-audit
      $tableID = mysqli_insert_id($conn);
      $adminID = $_SESSION['adminID'];
      $action = "Se creó una cita";
      $rol = "administrador";
      $nameTable = "cita";
      audit($tableID, $nameTable, $adminID, $rol ,$action);

      foreach ($arrIdPets as $petIDS) {
        $petID = intval($petIDS);
        $sql = "INSERT INTO quotes_pets(quotesID,petsID) VALUES('$lastID','$petID')";

        mysqli_query($conn, $sql);
      }

      foreach ($data['checkboxValues'] as $serviceID) {
        $sql = "SELECT price FROM service WHERE id_servi = '$serviceID'";
        $price = mysqli_query($conn, $sql);

        foreach ($price as $row) {
          $price = $row['price'];
          $priceTotal = $row['price'] * $numberPets;

          $sql = "INSERT INTO quotes_services(quotesID,serviceID,price,priceTotal) VALUES('$lastID','$serviceID','$price','$priceTotal')";
          mysqli_query($conn, $sql);
        }
      }

      $_SESSION['quotesID'] = $lastID;

      $response = array('success' => 'true');
      header('Content-Type: application/json');
      echo json_encode($response);
    }
  }
}

if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
  $json = file_get_contents('php://input');
  $data = json_decode($json, true);

  $_SESSION['quotesID'] = intval($_GET['quotesID']);
  $_SESSION['owner_id'] = intval($_GET['ownerID']);

  $response = array('success' => 'true');
  header('Content-Type: application/json');
  echo json_encode($response);
}

//* create diagnosis
if ($_SERVER['REQUEST_METHOD'] === 'PATCH') {
  $json = file_get_contents('php://input');
  $data = json_decode($json, true);

  $success = array('success' => 'true');
  $error = array('error' => 'true');

  $quotesID = $_GET['quotesID'];
  $status = 1;
  $diagnosis = $data['diagnosis'];

  if (!empty($diagnosis)) {
    $sql = "UPDATE quotes SET status = '$status', diagnosis = '$diagnosis' WHERE quotesID = $quotesID";

    if (mysqli_query($conn, $sql)) {
      $response = array('success' => 'true');
      header('Content-Type: application/json');
      echo json_encode($response);
    }
  } else echo json_encode($error);
}

//* get diagnosis
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  $json = file_get_contents('php://input');
  $data = json_decode($json, true);

  $error = array('error' => 'true');
  $quotesID = $_GET['quotesID'];

  if (!empty($quotesID)) {
    $sql = "SELECT diagnosis FROM quotes WHERE quotesID = $quotesID";
    $results = mysqli_query($conn, $sql);

    if ($results) {
      foreach ($results as $row) {
        $response = array('diagnosis' => mb_convert_encoding($row['diagnosis'], 'UTF-8', 'ISO-8859-1'));
        header('Content-Type: application/json');
        echo json_encode($response);
      }
    }
  } else echo json_encode($error);
}
