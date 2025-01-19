<?php
session_start();
require_once './../../../assets/db/connectionMysql.php';

if (isset($_SESSION['ownerID']) || isset($_SESSION['veterinarianID'])) {
    $outgoing_id = isset($_SESSION['ownerID']) ? $_SESSION['ownerID'] : $_SESSION['veterinarianID'];
    $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);

    $sql = "SELECT * FROM messages
            LEFT JOIN owner ON owner.id_due = messages.outgoing_msg_id
            LEFT JOIN veterinarian ON veterinarian.id_vet = messages.incoming_msg_id
            WHERE (outgoing_msg_id = {$outgoing_id} AND incoming_msg_id = {$incoming_id})
               OR (outgoing_msg_id = {$incoming_id} AND incoming_msg_id = {$outgoing_id})
            ORDER BY msg_id";

    $query = mysqli_query($conn, $sql);
    $output = "";

    if (mysqli_num_rows($query) > 0) {
        while ($row = mysqli_fetch_assoc($query)) {
            if ($row['outgoing_msg_id'] === $outgoing_id) {
                $output .= '<div class="chat outgoing"><div class="details"><p>' . $row['msg'] . '</p></div></div>';
            } else {
                $output .= '<div class="chat incoming"><div class="details"><p>' . $row['msg'] . '</p></div></div>';
            }
        }
    } else {
        $output .= '<div class="text">No hay mensajes disponibles. Una vez que envíe el mensaje, aparecerán aquí.</div>';
    }
    echo $output;
} else {
    header("location: ./../../login.php");
}
?>
