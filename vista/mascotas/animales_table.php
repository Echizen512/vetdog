<?php
session_start();
if (!isset($_SESSION['adminID'])) {
    header('location: ../vista/login.php');
    exit();
}

require_once '../../assets/db/connectionMysql.php';

// Consulta de animales
$query = "SELECT id_animal, nombre, edad, tipo, condicion, imagen, estado FROM animales";
$result = $conn->query($query);

if (!$result) {
    die("Error en la consulta: " . $conn->error);
}

$animales = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $animales[] = $row;
    }
} else {
    echo "No se encontraron animales.";
}
?>

<!DOCTYPE html>
<html lang="es-ES">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet"
        type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <!-- Bootstrap Core Css -->
    <link href="../../assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
    <!-- Waves Effect Css -->
    <link href="../../assets/plugins/node-waves/waves.css" rel="stylesheet" />
    <!-- Animation Css -->
    <link href="../../assets/plugins/animate-css/animate.css" rel="stylesheet" />
    <!-- JQuery DataTable Css -->
    <link href="../../assets/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
    <!-- Custom Css -->
    <link href="../../css/style.css" rel="stylesheet">

    <link href="../../assets/css/themes/all-themes.css" rel="stylesheet" />
    <link rel="shortcut icon" type="image/x-icon" href="../../assets/img/lll.png" />
    <!-- Popper  -->
    <script src="../../assets/js/popper.js"></script>
    <!-- TippyJS -->
    <script src="../../assets/js/tippy-bundle.umd.js"></script>
    <title>Registrar Clientes Administrador | Beatriz Fagundez</title>
</head>

<body>

    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->

    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="../panel-admin/administrador">CONSULTORIO - BEATRIZ FAGUNDEZ </a>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->

    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <!-- <div class="image">
          <img src="../../assets/img/mujerico.png" width="48" height="48" alt="User" />
        </div> -->
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo ucfirst($_SESSION['name']); ?></div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href=" ./../pages-logout"><img
                                        src="./../../assets/icons/MaterialSymbolsLightExitToApp.svg"
                                        style="width: 25px"> Cerrar Sesión</a></li>
                            <li><a href="/vetdog/vista/panel-admin/edit-admin.php" style="display: flex;gap: 5px;"><img
                                        src="./../../assets/icons/IconParkSolidConfig.svg" style="width: 25px">Editar
                                    perfil</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MENÚ DE NAVEGACIÓN</li>
                    <li>
                        <a href="../panel-admin/administrador">
                            <i class="material-icons">home</i>
                            <span>INICIO</span>
                        </a>
                    </li>
                   
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">inbox</i>
                            <span>PRODUCTOS</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="../productos/nuevo">Registrar</a>
                            </li>
                            <li>
                                <a href="../../folder/productos">Listar / Modificar</a>
                            </li>
                        </ul>
                    </li>
                   
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">low_priority</i>
                            <span>CATEGORÍAS</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="../categorias/nuevo">Registrar</a>
                            </li>
                            <li>
                                <a href="../../folder/categorias">Listar / Modificar</a>
                            </li>

                        </ul>
                    </li>
                   
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">supervisor_account</i>
                            <span>CLIENTES</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="../clientes/nuevo">Registrar</a>
                            </li>
                            <li>
                                <a href="../../folder/clientes">Listar / Modificar</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">person_pin</i>
                            <span>VETERINARIOS</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="../veterinarios/nuevo">Registrar</a>
                            </li>
                            <li>
                                <a href="../../folder/veterinarios">Listar / Modificar</a>
                            </li>
                        </ul>
                    </li>
                   
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">flutter_dash</i>
                            <span>MASCOTAS</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="../mascotas/nuevo">Registrar</a>
                            </li>
                            <li>
                                <a href="../../folder/mascotas">Listar / Modificar</a>
                            </li>
                            <li>
                                <a href="../../folder/tipo">Tipos</a>
                            </li>
                            <li>
                                <a href="../../folder/raza">Razas</a>
                            </li>
                            <li>
                                <a href="../mascotas/animales_table.php">Mostrar Adopciones</a>
                            </li>
                            <li>
                                <a href="../mascotas/animales_insert.php">Agregar Adopción</a>
                            </li>
                            <li>
                                <a href="../mascotas/adopcion.php">Solicitudes</a>
                            </li>

                        </ul>
                    </li>
                   
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">calendar_today</i>
                            <span>CITAS</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="../citas/nuevo">Registrar</a>
                            </li>
                            <li>
                                <a href="../../folder/citas">Listar / Modificar</a>
                            </li>
                            <li>
                                <a href="../../folder/servicio">Servicio</a>
                            </li>
                            <li>
                                <?php
                                $sql = "SELECT * FROM quotes AS q WHERE q.vetID IS NULL ORDER BY q.dateCreation DESC";
                                $results = mysqli_query($conn, $sql);
                                $numberRequest = mysqli_num_rows($results);
                                ?>
                                <a href="./../citas/solicitud.php"
                                    style="display: flex;align-items:center;gap:5px">Solicitudes <span
                                        style="display: grid;place-items:center;margin: 0;color:#b00"><?= $numberRequest ?></span></a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">assessment</i>
                            <span>BITÁCORA</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="./../audit/mostrar.php">Mostrar</a>
                            </li>
                        </ul>
                    </li>

                    <aside id="rightsidebar" class="right-sidebar"></aside>
            </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>ANIMALES REGISTRADOS</h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Nº</th>
                                            <th class="text-center">Nombre</th>
                                            <th class="text-center">Edad</th>
                                            <th class="text-center">Tipo</th>
                                            <th class="text-center">Condición</th>
                                            <th class="text-center">Imagen</th>
                                            <th class="text-center">Estado</th>
                                            <th class="text-center">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($animales as $index => $animal): ?>
                                            <tr>
                                                <td class="text-center"><?= $index + 1 ?></td>
                                                <td class="text-center"><?= $animal['nombre'] ?></td>
                                                <td class="text-center"><?= $animal['edad'] ?></td>
                                                <td class="text-center"><?= $animal['tipo'] ?></td>
                                                <td class="text-center"><?= $animal['condicion'] ?></td>
                                                <td class="text-center"><img
                                                        src="../../assets/img/adopcion/<?= $animal['imagen'] ?>" width="50"
                                                        height="50"></td>
                                                <td class="text-center"><?= $animal['estado'] ?></td>
                                                <td class="text-center">
                                                    <a href="animales_update.php?id=<?= $animal['id_animal'] ?>"
                                                    class="btn bg-blue btn-circle waves-effect waves-circle waves-float btnEdit">
                                                    <i class="material-icons">autorenew</i></a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
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
    <script src="../../plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="../../assets/plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="../../assets/plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="../../assets/plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="../../assets/plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>
    <script src="../../assets/js/admin.js"></script>
    <script src="../../assets/js/demo.js"></script>
    <script>
        $(document).ready(function () {
            $('.dataTable').DataTable();
        });
    </script>
</body>

</html>