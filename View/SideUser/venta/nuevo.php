<?php
session_start();
if (!isset($_SESSION['ownerID']))
    header('location: ./../login.php');
require_once './../../../assets/db/connectionMysql.php';
$id_due = $_SESSION['ownerID'];
?>

<?php include '../Includes/Head3.php'; ?>
<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Nueva venta :
                        </h2><br>

                    </div>
                    <div class="body">
                        <?php
                        $con = new mysqli("localhost", "root", "", "vetdog");

                        if ($con->connect_error) {
                            die("Error en la conexión: " . $con->connect_error);
                        }

                        $query = "SELECT products.id_prod, products.codigo, products.foto, products.nompro, products.stock, products.precV AS precio_compra, products.estado, products.fere 
                        FROM products 
                        INNER JOIN category ON products.id_cate = category.id_cate 
                        GROUP BY products.id_prod";
                        $products = $con->query($query);
                        if (!$products) {
                            die("Error en la consulta: " . $con->error);
                        }
                        ?>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                    <tr>
                                        <th class="text-center">FOTO</th>
                                        <th class="text-center">PRODUCTO</th>
                                        <th class="text-center">ACCIONES</th>
                                        <th class="text-center">PRECIO</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($r = $products->fetch_object()): ?>
                                        <tr>
                                            <td class="text-center">
                                                <?php echo "<img src='../../../assets/img/subidas/" . htmlspecialchars($r->foto) . "' width='50'>"; ?>
                                            </td>
                                            <td class="text-center"><?php echo htmlspecialchars($r->nompro); ?></td>
                                            <td style="width:260px;">
                                                <?php
                                                $found = false;
                                                if (isset($_SESSION["carts"])) {
                                                    foreach ($_SESSION["carts"] as $c) {
                                                        if ($c["id_prod"] == $r->id_prod) {
                                                            $found = true;
                                                            break;
                                                        }
                                                    }
                                                }
                                                ?>
                                                <?php if ($found): ?>
                                                    <a href="cart" class="btn btn-info">Agregado</a>
                                                <?php else: ?>
                                                    <form class="form-inline" method="post" action="addtocart">
                                                        <input type="hidden" name="id_prod"
                                                            value="<?php echo htmlspecialchars($r->id_prod); ?>">
                                                        <input type="hidden" value="<?php echo htmlspecialchars($r->stock); ?>"
                                                            name="stock">
                                                        <div class="form-group">
                                                            <input type="number" name="canti" value="1" style="width:100px;"
                                                                min="1" class="form-control" placeholder="Cantidad">
                                                        </div>
                                                        <button type="submit" class="btn btn-primary"> <i
                                                                class="material-icons">shopping_basket</i></button>
                                                    </form>
                                                <?php endif; ?>
                                            </td>
                                            <td class="text-center"> <?php echo htmlspecialchars($r->precio_compra)." $"; ?></td>
                                        </tr>
                                    <?php endwhile; ?>
                                </tbody>
                            </table>
                        </div>

                        <?php include '../Includes/Footer3.php'; ?>

                        </body>

                        </html>