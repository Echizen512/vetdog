<?php
session_start();
require_once '../../assets/db/connectionMysql.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los parámetros
    $solicitudID = $_POST['solicitudID'];
    $nuevoEstado = $_POST['nuevoEstado'];

    // Validar que el estado sea uno de los valores permitidos
    $estadosPermitidos = ['aceptada', 'rechazada', 'pendiente'];
    if (!in_array($nuevoEstado, $estadosPermitidos)) {
        echo 'error';
        exit();
    }

    // Actualizar el estado de la solicitud
    $query = "UPDATE solicitudes SET estado = ? WHERE id_solicitud = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("si", $nuevoEstado, $solicitudID);

    if ($stmt->execute()) {
        echo 'success';
    } else {
        echo 'error';
    }

    $stmt->close();
    $conn->close();
}
?>
