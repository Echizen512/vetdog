<?php
session_start();
if (!isset($_SESSION['ownerID']))
    header('location: ./../login.php');
require_once './../../../assets/db/connectionMysql.php';
$id_due = $_SESSION['ownerID'];
?>

<?php include '../Includes/Head3.php'; ?>
<style>
.card {
    border-radius: 15px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.2s;
    width: 100%;
    max-width: 3000px;
    margin: auto;
}

.card:hover {
    transform: scale(1.05);
}

.card-body {
    padding: 20px;
    display: flex;
    flex-direction: column;
    align-items: center;
}

.card img {
    border-radius: 50%;
    margin-bottom: 15px;
    width: 100px;
    height: 100px;
    object-fit: cover;
}

.card-title {
    font-size: 1.25em;
    font-weight: bold;
}

.card-text {
    font-size: 1.1em;
    color: #007bff;
    font-weight: bold;
    margin: 10px 0;
}

.btn {
    border-radius: 50px;
    padding: 10px 20px;
}

.input-group {
    display: flex;
    justify-content: center;
    align-items: center;
}

.input-group input {
    border-radius: 10px;
    text-align: center;
    width: 60px;
}

.row {
    display: flex;
    flex-wrap: wrap;
    justify-content: flex-start;
}

.col-lg-3, .col-md-4, .col-sm-6 {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-bottom: 20px;
}
</style>
<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Bienvenido a la Tienda Virtual, seleccione un producto:
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

                        <!-- Campo de búsqueda -->
                        <div class="row">
                            <div class="col-lg-12">
                                <input type="text" id="searchInput" class="form-control" placeholder="Buscar producto..." onkeyup="filterCards()">
                            </div>
                        </div>
                        <br>

                        <div class="row" id="productsContainer">
                            <?php while ($r = $products->fetch_object()): ?>
                                <div class="col-lg-3 col-md-4 col-sm-6 product-card" data-name="<?php echo strtolower(htmlspecialchars($r->nompro)); ?>">
                                    <div class="card">
                                        <div class="card-body text-center">
                                            <img src='../../../assets/img/subidas/<?php echo htmlspecialchars($r->foto); ?>' class='img-responsive'>
                                            <h4 class="card-title"><?php echo htmlspecialchars($r->nompro); ?></h4>
                                            <p class="card-text"><?php echo htmlspecialchars($r->precio_compra)." $"; ?></p>
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
                                                <a href="cart" class="btn btn-info" style="border-radius: 30px;">Agregado</a>
                                            <?php else: ?>
                                                <form class="form-inline" method="post" action="addtocart">
                                                    <input type="hidden" name="id_prod" value="<?php echo htmlspecialchars($r->id_prod); ?>">
                                                    <input type="hidden" value="<?php echo htmlspecialchars($r->stock); ?>" name="stock">
                                                    <label class="text-center">Cantidad:</label>
                                                    <div class="input-group">
                                                    <input type="number" name="canti" value="1" min="1" class="form-control" placeholder="Cantidad" style="background-color: #e6ffe6;">
                                                    </div>
                                                    <button type="submit" class="btn btn-primary" style="border-radius: 30px;"><i class="material-icons">shopping_basket</i></button>
                                                </form>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Script para el filtro -->
<script>
function filterCards() {
    const input = document.getElementById('searchInput').value.toLowerCase();
    const cards = document.querySelectorAll('.product-card');

    cards.forEach(card => {
        const name = card.getAttribute('data-name');
        if (name.includes(input)) {
            card.style.display = 'block';
        } else {
            card.style.display = 'none';
        }
    });
}
</script>

<?php include '../Includes/Footer3.php'; ?>
</body>
</html>
