<?php
$conexion = mysqli_connect("localhost", "root", "", "vetdog");

if (isset($_GET['dni'])) {
    $dni = $_GET['dni'];
    $query = $conexion->query("SELECT id_due, nom_due, ape_due FROM owner WHERE dni_due = '$dni'");

    if ($row = $query->fetch_assoc()) {
        $response = array("id" => $row['id_due'], "name" => $row['nom_due'] . ' ' . $row['ape_due']);
        echo json_encode($response);
    } else {
        $response = array("id" => "", "name" => "--");
        echo json_encode($response);
    }
}
?>
