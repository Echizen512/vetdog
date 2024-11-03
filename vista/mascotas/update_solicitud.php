<?php
session_start();
require_once '../../assets/db/connectionMysql.php';

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $solicitudID = $_POST['solicitudID'];
    $nuevoEstado = $_POST['nuevoEstado'];

    $estadosPermitidos = ['aceptada', 'rechazada', 'pendiente'];
    if (!in_array($nuevoEstado, $estadosPermitidos)) {
        echo 'Estado no permitido';
        exit();
    }

    // Actualiza el estado de la solicitud
    $query = "UPDATE solicitudes SET estado = ? WHERE id_solicitud = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("si", $nuevoEstado, $solicitudID);

    if ($stmt->execute()) {
        // Si la solicitud es aceptada, actualiza el estado del animal
        if ($nuevoEstado === 'aceptada') {
            $queryAnimal = "SELECT id_animal FROM solicitudes WHERE id_solicitud = ?";
            $stmtAnimal = $conn->prepare($queryAnimal);
            $stmtAnimal->bind_param("i", $solicitudID);

            if ($stmtAnimal->execute()) {
                $stmtAnimal->bind_result($idAnimal);
                if ($stmtAnimal->fetch()) {
                    $stmtAnimal->close(); // Cierra la declaración después de usarla

                    // Actualiza el estado del animal
                    $queryUpdateAnimal = "UPDATE animales SET estado = 'no disponible' WHERE id_animal = ?";
                    $stmtUpdateAnimal = $conn->prepare($queryUpdateAnimal);
                    $stmtUpdateAnimal->bind_param("i", $idAnimal);

                    if ($stmtUpdateAnimal->execute()) {
                        echo 'success'; // Respuesta exitosa
                    } else {
                        echo 'Error al actualizar el estado del animal'; // Mensaje de error
                    }
                    $stmtUpdateAnimal->close();
                } else {
                    echo 'No se encontró el id_animal para la solicitud especificada';
                }
            } else {
                echo 'Error al obtener el id_animal'; // Mensaje de error
            }
        } else {
            echo 'success'; // Si no se actualiza el animal, también es un éxito
        }
    } else {
        echo 'Error al actualizar el estado de la solicitud'; // Mensaje de error
    }

    $stmt->close();
    $conn->close();
}
?>
