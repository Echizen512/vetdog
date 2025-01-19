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

//- SERVICES
//month 1
$sql = "SELECT * FROM service WHERE fere BETWEEN '$dateOneStart' AND '$dateOneEnd'";

$results = mysqli_query($conn,$sql);
$servicesOne = mysqli_num_rows($results);

//month 2
$sql2 = "SELECT * FROM service WHERE fere BETWEEN '$dateTwoStart' AND '$dateTwoEnd'";

$results = mysqli_query($conn,$sql2);
$serviceTwo = mysqli_num_rows($results);

//month 3
$sql3 = "SELECT * FROM service WHERE fere BETWEEN '$dateThreeStart' AND '$dateThreeEnd'";

$results = mysqli_query($conn,$sql3);
$servicesThree = mysqli_num_rows($results);

//month 4
$sql4 = "SELECT * FROM service WHERE fere BETWEEN '$dateFourStart' AND '$dateFourEnd'";

$results = mysqli_query($conn,$sql4);
$servicesFour = mysqli_num_rows($results);

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
  'service1' => [$servicesOne, getNameMonth($dateOneStart)],
  'service2' => [$serviceTwo, getNameMonth($dateTwoStart)],
  'service3' => [$servicesThree, getNameMonth($dateThreeStart)],
  'service4' => [$servicesFour, getNameMonth($dateFourStart)],
  'pet1' => [$petsOne, getNameMonth($dateOneStart)],
  'pet2' => [$petsTwo, getNameMonth($dateTwoStart)],
  'pet3' => [$petsThree, getNameMonth($dateThreeStart)],
  'pet4' => [$petsFour, getNameMonth($dateFourStart)],
  // 'vet1' => [$vetsOne, getNameMonth($dateOneStart)],
  // 'vet2' => [$vetsTwo, getNameMonth($dateTwoStart)],
  // 'vet3' => [$vetsThree, getNameMonth($dateThreeStart)],
  // 'vet4' => [$vetsFour, getNameMonth($dateFourStart)],
  // 'quotes1' => [$quotesOne, getNameMonth($dateOneStart)],
  // 'quotes2' => [$quotesTwo, getNameMonth($dateTwoStart)],
  // 'quotes3' => [$quotesThree, getNameMonth($dateThreeStart)],
  // 'quotes4' => [$quotesFour, getNameMonth($dateFourStart)]
);

header('Content-Type: application/json');
echo json_encode($response);