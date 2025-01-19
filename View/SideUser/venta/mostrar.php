<?php
session_start();
if (!isset($_SESSION['ownerID']))
    header('location: ./../login.php');
require_once './../../../assets/db/connectionMysql.php';

$id_due = $_SESSION['ownerID'];

?>


<!DOCTYPE html>
<html lang="es-ES">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet"
        type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <link href="../../../assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="../../../assets/plugins/node-waves/waves.css" rel="stylesheet" />
    <link href="../../../assets/plugins/animate-css/animate.css" rel="stylesheet" />
    <link href="../../../assets/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
    <link href="../../../css/style.css" rel="stylesheet">
    <link href="../../../assets/css/fullcalendar.css" rel="stylesheet" />
    <link href="../../../assets/css/themes/all-themes.css" rel="stylesheet" />
    <link rel="stylesheet" href="../../../assets/css/swal.css">
    <link rel="shortcut icon" type="image/x-icon" href="../../../assets/img/lll.png" />
    <script src="../../../assets/js/popper.js"></script>
    <script src="../../../assets/js/tippy-bundle.umd.js"></script>
    <title>Vetdog - Beatriz Fagundez</title>
</head>

<body class="theme-red">




    <div class="overlay"></div>


    <!-- LUPA -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons"></i>
        </div>
        <input type="text" placeholder="Buscar...">
        <div class="close-search">
            <i class="material-icons">X</i>
        </div>
    </div>
    <!-- //LUPA -->

    <section>

        <aside id="leftsidebar" class="sidebar">

            <div class="menu">
                <ul class="list">
                    <li class="header">MENÚ DE NAVEGACIÓN</li>
                    <li>
                        <a href="./../home.php">
                            <i class="material-icons">home</i>
                            <span>INICIO</span>
                        </a>
                    </li>

                    <li>
                        <a href="./../editProfile.php">
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
                                <a href="./../pets/register.php">Registrar</a>
                            </li>
                            <li>
                                <a href="./../pets/list.php">Listar / Modificar</a>
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
                                <a href="../quotes/newQuote.php">Pedir Cita</a>
                            </li>
                            <li>
                                <a href="../quotes/mostrar.php">Listar</a>
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
                                <a href="../sales/sales.php">Compras</a>
                                <a href="../venta/nuevo.php">Nueva Compra</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="./../Veterinarian.php">
                            <i class="material-icons">chat</i>
                            <span>CHAT</span>
                        </a>
                    </li>
                    <li>
                        <a href="./../closeSession.php">
                            <i class="material-icons">input</i>
                            <span>Cerrar Sesión</span>
                        </a>
                    </li>
                    <aside id="rightsidebar" class="right-sidebar"></aside>
            </div>
    </section>


    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="../panel-admin/administrador"> CONSULTORIO - BEATRIZ FAGUNDEZ </a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">

                    <!-- Call Search -->
                    <li><a href="javascript:void(0);" class="js-search" data-close="true"><i
                                class="material-icons">search</i></a></li>
                    <!-- #END# Call Search -->
                </ul>
            </div>
        </div>
    </nav>






    <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Listado de ventas :
                            </h2><br>

                        </div>

                        <div class="body">
                            <div class="table-responsive">
                                <?php
                                $contraseña = "";
                                $usuario = "root";
                                $nombre_base_de_datos = "vetdog";
                                try {
                                    $base_de_datos = new PDO('mysql:host=localhost;dbname=' . $nombre_base_de_datos, $usuario, $contraseña);
                                    $base_de_datos->query("set names utf8;");
                                    $base_de_datos->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
                                    $base_de_datos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $base_de_datos->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
                                } catch (Exception $e) {
                                    echo "Ocurrió algo con la base de datos: " . $e->getMessage();
                                }

                                $sentencia = $base_de_datos->query("SELECT fecha, id_venta, estado, total, tipoc FROM venta ORDER BY id_venta DESC;");
                                $ventas = $sentencia->fetchAll(PDO::FETCH_OBJ);
                                ?>
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th class="text-center">COMPROBANTE</th>
                                            <th class="text-center">FECHA</th>
                                            <th class="text-center">TOTAL</th>
                                            <th class="text-center">ESTADO</th>
                                            <!--- <th class="text-center">DETALLES</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($ventas as $venta) { ?>
                                            <tr>
                                                <td class="text-center"><?php echo $venta->tipoc ?></td>
                                                <td class="text-center">
                                                    <?php echo (new DateTime($venta->fecha))->format('d/m/Y'); ?></td>

                                                <td class="text-center"><?php echo $venta->total ?></td>
                                                <td class="text-center">
                                                    <?php if ($venta->estado == 1) { ?>
                                                        <span class="label label-success">Aceptado</span>
                                                    <?php } else { ?>
                                                        <span class="label label-danger">Anulado</span>
                                                    <?php } ?>
                                                </td>
                                                <td class="text-center">
                                                    <a type="button"
                                                        href="../vista/venta/detalles?id=<?php echo $venta->id_venta; ?>"
                                                        class="btn bg-blue btn-circle waves-effect waves-circle waves-float">
                                                        <i class="material-icons">remove_red_eye</i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </section>

    <script src="../../../assets/plugins/jquery/jquery.min.js"></script>
    <script src="../../../assets/plugins/bootstrap/js/bootstrap.js"></script>
    <script src="../../../assets/plugins/bootstrap-select/js/bootstrap-select.js"></script>
    <script src="../../../assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
    <script src="../../../assets/plugins/node-waves/waves.js"></script>
    <script src="../../../assets/plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="../../../assets/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="../../../assets/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="../../../assets/plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="../../../plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="../../../assets/plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="../../../assets/plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="../../../assets/plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="../../../assets/plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>
    <script src="../../../assets/js/admin.js"></script>
    <script src="../../../assets/js/pages/tables/jquery-datatable.js"></script>
    <script src="../../../assets/js/demo.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

</body>

</html>