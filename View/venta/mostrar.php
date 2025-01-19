<?php
session_start();

if (!isset($_SESSION['adminID']))
    header('location: ../login.php');
require_once '../assets/db/connectionMysql.php';

?>

<?php include('./../Includes/Head.php'); ?>

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


    <?php include '../Includes/Sidebar.php'; ?>




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


    <script src="../assets/plugins/jquery/jquery.min.js"></script>

    <script src="../assets/plugins/bootstrap/js/bootstrap.js"></script>
    <!-- Select Plugin Js -->
    <script src="../assets/plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <script src="../assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <script src="../assets/plugins/node-waves/waves.js"></script>

    <!-- Jquery DataTable Plugin Js -->
    <script src="../assets/plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="../assets/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="../assets/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="../assets/plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="../plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="../assets/plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="../assets/plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="../assets/plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="../assets/plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>


    <script src="../assets/js/admin.js"></script>
    <script src="../assets/js/pages/tables/jquery-datatable.js"></script>


    <script src="../assets/js/demo.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <!--------------------------------script edit cate----------------------------->

</body>

</html>