    <?php include './Includes/Header.php'; ?>

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
                            $con  = new mysqli("localhost","root","","vetdog");
                            if ($con->connect_error) {
                                die("Error en la conexión: " . $con->connect_error);
                            }
                            $query = "SELECT products.id_prod, products.codigo, products.foto, products.nompro, products.stock, products.precV AS precio_venta, products.estado, products.fere 
                                        FROM products 
                                        INNER JOIN category ON products.id_cate = category.id_cate 
                                        GROUP BY products.id_prod";
                            $products = $con->query($query);
                            if (!$products) {
                                die("Error en la consulta: " . $con->error);
                            }
                        ?>
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
                            background-color: #e6ffe6;
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
                        <div class="row">
                            <?php while($r = $products->fetch_object()): ?>
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="card">
                                        <div class="card-body text-center">
                                            <img src='../../assets/img/subidas/<?php echo $r->foto; ?>' class='img-responsive'>
                                            <h4 class="card-title"><?php echo $r->nompro; ?></h4>
                                            <p class="card-text">$ <?php echo $r->precio_venta; ?></p>
                                            <?php
                                            $found = false;
                                            if(isset($_SESSION["carts"])) {
                                                foreach ($_SESSION["carts"] as $c) {
                                                    if($c["id_prod"] == $r->id_prod) {
                                                        $found = true;
                                                        break;
                                                    }
                                                }
                                            }
                                            ?>
                                            <?php if($found): ?>
                                                <a href="cart" class="btn btn-info" style="border-radius: 30px;">Agregado</a>
                                            <?php else: ?>
                                                <form class="form-inline" method="post" action="addtocart">
                                                    <input type="hidden" name="id_prod" value="<?php echo $r->id_prod; ?>">
                                                    <input type="hidden" value="<?php echo $r->stock; ?>" name="stock">
                                                    <div class="input-group">
                                                        <input type="number" name="canti" value="1" min="1" class="form-control" placeholder="Cantidad">
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

<?php include './Includes/Footer.php'; ?>

</body>
</html>



