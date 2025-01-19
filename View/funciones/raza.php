<?php
echo '<div class="form-group">';
echo '<div class="form-line">';
echo '<label class="control-label">Raza de la mascota<span class="text-danger">*</span></label>';
echo '<select name="id_raza" class="form-control show-tick">';

$conexion = mysqli_connect("localhost", "root", "", "vetdog");
$query = $conexion->query("SELECT * FROM raza");
echo '<option value="0" disabled>--Seleccione una raza--</option>';

while ($row = $query->fetch_assoc()) {
	if ($row['id_tiM'] == $_GET['id']) {
		echo "<option value='" . $row['id_raza'] . "'>" . $row['nomraza'] . "</option>";
	}
}
echo '</select>';
echo '</div>';
echo '</div>';