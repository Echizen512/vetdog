<?php

include_once './../../assets/db/connectionMysql.php';

$sql = "SELECT id_tiM,noTiM FROM pet_type";
$results = mysqli_query($conn,$sql);

foreach($results as $row) {
	echo '<option class="optionPet"  value="' . $row['id_tiM'] . '">' . $row['noTiM'] . '</option>' . "\n";
}