<?php 
session_start();
$con = new mysqli("localhost", "root", "", "vetdog");

if (!$con) {
    die("Conexión fallida: " . mysqli_connect_error());
}

if (!empty($_POST)) {
    // Obtener valores del formulario
    $numfact = $_POST['numfact'];
    $estado = $_POST['estado'];
    $id_due = $_POST['id_due'];
    $total = $_POST['total'];
    $tipoc = $_POST['tipoc'];
    $tipopa = $_POST['tipopa'];
    $recibir = $_POST['recibir'];
    $cambio = $_POST['cambio'];
    $ref = isset($_POST['ref']) ? $_POST['ref'] : NULL;

    // Si el pago es con tarjeta, se guardan los datos de la tarjeta
    if ($tipopa == "tarjeta") {
        $numtarj = $_POST['numtarj'];
        $typetarj = $_POST['typetarj'];
        $nomtarj = $_POST['nomtarj'];
        $expmon = $_POST['expmon'];
        $expyear = $_POST['expyear'];
        $cvc = $_POST['cvc'];
    } else {
        // Si es pago móvil, los datos de la tarjeta quedan vacíos
        $numtarj = "";
        $typetarj = "";
        $nomtarj = "";
        $expmon = "";
        $expyear = "";
        $cvc = "";
    }

    // Insertar en la tabla venta
    $stmt = $con->prepare("INSERT INTO venta (fecha, numfact, estado, id_due, total, tipoc, tipopa, numtarj, typetarj, nomtarj, expmon, expyear, cvc, recibir, cambio, ref) 
                           VALUES (NOW(), ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssidsisssssddds", 
        $numfact, $estado, $id_due, $total, $tipoc, $tipopa, 
        $numtarj, $typetarj, $nomtarj, $expmon, $expyear, 
        $cvc, $recibir, $cambio, $ref);
    
    if ($stmt->execute()) {
        $id_venta = $stmt->insert_id;

        // Insertar los productos vendidos y actualizar el stock
        foreach ($_SESSION["carts"] as $c) {
            $id_prod = $c["id_prod"];
            $canti = $c["canti"];
            $stock = $c["stock"];

            $stmt = $con->prepare("INSERT INTO productos_vendidos (id_prod, canti, id_venta) VALUES (?, ?, ?)");
            $stmt->bind_param("iii", $id_prod, $canti, $id_venta);
            $stmt->execute();

            $stmt = $con->prepare("UPDATE products SET stock = stock - ? WHERE id_prod = ?");
            $stmt->bind_param("ii", $canti, $id_prod);
            $stmt->execute();
        }

        unset($_SESSION["carts"]);
        echo "<script>alert('Venta procesada exitosamente'); window.location='../../folder/venta';</script>";
    } else {
        echo "<script>alert('Error al procesar la venta');</script>";
    }

    $stmt->close();
    $con->close();
}
?>
