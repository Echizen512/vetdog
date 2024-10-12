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

$sql = "DELETE FROM products WHERE id_prod = '$deleteID'";

if(mysqli_query($conn,$sql)) {
	//-audit
	$adminID = $_SESSION['adminID'];
	$action = 'Se eliminó un producto';
	$rol = "administrador";
	$nameTable = "producto";
	audit($deleteID,$nameTable,$adminID,$rol,$action);

	$response = array('success' => true);
	header('Content-Type: application/json');
	echo json_encode($response);
}