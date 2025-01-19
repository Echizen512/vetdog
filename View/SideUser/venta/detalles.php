<?php
session_start();

if (!isset($_SESSION['adminID']))
    header('location: ../login.php');
require_once '../../assets/db/connectionMysql.php';

?>

<?php include('./../Includes/Head.php'); ?>

<body class="theme-red">


    <?php include('./../Includes/Loader.php'); ?>

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



    <?php include('./../Includes/Nav.php'); ?>

    <?php include '../Includes/Sidebar.php'; ?>

    <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">

                <?php
                function connect()
                {
                    return new mysqli("localhost", "root", "", "vetdog");
                }
                $con = connect();
                $id = $_GET['id'];
                $sql = "SELECT  venta.fecha, venta.id_venta,venta.estado, venta.total,venta.tipoc, venta.tipopa, owner.id_due, owner.dni_due, owner.nom_due, owner.ape_due, owner.movil, owner.fijo, owner.correo, owner.direc,venta.numtarj, venta.typetarj, venta.nomtarj, venta.expmon, venta.expyear, venta.cvc, venta.recibir , venta.cambio,
                        GROUP_CONCAT( products.nompro, '..', products.codigo, '..',products.precV, '..', productos_vendidos.canti SEPARATOR '__') AS products FROM venta INNER JOIN productos_vendidos ON productos_vendidos.id_venta = venta.id_venta INNER JOIN products ON products.id_prod = productos_vendidos.id_prod INNER JOIN owner ON venta.id_due =owner.id_due  WHERE venta.id_venta= '$id' GROUP BY venta.id_venta ORDER BY venta.id_venta ";
                $query = $con->query($sql);
                $data = array();
                if ($query) {
                    while ($r = $query->fetch_object()) {
                        $data[] = $r;
                    }
                }

                ?>
                <?php if (count($data) > 0): ?>
                    <?php foreach ($data as $d): ?>

                        <div class="col-xs-12 col-sm-3">
                            <div class="card profile-card">
                                <div class="profile-header">&nbsp;</div>
                                <div class="profile-body">
                                    <div class="image-area">
                                        <img src="../../assets/img/logo.png" alt="AdminBSB - Profile Image" />
                                    </div>
                                    <div class="content-area">
                                        <h3>Admin</h3>
                                        <p>Administrator</p>
                                    </div>
                                </div>
                                <div class="profile-footer">
                                    <button class="btn btn-success btn-lg waves-effect btn-block">ACTIVO</button>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <label class="control-label">VETERINARIA VETDOG S.A.C</label>

                        </div>
                        <div class="col-sm-4">
                            <label class="control-label"><?php echo $d->tipoc; ?> Electronico</label>
                            <a style="margin-top:20px;" href="../venta/report?id=<?php echo $d->id_venta; ?>" title="Reporte"
                                class="btn btn-danger"><i class="material-icons">print</i> Imprimir<span><img
                                        src="../../assets/img/cargando.gif" class="cargando hide"></span></a>

                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="nombres" class="col-sm-5 control-label">RUC:</label>
                                <div class="col-sm-7">
                                    <div class="form-line">
                                        <input type="text" class="form-control" disabled value="10099876565">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="nombres" class="col-sm-5 control-label">CLIENTE:</label>
                                <div class="col-sm-7">
                                    <div class="form-line">
                                        <input type="text" class="form-control" disabled
                                            value="<?php echo $d->nom_due; ?>&nbsp;<?php echo $d->ape_due; ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="nombres" class="col-sm-5 control-label">TIPO DE PAGO:</label>
                                <div class="col-sm-7">
                                    <div class="form-line">
                                        <input type="text" class="form-control" disabled value="<?php echo $d->tipopa; ?>">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                            <div class="card">
                                <div class="header">
                                </div>
                                <div class="body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped table-hover dataTable">
                                            <thead>
                                                <tr>
                                                    <th>FECHA</th>
                                                    <th>PRODUCTOS VENDIDOS</th>
                                                    <th>TOTAL</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><?php echo $d->fecha; ?></td>
                                                    <td>
                                                        <table class="table table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th>Nombre</th>
                                                                    <th>Precio</th>
                                                                    <th>Cantidad</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php foreach (explode("__", $d->products) as $articulosConcatenados) {
                                                                    $products = explode("..", $articulosConcatenados)
                                                                        ?>
                                                                    <tr>
                                                                        <td><?php echo $products[0] ?></td>
                                                                        <td>S/.<?php echo $products[2] ?></td>
                                                                        <td><?php echo $products[3] ?></td>
                                                                    </tr>
                                                                <?php } ?>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                    <td><?php echo $d->total; ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    <?php endforeach; ?>
                                </div>
                            <?php else: ?>
                                <span
                                    class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-700">
                                    No hay datos
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a type="button" href="../../folder/venta" class="btn bg-blue"><i class="material-icons">arrow_back</i> Regresar
            atrás </a>
    </section>


    <?php include('./../Includes/Footer.php'); ?>

</body>

</html>