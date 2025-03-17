<?php
session_start();

if (!isset($_SESSION['adminID']))
    header('location: ../login.php');
require_once '../../assets/db/connectionMysql.php';

?>

<?php include './Includes/Head.php'; ?>

<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Carrito de compras :
                        </h2><br>

                    </div>
                    <div class="body">
                        <?php
                        $con = new mysqli("localhost", "root", "", "vetdog");
                        $products = $con->query("SELECT products.id_prod, products.codigo,products.foto,products.nompro, products.stock, category.id_cate, category.nomcate, products.fere, supplier.id_prove, supplier.nomprove, supplier.ruc,supplier.ruc, supplier.pais, supplier.corre FROM products INNER JOIN category ON products.id_cate = category.id_cate INNER JOIN supplier ON products.id_prove = supplier.id_prove");
                        if (isset($_SESSION["cart"]) && !empty($_SESSION["cart"])):
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
                                        <th class="text-center">STOCK</th>
                                        <th class="text-center">SUBTOTAL</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $total = 0; ?>
                                    <?php
                                        foreach ($_SESSION["cart"] as $c):
                                            $products = $con->query("SELECT products.id_prod, products.codigo,products.foto,products.nompro, products.stock, products.precV, products.preciC,category.id_cate, category.nomcate, products.fere FROM products INNER JOIN category ON products.id_cate = category.id_cate  where id_prod=$c[id_prod]");
                                            $r = $products->fetch_object();
                                            ?>
                                    <tr>
                                        <td class="text-center">
                                            <?php echo "<img src='../../assets/img/subidas/" . $r->foto . "'width='50'"; ?>
                                        </td>
                                        <td class="text-center"><?php echo $r->nompro; ?></td>
                                        <th class="text-center"><?php echo $c["canti"]; ?></th>
                                        <td class="text-center">$ <?php echo $r->preciC; ?></td>
                                        <td style="width:260px;">
                                            <?php
                                                    $found = false;
                                                    foreach ($_SESSION["cart"] as $c) {
                                                        if ($c["id_prod"] == $r->id_prod) {
                                                            $found = true;
                                                            break;
                                                        }
                                                        if ($c["id_prod"] == $r->stock) {
                                                            $found = true;
                                                            break;
                                                        }
                                                    }
                                                    ?>
                                            <a href="delfromcart?id=<?php echo $c["id_prod"]; ?>"
                                                class="btn btn-danger"><i class="material-icons">delete</i></a>
                                        </td>
                                        <th class="text-center"><?php echo $r->stock; ?></th>
                                        <td class="text-center">$ <?php echo $c["canti"] * $r->preciC; ?></td>
                                        <?php $total = $total + ($c["canti"] * $r->preciC); ?>
                                        <?php endforeach; ?>
                                    </tr>
                                    <?php
                                        $url = "https://ve.dolarapi.com/v1/dolares";

                                        $ch = curl_init();
                                        curl_setopt($ch, CURLOPT_URL, $url);
                                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                                        curl_setopt($ch, CURLOPT_HTTPHEADER, [
                                            "Content-Type: application/json"
                                        ]);

                                        $response = curl_exec($ch);
                                        curl_close($ch);

                                        $dollar_rate = null;
                                        if ($response !== false) {
                                            $data = json_decode($response, true);

                                            if ($data !== null) {
                                                $dollar_rate = $data[0]['promedio']; // Tasa en bolívares
                                            } else {
                                                echo "<li>Error al convertir la respuesta JSON.</li>";
                                            }
                                        } else {
                                            echo "<li>Error al obtener los datos de la API.</li>";
                                        }

                                        // Asegúrate de que `$total` ya esté definido en tu código
                                        if ($dollar_rate !== null) {
                                            $total_in_bolivares = $total * $dollar_rate;
                                        }
                                        ?>

                                    <tr>
                                        <td colspan="3" align="right">
                                            <h3>Total:</h3>
                                        </td>
                                        <td align="right">
                                            <h3>$ <?php echo number_format($total, 2); ?></h3>
                                        </td>
                                    </tr>
                                    <?php if (isset($total_in_bolivares)): ?>
                                    <tr>
                                        <td colspan="3" align="right">
                                            <h3>Total en Bolívares:</h3>
                                        </td>
                                        <td align="right">
                                            <h3><?php echo number_format($total_in_bolivares, 2); ?></h3>
                                        </td>
                                    </tr>
                                    <?php endif; ?>

                                </tbody>
                            </table>
                            <hr>
                            <form class="form-horizontal" method="post" action="process.php">
                                <div class="row clearfix">
                                    <div class="col-sm-4">
                                        <label class="control-label">Nombre del proveedor</label>
                                        <select name="id_prove" required class="form-control show-tick"
                                            onchange="showselect(this.value)">
                                            <option value="">-- Seleccione un proveedor --</option>
                                            <?php include "../funciones/provee.php" ?>
                                        </select>
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

                                    <div class="col-sm-3">
                                        <label class="control-label">Tipo Comprobante</label>
                                        <select id="selector" name="tipoc" required class="form-control show-tick"
                                            onchange="verSeleccion()">
                                            <option value="">Seleccione un tipo</option>
                                            <option value="Factura">FACTURA</option>
                                        </select>
                                    </div>

                                    <div class="col-sm-3">
                                        <label class="control-label">Forma de Pago</label>
                                        <select name="tipopa" required class="form-control show-tick">
                                            <option value="">-- Seleccione una forma --</option>
                                            <option value="Contado">CONTADO</option>
                                            <option value="Credito">CREDITO</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-success"
                                            style="border-radius: 30px;">Terminar Compra</button>
                                        <button onclick="window.location.href='nuevo'" class="btn btn-primary"
                                            style="border-radius: 30px;">Seguir comprando</button>
                                    </div>
                                    <br>
                                </div>

                                <div class="form-group" style="display:none;">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Estado</label>
                                    <div class="col-sm-5">
                                        <input type="text" name="estado" required class="form-control" value="1">
                                    </div>
                                </div>
                            </form>
                            <?php else: ?>
                            <p class="alert alert-warning">El carrito está vacío.</p>
                            <?php endif; ?>

                            <br>

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
<script src="../../assets/plugins/autosize/autosize.js"></script>
<script src="../../assets/plugins/momentjs/moment.js"></script>
<script src="../../assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
<script src="../../assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="../../assets/js/admin.js"></script>
<script src="../../assets/js/pages/tables/jquery-datatable.js"></script>
<script src="../../assets/js/demo.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<script type="text/javascript">
function showselect(str) {
    var xmlhttp;
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    }
    if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else { // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("id_prove").innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET", "../funciones/provee_ruc.php?c=" + str, true);
    xmlhttp.send();
}
</script>

<script type="text/javascript">
function verSeleccion() {
    var ticket = document.getElementById('ticket');
    var boleta = document.getElementById('boleta');
    var factura = document.getElementById('factura');
    var seleccionado = document.getElementById("selector").value;
    if (seleccionado == 'ticket') {
        ticket.style.display = 'block';
        boleta.style.display = 'none';
        factura.style.display = 'none';
    } else if (seleccionado == 'boleta') {
        ticket.style.display = 'none';
        boleta.style.display = 'block';
        factura.style.display = 'none';
    } else if (seleccionado == 'factura') {
        ticket.style.display = 'none';
        factura.style.display = 'block';
        boleta.style.display = 'none';
    } else {
        modelo.style.display = 'none';
        boleta.style.display = 'none';
        factura.style.display = 'none';
    }
}
</script>

<script>
$('#buscar').click(function() {
    dni = $('#documento').val();
    $.ajax({
        url: '../proveedores/consultaRUC',
        type: 'post',
        data: 'dni=' + dni,
        dataType: 'json',
        success: function(r) {
            if (r.numeroDocumento == dni) {
                $('#nombre').val(r.nombre);
                $('#direccion').val(r.direccion);
                $('#provincia').val(r.provincia);
            } else {
                alert(r.error);
            }
            console.log(r)
        }
    });
});
</script>


<?php
if (isset($_POST["agregar"])) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "vetdog";

    // Creamos la conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Revisamos la conexión
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $ruc = $_POST['ruc'];
    $nomprove = $_POST['nomprove'];
    $direcc = $_POST['direcc'];
    $pais = $_POST['pais'];
    $estado = $_POST['estado'];


    // Realizamos la consulta para saber si coincide con uno de esos criterios

    $result = mysqli_query($conn);
    ?>


<?php
    // Validamos si hay resultados
    if (mysqli_num_rows($result) > 0) {
        // Si es mayor a cero imprimimos que ya existe el usuario

        if ($result) {
            ?>
<script type="text/javascript">
swal("Oops...!", "Ya existe el registro a agregar!", "error")
</script>
<?php
        }
    } else {
        // Si no hay resultados, ingresamos el registro a la base de datos
        $sql2 = "insert into supplier(ruc,nomprove,direcc,pais,estado) 
            values ('$ruc','$nomprove','$direcc','$pais','$estado')";
        if (mysqli_query($conn, $sql2)) {
            if ($sql2) {
                ?>

<script type="text/javascript">
swal("¡Registrado!", "Agregado correctamente", "success").then(function() {
    window.location = "../compra/cart";
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