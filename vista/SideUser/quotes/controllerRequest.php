<?php
session_start();
require_once './../../../assets/db/connectionMysql.php';
require_once './../../../utils/audit.php';

//* Create new quote
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $json = file_get_contents('php://input');
  $data = json_decode($json, true);

  // //* Verify all data is empty
  if (!$_SESSION['ownerID'] || empty($data['checkboxValuesServices']) || empty($data['checkboxValuesPets'])) {

    $response = array('msg' => 'No puede enviar datos vacíos');
    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
  }

  //* Insert all data into Quotes 
  $ownerID = $_SESSION['ownerID'];
  $numberQuote = "FAC-" . rand(100000, 999999);
  $dateCreation = date('Y-m-d H:i:s');
  $status = 0;

  $sql = "INSERT INTO quotes(ownerID,number_quote,dateCreation,status) VALUES ('$ownerID','$numberQuote','$dateCreation',$status)";

  if (mysqli_query($conn,$sql)) {
    //*Insert data the services and ddgs into children tables
    $lastIDS = mysqli_insert_id($conn);
    $lastID = intval($lastIDS);

    //-audit
    $tableID = mysqli_insert_id($conn);
    $ownerID = $_SESSION['ownerID'];
    $rol = "usuario";
    $action = "Se creó una cita";
		$nameTable = "cita";

    audit($tableID,$nameTable,$ownerID,$rol,$action);

    //*pets
    foreach ($data['checkboxValuesPets'] as $petIDS) {
      $petID = intval($petIDS);
      $sql = "INSERT INTO quotes_pets(quotesID,petsID) VALUES('$lastID','$petID')";

      mysqli_query($conn, $sql);
    }

    //*services
    foreach ($data['checkboxValuesServices'] as $serviceID) {
      $sql = "SELECT price FROM service WHERE id_servi = '$serviceID'";
      $price = mysqli_query($conn, $sql);

      foreach ($price as $row) {
        $price = $row['price'];
        $priceTotal = $row['price'] * count($data['checkboxValuesPets']);

        $sql = "INSERT INTO quotes_services(quotesID,serviceID,price,priceTotal) VALUES('$lastID','$serviceID','$price','$priceTotal')";
        mysqli_query($conn, $sql);
      }
    }

    $response = array('success' => 'true');
    header('Content-Type: application/json');
    echo json_encode($response);
  }
}