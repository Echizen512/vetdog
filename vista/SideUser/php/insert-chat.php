<?php
session_start();
require_once './../../../assets/db/connectionMysql.php';

if (isset($_SESSION['ownerID']) || isset($_SESSION['veterinarianID'])) {
    $outgoing_id = isset($_SESSION['ownerID']) ? $_SESSION['ownerID'] : $_SESSION['veterinarianID'];
    $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    if (!empty($message)) {
        $sql = "INSERT INTO messages (incoming_msg_id, outgoing_msg_id, msg) VALUES ({$incoming_id}, {$outgoing_id}, '{$message}')";
        mysqli_query($conn, $sql);
    }
} else {
    header("location: ./../../login.php");
}
?>
