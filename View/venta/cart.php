<?php
session_start();

if (!isset($_SESSION['adminID']))
    header('location: ../login.php');
require_once '../../assets/db/connectionMysql.php';

?>

<body class="theme-red">

<?php include '../../Includes/Head2.php'; ?>
<?php include '../../Includes/Loader.php'; ?>

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
                    <li><a href="javascript:void(0);" class="js-search" data-close="true"><i
                                class="material-icons">search</i></a></li>
                </ul>
            </div>
        </div>
    </nav>

    <?php include '../../Includes/Sidebar2.php'; ?>

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
                                            <tr>
                                                <th class="text-center">FOTO</th>
                                                <th class="text-center">PRODUCTO</th>
                                                <th class="text-center">CANTIDAD</th>
                                                <th class="text-center">PRECIO</th>
                                                <th class="text-center">REMOVER</th>
                                                <th class="text-center">STOCK</th>
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
                                                        <?php echo "<img src='../../assets/img/subidas/" . $r->foto . "'width='50'"; ?>
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
                                                                class="btn btn-danger"><i class="material-icons">delete</i></a>
                                                        </div>
                                                    </td>
                                                    <th class="text-center"><?php echo $r->stock; ?></th>
                                                    <td class="text-center">$/. <?php echo $c["canti"] * $r->precV; ?></td>
                                                    <?php $total = $total + ($c["canti"] * $r->precV); ?>
                                                <?php endforeach; ?>
                                            </tr>
                                            <tr>
                                                <td colspan="3" align="right">
                                                    <h3>Total:</h3>
                                                </td>
                                                <td align="right">
                                                    <h3>$/. <?php echo number_format($total, 2); ?></h3>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <div class="panel-heading" style="background-color:#2b2b2b;">
                                        <h4 class="panel-title"></h4>
                                        <h1 id="big_total" class="panel-title text-center text-black text-white"
                                            style="font-size:42px; color:#ffff;"> $/.
                                            <?php echo number_format($total, 2); ?></h1>
                                    </div>
                                    <hr>
                                    <form class="form-horizontal" method="post" autocomplete="off" action="process.php">
                                        <div class="form-group">
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-success" style="border-radius: 30px;">Facturar venta</button>
                                                <button onclick="window.location.href='nuevo'"
                                                    class="btn btn-primary" style="border-radius: 30px;">Seguir comprando</button>
                                            </div>
                                        </div>
                                        <div class="form-group" style="display:none;">
                                            <label for="inputEmail3" class="col-sm-2 control-label">Estado</label>
                                            <div class="col-sm-5">
                                                <input type="text" name="estado" class="form-control" value="1">
                                            </div>
                                        </div>
                                        <div class="col-md-2" id="id_due" style="display:none;">
                                            <div class="form-group">
                                                <label class="control-label">ID</label>
                                                <select class="form-control form-control-line" id="id_due" name="id_due">
                                                </select>
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
                                                    <option value="efectivo">EFECTIVO</option>
                                                    <option value="tarjeta">TARJETA DE DEBITO / CREDITO</option>
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
                                    </form>
                                <?php else: ?>
                                    <p class="alert alert-warning">El carrito esta vacio.</p>
                                <?php endif; ?>
                                <br>
                                <h3>Datos del Cliente <a style="margin-left:35px; border-radius: 30px;" href="#new" data-toggle="modal"
                                        title="New" class="btn btn-primary"><i class="material-icons">add_circle</i>
                                        Nuevo</a>
                                    <?php include('../venta/modal.php'); ?></h3>
                                <div class="row clearfix">
                                    <div class="col-sm-4">
                                        <label class="control-label">Nombre del cliente</label>
                                        <select name="id_due" required class="form-control show-tick"
                                            onchange="showselect(this.value)">
                                            <option value="">-- Seleccione un cliente --</option>
                                            <?php include "../funciones/cliente.php" ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="control-label">Fecha</label>
                                            <div class="form-line">
                                                <input type="text"
                                                    value="<?php $fechaActual = date('Y-m-d');
                                                    echo $fechaActual; ?>"
                                                    class="form-control" placeholder="fecha..." />
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


    <script src="../../assets/plugins/jquery/jquery.min.js"></script>
    <script src="../../assets/js/card-js.min.js"></script>

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

    <?php include '../../Includes/Footer2.php'; ?>


    <script type="text/javascript">
        function showselect(str) {
            var xmlhttp;
            if (str == "") {
                document.getElementById("txtHint").innerHTML = "";
                return;
            }
            if (window.XMLHttpRequest) {
                xmlhttp = new XMLHttpRequest();
            }
            else {
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("id_due").innerHTML = xmlhttp.responseText;
                }
            }
            xmlhttp.open("GET", "../funciones/cliente_ruc.php?c=" + str, true);
            xmlhttp.send();
        }
    </script>


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
            } else {
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


    <script>
        $('#buscar').click(function () {
            dni = $('#documentodni').val();
            $.ajax({
                url: '../clientes/consultarDNI',
                type: 'post',
                data: 'dni=' + dni,
                dataType: 'json',
                success: function (r) {
                    if (r.numeroDocumento == dni) {
                        $('#nombres').val(r.nombres);
                        $('#apellidoPaterno').val(r.apellidoPaterno);
                    } else {
                        alert(r.error);
                    }
                    console.log(r)
                }
            });
        });
    </script>


</body>
</html>