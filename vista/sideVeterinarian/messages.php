<?php
require_once './../../assets/db/connectionMysql.php';
session_start();
if (isset($_SESSION['veterinarianID'])) {
    $vet_id = $_SESSION['veterinarianID'];
} else {
    header("location: ./../login.php");
    exit();
}
$sql = "SELECT m.msg, m.msg_id, o.nom_due, o.ape_due, o.correo, m.outgoing_msg_id
        FROM messages m
        JOIN owner o ON m.outgoing_msg_id = o.id_due
        WHERE m.incoming_msg_id = {$vet_id}
        ORDER BY m.msg_id DESC";
$query = mysqli_query($conn, $sql);
if ($query === false) {
    die("Error en la consulta: " . mysqli_error($conn));
}
?>
<!DOCTYPE html>
<html lang="es-ES">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <link href="../../assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="../../assets/plugins/node-waves/waves.css" rel="stylesheet" />
    <link href="../../assets/plugins/animate-css/animate.css" rel="stylesheet" />
    <link href="../../assets/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
    <link href="../../css/style.css" rel="stylesheet">
    <link href="../../assets/css/themes/all-themes.css" rel="stylesheet" />
    <link rel="shortcut icon" type="image/x-icon" href="../../assets/img/lll.png" />
    <script src="../../assets/js/popper.js"></script>
    <script src="../../assets/js/tippy-bundle.umd.js"></script>
    <title>Beatriz Fagundez</title>
</head>
<body class="theme-red">
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left"><div class="circle"></div></div>
                    <div class="circle-clipper right"><div class="circle"></div></div>
                </div>
            </div>
            <p>Cargando...</p>
        </div>
    </div>
    <div class="overlay"></div>
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="./home.php"> INICIO - VETERINARIO</a>
            </div>
        </div>
    </nav>
    <section>
        <aside id="leftsidebar" class="sidebar">
            <article class="menu">
                <ul class="list">
                    <li class="header">MENÚ DE NAVEGACIÓN</li>
                    <li><a href="./home.php"><i class="material-icons">home</i><span>INICIO</span></a></li>
                    <li><a href="./editProfile.php"><i class="material-icons">person</i><span>PERFIL</span></a></li>
                    <li><a href="javascript:void(0);" class="menu-toggle"><i class="material-icons">calendar_today</i><span>CITAS</span></a>
                        <ul class="ml-menu"><li><a href="./quotes/mostrar.php">Listar / Modificar</a></li></ul>
                    </li>
                    <li><a href="./messages.php"><i class="material-icons">email</i><span>MENSAJES</span></a></li>

                    <li><a href="./closeSession.php"><i class="material-icons">input</i><span>Cerrar Sesión</span></a></li>
                    <aside id="rightsidebar" class="right-sidebar"></aside>
            </article>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2><i class="fas fa-envelope text-primary"></i> Mensajes Recientes:</h2>
                            <br>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable" id="mensajesTable">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Nº</th>
                                            <th class="text-center">Nombre del Cliente</th>
                                            <th class="text-center">Correo</th>
                                            <th class="text-center">Mensaje</th>
                                            <th class="text-center">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (mysqli_num_rows($query) > 0): ?>
                                            <?php $index = 1; ?>
                                            <?php while ($message = mysqli_fetch_assoc($query)): ?>
                                                <tr>
                                                    <td class="text-center"><?php echo $index++; ?></td>
                                                    <td class="text-center"><?php echo htmlspecialchars($message['nom_due']) . ' ' . htmlspecialchars($message['ape_due']); ?></td>
                                                    <td class="text-center"><?php echo htmlspecialchars($message['correo']); ?></td>
                                                    <td class="text-center"><?php echo (strlen($message['msg']) > 30) ? htmlspecialchars(substr($message['msg'], 0, 30)) . '...' : htmlspecialchars($message['msg']); ?></td>
                                                    <td class="text-center"><a href="chat.php?user_id=<?php echo $message['outgoing_msg_id']; ?>" class="btn btn-primary btn-sm"><i class="fas fa-comments"></i> Responder</a></td>
                                                </tr>
                                            <?php endwhile; ?>
                                        <?php else: ?>
                                            <tr><td colspan="5" class="text-center">No hay mensajes recientes.</td></tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="../../assets/plugins/jquery/jquery.min.js"></script>
    <script src="../../assets/plugins/bootstrap/js/bootstrap.js"></script>
    <script src="../../assets/plugins/bootstrap-select/js/bootstrap-select.js"></script>
    <script src="../../assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
    <script src="../../assets/plugins/node-waves/waves.js"></script>
    <script src="../../assets/plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="../../assets/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="../../assets/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="../../assets/plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="../../assets/plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="../../assets/plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="../../assets/plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="../../assets/plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="../../assets/plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>
    <script src="../../assets/js/admin.js"></script>
    <script src="../../assets/js/demo.js"></script>
    <script>
        $(document).ready(function() {
            $('#mensajesTable').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
                },
                "pageLength": 5,
                "lengthMenu": [[5, 10, 25, 50], [5, 10, 25, 50]],
                "ordering": true,
                "order": [[0, 'asc']],
                "searching": true,
                "info": true
            });
        });
    </script>
</body>
</html>
