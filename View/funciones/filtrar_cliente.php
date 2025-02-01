<?php
$conexion = mysqli_connect("localhost", "root", "", "vetdog");
$dni = $_GET['dni'];
$query = $conexion->query("SELECT * FROM owner WHERE dni_due LIKE '%$dni%'");

$options = '<option value="">-- Seleccione un cliente --</option>';

while ($row = $query->fetch_assoc()) {
    $options .= '<option value="' . $row['id_due'] . '">' . $row['nom_due'] . '</option>' . "\n";
}

echo $options;
?>
