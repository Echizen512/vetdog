<?php
require_once './../../assets/db/connectionMysql.php';
$sql = "SELECT * FROM veterinarian";
$query = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="es-ES">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet"
        type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <link href="../../assets/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
    <link href="../../assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="../../assets/plugins/node-waves/waves.css" rel="stylesheet" />
    <link href="../../assets/plugins/animate-css/animate.css" rel="stylesheet" />
    <link href="../../css/style.css" rel="stylesheet">
    <link href="../../assets/css/themes/all-themes.css" rel="stylesheet" />
    <link rel="shortcut icon" type="image/x-icon" href="../../assets/img/lll.png" />
    <script src="../../assets/js/chart.js"></script>
    <link href="../../assets/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
    <title>Inicio | Beatriz Fagundez</title>
</head>

<body class="theme-red">
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Cargando...</p>
        </div>
    </div>
    <div class="overlay"></div>
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="./home.php"> INICIO - USUARIO</a>
            </div>
        </div>
    </nav>
    <section>
        <aside id="leftsidebar" class="sidebar">
            <article class="menu">
                <ul class="list">
                    <li class="header">MENÚ DE NAVEGACIÓN</li>
                    <li>
                        <a href="./home.php">
                            <i class="material-icons">home</i>
                            <span>INICIO</span>
                        </a>
                    </li>
                    <li>
                        <a href="./editProfile.php">
                            <i class="material-icons">person</i>
                            <span>PERFIL</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">flutter_dash</i>
                            <span>MASCOTAS</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="./pets/register.php">Registrar</a>
                            </li>
                            <li>
                                <a href="./pets/list.php">Listar / Modificar</a>
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
                                <a href="./quotes/newQuote.php">Pedir Cita</a>
                            </li>
                            <li>
                                <a href="./quotes/mostrar.php">Listar</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">store</i>
                            <span>Tienda</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="./sales/sales.php">Compras</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="./Veterinarian.php">
                            <i class="material-icons">chat</i>
                            <span>CHAT</span>
                        </a>
                    </li>
                    <li>
                        <a href="./closeSession.php">
                            <i class="material-icons">input</i>
                            <span>Cerrar Sesión</span>
                        </a>
                    </li>
                    <aside id="rightsidebar" class="right-sidebar"></aside>
            </article>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2><i class="fas fa-paw text-primary"></i> Veterinarios Disponibles:</h2>
                            <br>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable"
                                    id="veterinariosTable">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Nº</th>
                                            <th class="text-center">Nombre</th>
                                            <th class="text-center">Teléfono</th>
                                            <th class="text-center">Correo</th>
                                            <th class="text-center">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (mysqli_num_rows($query) > 0): ?>
                                            <?php $index = 1; ?>
                                            <?php while ($veterinario = mysqli_fetch_assoc($query)): ?>
                                                <tr>
                                                    <td class="text-center"><?php echo $index++; ?></td>
                                                    <td class="text-center">
                                                        <?php echo htmlspecialchars($veterinario['nomvet']) . ' ' . htmlspecialchars($veterinario['apevet']); ?>
                                                    </td>
                                                    <td class="text-center">
                                                        <?php echo htmlspecialchars($veterinario['movil']); ?>
                                                    </td>
                                                    <td class="text-center">
                                                        <?php echo htmlspecialchars($veterinario['correo']); ?>
                                                    </td>
                                                    <td class="text-center">
                                                        <a href="chat.php?user_id=<?php echo $veterinario['id_vet']; ?>"
                                                            class="btn btn-primary btn-sm">
                                                            <i class="fas fa-comments"></i> Contactar
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php endwhile; ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="6" class="text-center">No hay veterinarios disponibles.</td>
                                            </tr>
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
    <script src="../../assets/js/funciones/tipo.js"></script>
    <script src="../../assets/plugins/bootstrap/js/bootstrap.js"></script>
    <script src="../../assets/plugins/bootstrap-select/js/bootstrap-select.js"></script>
    <script src="../../assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
    <script src="../../assets/plugins/node-waves/waves.js"></script>
    <script src="../../assets/plugins/autosize/autosize.js"></script>
    <script src="../../assets/js/admin.js"></script>
    <script src="../../assets/js/pages/forms/basic-form-elements.js"></script>
    <script src="../../assets/js/demo.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="../../assets/plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="../../assets/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script>
        $(document).ready(function () {
            $('#veterinariosTable').DataTable({
                "language": {
                    "url": "../../assets/plugins/jquery-datatable/lang/Spanish.json"  // Cambia esta ruta si es necesario
                },
                "paging": true,
                "searching": true,
                "ordering": true
            });
        });
    </script>

</body>

</html>