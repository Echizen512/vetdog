<?php
session_start();
require_once './../../../assets/db/connectionMysql.php';
require_once './../../../utils/audit.php';

//* Create new quote
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $json = file_get_contents('php://input');
    $data = json_decode($json, true);

    //* Verify all data is not empty
    if (empty($_SESSION['ownerID']) || empty($data['checkboxValuesServices']) || empty($data['checkboxValuesPets'])) {
        $response = array('msg' => 'No puede enviar datos vacíos');
        header('Content-Type: application/json');
        echo json_encode($response);
        exit;
    }

    //* Initialize variables
    $ownerID = $_SESSION['ownerID'];
    $numberQuote = "FAC-" . rand(100000, 999999);
    $dateCreation = date('Y-m-d H:i:s');
    $status = 0;

    //* Insert data into Quotes table
    $sql = "INSERT INTO quotes (ownerID, number_quote, dateCreation, status) VALUES ('$ownerID', '$numberQuote', '$dateCreation', $status)";
    if (mysqli_query($conn, $sql)) {
        $lastID = mysqli_insert_id($conn);

        // Audit the creation
        $rol = "usuario";
        $action = "Se creó una cita";
        $nameTable = "cita";
        audit($lastID, $nameTable, $ownerID, $rol, $action);

        //* Insert data into quotes_pets table
        foreach ($data['checkboxValuesPets'] as $petID) {
            $petID = intval($petID); // Ensure it's an integer
            $sql = "INSERT INTO quotes_pets (quotesID, petsID) VALUES ('$lastID', '$petID')";
            if (!mysqli_query($conn, $sql)) {
                error_log("Error al insertar en quotes_pets: " . mysqli_error($conn)); // Log errors
            }
        }

        //* Insert data into quotes_services table
        foreach ($data['checkboxValuesServices'] as $serviceID) {
            $serviceID = intval($serviceID); // Ensure it's an integer
            $sqlPrice = "SELECT price FROM service WHERE id_servi = '$serviceID'";
            $result = mysqli_query($conn, $sqlPrice);

            if ($result && $row = mysqli_fetch_assoc($result)) {
                $price = $row['price'];
                $priceTotal = $price * count($data['checkboxValuesPets']);
                $sql = "INSERT INTO quotes_services (quotesID, serviceID, price, priceTotal) VALUES ('$lastID', '$serviceID', '$price', '$priceTotal')";
                if (!mysqli_query($conn, $sql)) {
                    error_log("Error al insertar en quotes_services: " . mysqli_error($conn)); // Log errors
                }
            } else {
                error_log("Error al obtener precio de service: " . mysqli_error($conn)); // Log errors
            }
        }

        $response = array('success' => 'true');
        header('Content-Type: application/json');
        echo json_encode($response);
    } else {
        $response = array('msg' => 'Error al crear la cita: ' . mysqli_error($conn));
        header('Content-Type: application/json');
        echo json_encode($response);
    }
} else {
    $response = array('msg' => 'Método no permitido');
    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
}
?>
