<?php
session_start();
require_once './../../../assets/db/connectionMysql.php';

$outgoing_id = isset($_SESSION['ownerID']) ? $_SESSION['ownerID'] : $_SESSION['veterinarianID'];
$user_type = isset($_SESSION['ownerID']) ? 'owner' : 'veterinarian';

// Obtener la lista de veterinarios o dueños con quienes hay un intercambio de mensajes
if ($user_type == 'owner') {
    $sql = "SELECT * FROM veterinarian"; // Lista de veterinarios para clientes
} else {
    $sql = "SELECT * FROM owner"; // Lista de clientes para veterinarios
}

$query = mysqli_query($conn, $sql);
$output = "";

while ($row = mysqli_fetch_assoc($query)) {
    $user_id = ($user_type == 'owner') ? $row['id_vet'] : $row['id_due'];

    // Consultar el último mensaje entre el usuario y el otro usuario
    $sql2 = "SELECT * FROM messages 
             WHERE (incoming_msg_id = {$user_id} OR outgoing_msg_id = {$user_id}) 
             AND (outgoing_msg_id = {$outgoing_id} OR incoming_msg_id = {$outgoing_id}) 
             ORDER BY msg_id DESC LIMIT 1";
             
    $query2 = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_assoc($query2);

    $result = mysqli_num_rows($query2) > 0 ? $row2['msg'] : "No hay mensajes disponibles";
    $msg = strlen($result) > 28 ? substr($result, 0, 28) . '...' : $result;

    $you = isset($row2['outgoing_msg_id']) && $outgoing_id == $row2['outgoing_msg_id'] ? "Tu: " : "";

    // Determinar si el otro usuario está offline (0 = online, 1 = offline)
    $offline = $row['estado'] == 1 ? "offline" : "";  
    $hid_me = $outgoing_id == $user_id ? "hide" : "";  

    $name = ($user_type == 'owner') ? $row['nomvet'] . " " . $row['apevet'] : $row['nom_due'] . " " . $row['ape_due'];

    $output .= '<a href="chat.php?user_id=' . $user_id . '">  
                    <div class="content">
                    <div class="details">
                        <span>' . $name . '</span> 
                        <p>' . $you . $msg . '</p>
                    </div>
                    </div>
                    <div class="status-dot ' . $offline . '"><i class="fas fa-circle"></i></div>
                </a>';
}

echo $output;
?>
