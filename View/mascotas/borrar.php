<?php

session_start();

if (!isset($_SESSION['adminID']))  {
	$response = array('error' => true);
	header('Content-Type: application/json');
	echo json_encode($response);
}

require_once './../../assets/db/connectionMysql.php';
require_once './../../utils/audit.php';

$json = file_get_contents('php://input');
$data = json_decode($json, true);

$deleteID = $_GET['deleteID'];

$sql = "DELETE FROM pet WHERE id_pet = '$deleteID'";

try {
	if(mysqli_query($conn,$sql)) {
		//-audit
		$adminID = $_SESSION['adminID'];
		$action = 'Se eliminó una mascota';
		$rol = "administrador";
		$nameTable = "mascota";
		audit($deleteID,$nameTable,$adminID,$rol,$action);
	
		$response = array('success' => true);
		echo json_encode($response);
	}
} catch (\Throwable $th) {
	$response = array('error' => true);
	echo json_encode($response);
}