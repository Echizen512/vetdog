<?php
	require_once '../../assets/db/connectionMysql.php';
	session_destroy();

	header('Location: ../login.php');
?>
