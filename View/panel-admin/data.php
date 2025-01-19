<?php
require_once './../../assets/db/connectionMysql.php';
$json = file_get_contents('php://input');
$data = json_decode($json, true);

date_default_timezone_set('America/Caracas');

$currentDateVenezuela = date('Y-m-d');
$currentDateVenezuela = date('Y-m-01', strtotime($currentDateVenezuela));

// Calcular los últimos 3 meses incluyendo febrero
$dateOneStart = date('Y-m-01', strtotime('-3 month', strtotime($currentDateVenezuela)));
$dateOneEnd = date('Y-m-t', strtotime($dateOneStart));

$dateTwoStart = date('Y-m-01', strtotime('-2 month', strtotime($currentDateVenezuela)));
$dateTwoEnd = date('Y-m-t', strtotime($dateTwoStart));

$dateThreeStart = date('Y-m-01', strtotime('-1 month', strtotime($currentDateVenezuela)));
$dateThreeEnd = date('Y-m-t', strtotime($dateThreeStart));

$dateFourStart = date('Y-m-01', strtotime($currentDateVenezuela));
$dateFourEnd = date('Y-m-t', strtotime($dateFourStart));


//- OWNERS
//month 1
$sql = "SELECT * FROM owner WHERE fere BETWEEN '$dateOneStart' AND '$dateOneEnd'";

$results = mysqli_query($conn,$sql);
$usersOne = mysqli_num_rows($results);

//month 2
$sql2 = "SELECT * FROM owner WHERE fere BETWEEN '$dateTwoStart' AND '$dateTwoEnd'";

$results = mysqli_query($conn,$sql2);
$userTwo = mysqli_num_rows($results);

//month 3
$sql3 = "SELECT * FROM owner WHERE fere BETWEEN '$dateThreeStart' AND '$dateThreeEnd'";

$results = mysqli_query($conn,$sql3);
$usersThree = mysqli_num_rows($results);

//month 4
$sql4 = "SELECT * FROM owner WHERE fere BETWEEN '$dateFourStart' AND '$dateFourEnd'";

$results = mysqli_query($conn,$sql4);
$usersFour = mysqli_num_rows($results);

//- PETS
//month 1
$sql = "SELECT * FROM pet WHERE fere BETWEEN '$dateOneStart' AND '$dateOneEnd'";

$results = mysqli_query($conn,$sql);
$petsOne = mysqli_num_rows($results);

//month 2
$sql2 = "SELECT * FROM pet WHERE fere BETWEEN '$dateTwoStart' AND '$dateTwoEnd'";

$results = mysqli_query($conn,$sql2);
$petsTwo = mysqli_num_rows($results);

//month 3
$sql3 = "SELECT * FROM pet WHERE fere BETWEEN '$dateThreeStart' AND '$dateThreeEnd'";

$results = mysqli_query($conn,$sql3);
$petsThree = mysqli_num_rows($results);

//month 4
$sql4 = "SELECT * FROM pet WHERE fere BETWEEN '$dateFourStart' AND '$dateFourEnd'";

$results = mysqli_query($conn,$sql4);
$petsFour = mysqli_num_rows($results);

//- VETS
//month 1
$sql = "SELECT * FROM veterinarian WHERE fere BETWEEN '$dateOneStart' AND '$dateOneEnd'";

$results = mysqli_query($conn,$sql);
$vetsOne = mysqli_num_rows($results);

//month 2
$sql2 = "SELECT * FROM veterinarian WHERE fere BETWEEN '$dateTwoStart' AND '$dateTwoEnd'";

$results = mysqli_query($conn,$sql2);
$vetsTwo = mysqli_num_rows($results);

//month 3
$sql3 = "SELECT * FROM veterinarian WHERE fere BETWEEN '$dateThreeStart' AND '$dateThreeEnd'";

$results = mysqli_query($conn,$sql3);
$vetsThree = mysqli_num_rows($results);

//month 4
$sql4 = "SELECT * FROM veterinarian WHERE fere BETWEEN '$dateFourStart' AND '$dateFourEnd'";

$results = mysqli_query($conn,$sql4);
$vetsFour = mysqli_num_rows($results);

//- QUOTES
//month 1
$sql = "SELECT * FROM quotes WHERE dateCreation BETWEEN '$dateOneStart' AND '$dateOneEnd'";

$results = mysqli_query($conn,$sql);
$quotesOne = mysqli_num_rows($results);

//month 2
$sql2 = "SELECT * FROM quotes WHERE dateCreation BETWEEN '$dateTwoStart' AND '$dateTwoEnd'";

$results = mysqli_query($conn,$sql2);
$quotesTwo = mysqli_num_rows($results);

//month 3
$sql3 = "SELECT * FROM quotes WHERE dateCreation BETWEEN '$dateThreeStart' AND '$dateThreeEnd'";

$results = mysqli_query($conn,$sql3);
$quotesThree = mysqli_num_rows($results);

//month 4
$sql4 = "SELECT * FROM quotes WHERE dateCreation BETWEEN '$dateFourStart' AND '$dateFourEnd'";

$results = mysqli_query($conn,$sql4);
$quotesFour = mysqli_num_rows($results);

//- MONEY
//month 1
$sql5 = "SELECT GROUP_CONCAT(quotesID) as quotesID_list, SUM(cost) as totalCost FROM quotes WHERE vetID IS NOT NULL AND dateCreation BETWEEN '$dateOneStart' AND '$dateOneEnd'";

$preResults = mysqli_query($conn,$sql5);

foreach($preResults as $preRow) {
  $quotesIDlist = $preRow['quotesID_list'];
  $totalCost = $preRow['totalCost'];
  $GLOBALS['totalCost1'] = $totalCost;

  $quotesIDArr = explode(',', $quotesIDlist);

  foreach($quotesIDArr as $quotesID) {
    $sql5 = "SELECT SUM(qs.priceTotal) as priceTotal FROM quotes_services as qs JOIN service AS s WHERE qs.serviceID = s.id_servi AND qs.quotesID = '$quotesID'";

    $resultsMoney = mysqli_query($conn,$sql5);

    foreach($resultsMoney as $row) { 
      $GLOBALS['totalCost1'] += $row['priceTotal'];
    }
  }
}

//month 2
$sql6 = "SELECT GROUP_CONCAT(quotesID) as quotesID_list, SUM(cost) as totalCost FROM quotes WHERE vetID IS NOT NULL AND dateCreation BETWEEN '$dateTwoStart' AND '$dateTwoEnd'";

$preResults = mysqli_query($conn,$sql6);

foreach($preResults as $preRow) {
  $quotesIDlist = $preRow['quotesID_list'];
  $totalCost = $preRow['totalCost'];
  $GLOBALS['totalCost2'] = $totalCost;

  $quotesIDArr = explode(',', $quotesIDlist);

  foreach($quotesIDArr as $quotesID) {
    $sql5 = "SELECT SUM(qs.priceTotal) as priceTotal FROM quotes_services as qs JOIN service AS s WHERE qs.serviceID = s.id_servi AND qs.quotesID = '$quotesID'";

    $results = mysqli_query($conn,$sql5);

    foreach($results as $row) { 
      $GLOBALS['totalCost2'] += $row['priceTotal'];
    }
  }
}

//month 3
$sql7 = "SELECT GROUP_CONCAT(quotesID) as quotesID_list, SUM(cost) as totalCost FROM quotes WHERE vetID IS NOT NULL AND dateCreation BETWEEN '$dateThreeStart' AND '$dateThreeEnd'";

$preResults = mysqli_query($conn,$sql7);

foreach($preResults as $preRow) {
  $quotesIDlist = $preRow['quotesID_list'];
  $totalCost = $preRow['totalCost'];
  $GLOBALS['totalCost3'] = $totalCost;

  $quotesIDArr = explode(',', $quotesIDlist);

  foreach($quotesIDArr as $quotesID) {
    $sql5 = "SELECT SUM(qs.priceTotal) as priceTotal FROM quotes_services as qs JOIN service AS s WHERE qs.serviceID = s.id_servi AND qs.quotesID = '$quotesID'";

    $results = mysqli_query($conn,$sql5);

    foreach($results as $row) { 
      $GLOBALS['totalCost3'] += $row['priceTotal'];
    }
  }
}

//month 4
$sql8 = "SELECT GROUP_CONCAT(quotesID) as quotesID_list, SUM(cost) as totalCost FROM quotes WHERE vetID IS NOT NULL AND dateCreation BETWEEN '$dateFourStart' AND '$dateFourEnd'";

$preResults = mysqli_query($conn,$sql8);

foreach($preResults as $preRow) {
  $quotesIDlist = $preRow['quotesID_list'];
  $totalCost = $preRow['totalCost'];
  $GLOBALS['totalCost4'] = $totalCost;

  $quotesIDArr = explode(',', $quotesIDlist);

  foreach($quotesIDArr as $quotesID) {
    $sql5 = "SELECT SUM(qs.priceTotal) as priceTotal FROM quotes_services as qs JOIN service AS s WHERE qs.serviceID = s.id_servi AND qs.quotesID = '$quotesID'";

    $results = mysqli_query($conn,$sql5);

    foreach($results as $row) { 
      $GLOBALS['totalCost4'] += $row['priceTotal'] ;
    }
  }
}


//- MOST REQUEST SERVICES
//month 1
$sql9 = "SELECT nomser AS name,SUM(service.price) AS price FROM quotes_services JOIN service ON quotes_services.serviceID = service.id_servi JOIN quotes ON quotes.quotesID = quotes_services.quotesID AND dateCreation BETWEEN '$dateOneStart' AND '$dateFourEnd' GROUP BY serviceID";

$service = array();

$results = mysqli_query($conn, $sql9);

if ($results) {
  while ($row = mysqli_fetch_assoc($results)) {
    $service[] = $row;
  }
}

function getNameMonth($date): string {
  switch(explode('-',$date)[1]) {
    case '01': return 'Enero';
    case '02': return 'Febrero';
    case '03': return 'Marzo';
    case '04': return 'Abril';
    case '05': return 'Mayo';
    case '06': return 'Junio';
    case '07': return 'Julio';
    case '08': return 'Agosto';
    case '09': return 'Septiembre';
    case '10': return 'Octubre';
    case '11': return 'Noviembre';
    case '12': return 'Diciembre';
  }
}

$response = array(
  'user1' => [$usersOne, getNameMonth($dateOneStart)],
  'user2' => [$userTwo, getNameMonth($dateTwoStart)],
  'user3' => [$usersThree, getNameMonth($dateThreeStart)],
  'user4' => [$usersFour, getNameMonth($dateFourStart)],
  'pet1' => [$petsOne, getNameMonth($dateOneStart)],
  'pet2' => [$petsTwo, getNameMonth($dateTwoStart)],
  'pet3' => [$petsThree, getNameMonth($dateThreeStart)],
  'pet4' => [$petsFour, getNameMonth($dateFourStart)],
  'vet1' => [$vetsOne, getNameMonth($dateOneStart)],
  'vet2' => [$vetsTwo, getNameMonth($dateTwoStart)],
  'vet3' => [$vetsThree, getNameMonth($dateThreeStart)],
  'vet4' => [$vetsFour, getNameMonth($dateFourStart)],
  'quotes1' => [$quotesOne, getNameMonth($dateOneStart)],
  'quotes2' => [$quotesTwo, getNameMonth($dateTwoStart)],
  'quotes3' => [$quotesThree, getNameMonth($dateThreeStart)],
  'quotes4' => [$quotesFour, getNameMonth($dateFourStart)],
  'money1' => [$GLOBALS['totalCost1'], getNameMonth($dateOneStart)],
  'money2' => [$GLOBALS['totalCost2'], getNameMonth($dateTwoStart)],
  'money3' => [$GLOBALS['totalCost3'], getNameMonth($dateThreeStart)],
  'money4' => [$GLOBALS['totalCost4'], getNameMonth($dateFourStart)],
  'service' => $service,
);

header('Content-Type: application/json');
echo json_encode($response);