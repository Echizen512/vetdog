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

$sql = "DELETE FROM pet_type WHERE id_tiM = '$deleteID'";

try {
	if(mysqli_query($conn,$sql)) {
		//-audit
		$adminID = $_SESSION['adminID'];
		$action = 'Se eliminó un tipo de mascota';
		$rol = "administrador";

		audit($deleteID,$adminID,$rol,$action);
	
		$response = array('success' => true);
		header('Content-Type: application/json');
		echo json_encode($response);
	}  
} catch (\Throwable $error) {
	$response = array('no' => true);
	header('Content-Type: application/json');
	echo json_encode($response);
}
