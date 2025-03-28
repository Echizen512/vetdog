﻿<?php
session_start();
if (!isset($_SESSION['ownerID']))
    header('location: ./../login.php');
require_once './../../../assets/db/connectionMysql.php';

$id_due = $_SESSION['ownerID'];

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Vetdog - Beatriz Fagundez</title>
    <link href="../../../assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css"
        rel="stylesheet" />
    <link href="../../../assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet"
        type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <link href="../../../assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="../../../assets/plugins/node-waves/waves.css" rel="stylesheet" />
    <link href="../../../assets/plugins/animate-css/animate.css" rel="stylesheet" />
    <link href="../../assets/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
    <link href="../../../css/style.css" rel="stylesheet">
    <link href="../../../assets/css/themes/all-themes.css" rel="stylesheet" />
    <link rel="shortcut icon" type="image/x-icon" href="../../../assets/img/lll.png" />
    <link href="../../../assets/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
    <link href="../../../assets/css/card-js.min.css" rel="stylesheet" type="text/css" />
    <style type="text/css">
        #efectivo,
        #tarjeta {
            display: none;
            margin-left: 10px;
        }
    </style>
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
                                Facturar ventas :
                            </h2><br>
                        </div>
                        <div class="body">
                            <?php
                            $con = new mysqli("localhost", "root", "", "vetdog");
                            $products = $con->query("SELECT products.id_prod, products.codigo,products.foto,products.nompro, products.stock, category.id_cate, category.nomcate, products.fere, supplier.id_prove, supplier.nomprove, supplier.ruc,supplier.ruc, supplier.pais, supplier.corre FROM products INNER JOIN category ON products.id_cate = category.id_cate INNER JOIN supplier ON products.id_prove = supplier.id_prove");
                            if (isset($_SESSION["carts"]) && !empty($_SESSION["carts"])):
                                ?>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                        <thead>
                                            <tr class="bg-info">
                                                <th class="text-center">FOTO</th>
                                                <th class="text-center">PRODUCTO</th>
                                                <th class="text-center">CANTIDAD</th>
                                                <th class="text-center">PRECIO</th>
                                                <th class="text-center">REMOVER</th>
                                                <th class="text-center">SUBTOTAL</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $total = 0; ?>
                                            <?php
                                            foreach ($_SESSION["carts"] as $c):
                                                $products = $con->query("SELECT products.id_prod, products.codigo,products.foto,products.nompro, products.stock, products.precV, products.preciC,category.id_cate, category.nomcate, products.fere FROM products INNER JOIN category ON products.id_cate = category.id_cate  where id_prod=$c[id_prod]");
                                                $r = $products->fetch_object();
                                                ?>
                                                <tr>
                                                    <td class="text-center">
                                                        <?php echo "<img src='../../../assets/img/subidas/" . $r->foto . "'width='50'"; ?>
                                                    </td>
                                                    <td class="text-center"><?php echo $r->nompro; ?></td>
                                                    <th class="text-center"><?php echo $c["canti"]; ?></th>
                                                    <td class="text-center">$/. <?php echo $r->precV; ?></td>
                                                    <td style="width:260px;">
                                                        <?php
                                                        $founds = false;
                                                        foreach ($_SESSION["carts"] as $c) {
                                                            if ($c["id_prod"] == $r->id_prod) {
                                                                $founds = true;
                                                                break;
                                                            }
                                                            if ($c["id_prod"] == $r->stock) {
                                                                $founds = true;
                                                                break;
                                                            }
                                                        }
                                                        ?>
                                                        <div class="text-center">
                                                            <a href="delfromcart?id=<?php echo $c["id_prod"]; ?>"
                                                                class="btn btn-danger" style="border-radius: 30px;"><i class="material-icons">delete</i></a>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">$/. <?php echo $c["canti"] * $r->precV; ?></td>
                                                    <?php $total = $total + ($c["canti"] * $r->precV); ?>
                                                <?php endforeach; ?>
                                            </tr>
                                            <tr>
                                                <td colspan="3" align="right" class="bg-info">
                                                    <h3>Total:</h3>
                                                </td>
                                                <td align="right" class="bg-success">
                                                    <h3>$/. <?php echo number_format($total, 2); ?></h3>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <hr>
                                    <form class="form-horizontal" method="post" autocomplete="off" action="process.php">
                                        
                                        <div class="form-group" style="display:none;">
                                            <label for="inputEmail3" class="col-sm-2 control-label">Estado</label>
                                            <div class="col-sm-5">
                                                <input type="text" name="estado" class="form-control" value="1">
                                            </div>
                                        </div>
                                        <div class="row clearfix">
                                    <div class="col-sm-4">
                                        <input type="hidden" name="id_due" value="<?php echo $id_due; ?>" />
                                        
                                    </div>
                                </div>
                                        <div class="form-group" style="display:none;">
                                            <label class="control-label">Cati</label>
                                            <input type="text" class="form-control" value="<?php echo $c["canti"]; ?>"
                                                id="canti" name="canti">
                                        </div>
                                        <div class="form-group" style="display:none;">
                                            <label class="control-label">Total</label>
                                            <input type="text" class="form-control"
                                                value="<?php echo number_format($total, 2); ?>" name="total">
                                        </div>
                                        <div class="row clearfix">
                                            <h3 class="col-sm-12">Datos de la Venta </h3>
                                            <div class="col-sm-3">
                                                <label class="control-label">Tipo Comprobante</label>
                                                <select name="tipoc" required class="form-control show-tick">
                                                    <option value="">Seleccione un tipo</option>
                                                    <option value="Factura">FACTURA</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-4">
                                                <label class="control-label">Forma de Pago</label>
                                                <select id="selector" name="tipopa" required class="form-control show-tick"
                                                    onchange="verSeleccion()">
                                                    <option value="">-- Seleccione una forma --</option>
                                                    <option value="pagomovil">PAGO MÓVIL</option>
                                                </select>
                                            </div>
                                            <?php
                                            define("DB_HOST", "localhost");//DB_HOST:  generalmente suele ser "127.0.0.1"
                                            define("DB_NAME", "vetdog");//Nombre de la base de datos
                                            define("DB_USER", "root");//Usuario de tu base de datos
                                            define("DB_PASS", "");//Contraseña del usuario de la base de datos
                                            $con = @mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
                                            if (!$con) {
                                                die("imposible conectarse: " . mysqli_error($con));
                                            }
                                            if (@mysqli_connect_errno()) {
                                                die("Conexión falló: " . mysqli_connect_errno() . " : " . mysqli_connect_error());
                                            }
                                            $sql = mysqli_query($con, "select LAST_INSERT_ID(id_venta) as last from venta order by id_venta desc limit 0,1");
                                            $rws = mysqli_fetch_array($sql);
                                            $numero = $rws['last'] + 1;
                                            ?>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label">Nº de factura</label>
                                                    <div class="form-line nfactura">
                                                        <input type="text" readonly name="numfact"
                                                            value="<?php echo $numero; ?>" class="form-control"
                                                            placeholder="Nº factura..." />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="form-group" id="efectivo">
                                                    <label class="control-label">A Pagar </label>
                                                    <div class="form-line">
                                                        <input type="number" id="caja1" disabled name="pago"
                                                            value="<?php echo number_format($total, 2); ?>"
                                                            class="form-control monto" />
                                                    </div>
                                                    <label class="control-label">Efectivo Recibido </label>
                                                    <div class="form-line">
                                                        <input type="number" min="0" id="caja2" value="0" name="recibir"
                                                            class="form-control monto" />
                                                    </div>
                                                    <label class="control-label">Cambio </label>
                                                    <div class="form-line">
                                                        <input type="text" name="cambio" id="caja3" value="0"
                                                            class="form-control" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-5" id="pagomovil" style="display: none; padding: 15px;">
        <h4>Datos de Pago Móvil</h4>
        <p><strong>Nombre:</strong> Vetdog</p>
        <p><strong>DNI:</strong> 30.091.390</p>
        <p><strong>Banco:</strong> 0102 (Venezuela)</p>
        <p><strong>Teléfono:</strong> 0424-3363970</p>
        
        <label class="control-label">Número de Referencia:</label>
        <div class="form-line">
        <input type="text" name="ref" id="ref" class="form-control" placeholder="Ingrese el número de referencia" required>

        </div>
    </div>
                                        <div class="row clearfix">
                                            <div class="col-sm-5" style="margin-left:15px;">
                                                <div class="form-group" id="tarjeta">
                                                    <label class="control-label">A Pagar </label>
                                                    <div class="form-line">
                                                        <input type="text" disabled
                                                            value="<?php echo number_format($total, 2); ?>"
                                                            class="form-control" />
                                                    </div>
                                                    <label class="control-label">Efectivo Recibido </label>
                                                    <div class="form-line">
                                                        <input type="text" disabled class="form-control" />
                                                    </div>
                                                    <label class="control-label">Cambio </label>
                                                    <div class="form-line">
                                                        <input type="text" disabled class="form-control" />
                                                    </div>
                                                    <table style="margin-left:15px; margin-top:20px;">
                                                        <tr>
                                                            <td class="text-center">
                                                                <div class="panel">
                                                                    <div id="my-card-1" class="card-js"
                                                                        data-capture-name="true"></div>
                                                                </div>
                                                                <div style="margin-top: 40px">
                                                                    <table style="width: 310px">
                                                                        <tr>
                                                                            <td class="text-center"><input type="hidden"
                                                                                    name="numtarj" id="card-number-1"
                                                                                    readonly /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="text-center"><input type="hidden"
                                                                                    name="typetarj" id="card-type-1"
                                                                                    readonly /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="text-center"><input type="hidden"
                                                                                    name="nomtarj" id="name-1" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="text-center"><input type="hidden"
                                                                                    name="expmon" id="expiry-month-1"
                                                                                    readonly /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="text-center"><input type="hidden"
                                                                                    name="expyear" id="expiry-year-1"
                                                                                    readonly /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="text-center"><input type="hidden"
                                                                                    name="cvc" id="cvc-1" readonly /></td>
                                                                        </tr>
                                                                    </table>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-success"
                                                    style="border-radius: 30px;">Facturar venta</button>
                                                <button onclick="window.location.href='nuevo'" class="btn btn-primary"
                                                    style="border-radius: 30px;">Seguir comprando</button>
                                            </div>
                                        </div>
                                    </form>
                                <?php else: ?>
                                    <p class="alert alert-warning">El carrito esta vacio.</p>
                                <?php endif; ?>
                                <br>
                        
                                <div class="row clearfix">
                                    <div class="col-sm-4">
                                        <input type="hidden" name="id_due" value="<?php echo $id_due; ?>" />
            
                                    </div>
                                </div> 
                                <div class="col-sm-4">
                                    <div class="form-group">
                                            <input type="hidden" value="<?php $fechaActual = date('Y-m-d');
                                            echo $fechaActual; ?>" class="form-control" placeholder="fecha..." />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>


    <script src="../../../assets/plugins/jquery/jquery.min.js"></script>
    <script src="../../../assets/js/card-js.min.js"></script>

    <script>
        $(function () {
            $("#read-btn-1").click(function () {
                var myCard = $('#my-card-1');
                var cardNumber = myCard.CardJs('cardNumber');
                var cardType = myCard.CardJs('cardType');
                var name = myCard.CardJs('name');
                var expiryMonth = myCard.CardJs('expiryMonth');
                var expiryYear = myCard.CardJs('expiryYear');
                var cvc = myCard.CardJs('cvc');
                $("#card-number-1").val(cardNumber);
                $("#card-type-1").val(cardType);
                $("#name-1").val(name);
                $("#expiry-month-1").val(expiryMonth);
                $("#expiry-year-1").val(expiryYear);
                $("#cvc-1").val(cvc);
            });
            $("#read-btn-2").click(function () {
                var myCard = $('#my-card-2');
                var cardNumber = myCard.CardJs('cardNumber');
                var cardType = myCard.CardJs('cardType');
                var name = myCard.CardJs('name');
                var expiryMonth = myCard.CardJs('expiryMonth');
                var expiryYear = myCard.CardJs('expiryYear');
                var cvc = myCard.CardJs('cvc');
                $("#card-number-2").val(cardNumber);
                $("#card-type-2").val(cardType);
                $("#name-2").val(name);
                $("#expiry-month-2").val(expiryMonth);
                $("#expiry-year-2").val(expiryYear);
                $("#cvc-2").val(cvc);
            });
        });
    </script>

    <script src="../../../assets/plugins/bootstrap/js/bootstrap.js"></script>
    <script src="../../../assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
    <script src="../../../assets/plugins/node-waves/waves.js"></script>
    <script src="../../../assets/plugins/autosize/autosize.js"></script>
    <script src="../../../assets/plugins/momentjs/moment.js"></script>
    <script
        src="../../../assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
    <script src="../../../assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    <script src="../../../assets/js/admin.js"></script>
    <script src="../../../assets/js/demo.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>






    <script type="text/javascript">
        function verSeleccion() {
            var efectivo = document.getElementById('efectivo');
            var tarjeta = document.getElementById('tarjeta');
            var seleccionado = document.getElementById("selector").value;
            if (seleccionado == 'efectivo') {
                efectivo.style.display = 'block';
                tarjeta.style.display = 'none';
            } else if (seleccionado == 'tarjeta') {
                efectivo.style.display = 'none';
                tarjeta.style.display = 'block';
            }
            else if (seleccionado == 'pagomovil') {
            efectivo.style.display = 'none';
            tarjeta.style.display = 'none';
            pagomovil.style.display = 'block';
            
        }
            else {
                tarjeta.style.display = 'none';
                efectivo.style.display = 'none';
            }
        }
    </script>

    <script>
        let precio1 = document.getElementById("caja1")
        let precio2 = document.getElementById("caja2")
        let precio3 = document.getElementById("caja3")
        precio2.addEventListener("change", () => {
            precio3.value = parseFloat(precio2.value) - parseFloat(precio1.value)
        })
    </script>

    <?php
    if (isset($_POST["agregar"])) {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "vetdog";
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $dni_due = $_POST['dni_due'];
        $nom_due = $_POST['nom_due'];
        $ape_due = $_POST['ape_due'];
        $estado = $_POST['estado'];
        $result = mysqli_query($conn);
        ?>


        <?php
        if (mysqli_num_rows($result) > 0) {
            if ($result) {
                ?>

                <script type="text/javascript">
                    swal("Oops...!", "Ya existe el registro a agregar!", "error")
                </script>

                <?php
            }
        } else {
            $sql2 = "insert into owner(dni_due,nom_due,ape_due,estado) 
        values ('$dni_due','$nom_due','$ape_due','$estado')";
            if (mysqli_query($conn, $sql2)) {
                if ($sql2) {
                    ?>

                    <script type="text/javascript">
                        swal("¡Registrado!", "Agregado correctamente", "success").then(function () {
                            window.location = "../venta/cart";
                        });
                    </script>


                    <?php
                } else {
                    ?>
                    <script type="text/javascript">
                        swal("Oops...!", "No se pudo guardar!", "error")
                    </script>
                    <?php
                }
            } else {
                echo "Error: " . $sql2 . "" . mysqli_error($conn);
            }
        }
        $conn->close();
    }
    ?>

</body>
</html>