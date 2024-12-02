<?php
session_start();
require_once './../../assets/db/connectionMysql.php';


if (isset($_SESSION['ownerID'])) {
    $user_type = 'owner';
    $user_id = $_SESSION['ownerID'];
} elseif (isset($_SESSION['veterinarianID'])) {
    $user_type = 'veterinarian';
    $user_id = $_SESSION['veterinarianID'];
} else {
    header("location: ./../login.php");
    exit();
}


if (!isset($_GET['user_id'])) {
    echo "Error: ID de usuario no especificado.";
    exit();
}

$target_user_id = mysqli_real_escape_string($conn, $_GET['user_id']);


if ($user_type == 'owner') {
    $sql = "SELECT * FROM veterinarian WHERE id_vet = {$target_user_id}";
} else {
    $sql = "SELECT * FROM owner WHERE id_due = {$target_user_id}";
}


$query = mysqli_query($conn, $sql);

if ($query === false) {
    die("Error en la consulta SQL: " . mysqli_error($conn));
}

if (mysqli_num_rows($query) > 0) {
    $row = mysqli_fetch_assoc($query);
} else {
    header("location: users.php");
    exit();
}

include "./head.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./responsive.css" rel="stylesheet">
    <link rel="stylesheet" href="./Chat.css">
</head>

<style>
    .back-icon {
        margin-right: 20px;
        text-decoration: none;
    }
</style>

<body>
    <div class="wrapper">
        <section class="chat-area">
            <header>
                <a href="messages.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
                <div class="details">
                    <span><?php echo ($user_type == 'owner') ? $row['nomvet'] . " " . $row['apevet'] : $row['nom_due'] . " " . $row['ape_due']; ?></span>
                    <p><?php echo ($user_type == 'owner') ? "Veterinario" : "Dueño"; ?></p>
                </div>
            </header>

            <div class="chat-box"></div>
            <form action="#" class="typing-area">
                <input type="hidden" class="incoming_id" name="incoming_id" value="<?php echo $target_user_id; ?>">
                <input type="text" name="message" class="input-field" placeholder="Escribe tu mensaje aquí..."
                    autocomplete="off">
                <button><i class="fab fa-telegram-plane"></i></button>
            </form>
        </section>
    </div>

    <script src="./chat.js"></script>
</body>

</html>