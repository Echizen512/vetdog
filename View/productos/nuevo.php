<?php
session_start();

require_once './../../assets/db/connectionMysql.php';
require_once './../../utils/audit.php';

if (!isset($_SESSION['adminID'])) header('location: ./../login.php');
?>
<!DOCTYPE html>
<html lang="es-ES">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
 
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
  <!-- Bootstrap Select Css -->
  <link href="../../assets/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
 
  <link href="../../assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
 
  <link href="../../assets/plugins/node-waves/waves.css" rel="stylesheet" />
  
  <link href="../../assets/plugins/animate-css/animate.css" rel="stylesheet" />
  <link href="../../css/style.css" rel="stylesheet">
  <link href="../../assets/css/themes/all-themes.css" rel="stylesheet" />
  <link rel="shortcut icon" type="image/x-icon" href="../../assets/img/lll.png" />
    <!-- Tippy js  -->
  <script src="../../assets/js/popper.js"></script>
  <script src="../../assets/js/tippy-bundle.umd.js"></script>
  <title>Mostrar Productos Administrador | Beatriz Fagundez</title>
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
        <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
        <a href="javascript:void(0);" class="bars"></a>
        <a class="navbar-brand" href="../panel-admin/administrador">CONSULTORIO - BEATRIZ FAGUNDEZ</a>
      </div>
      <div class="collapse navbar-collapse" id="navbar-collapse">
      </div>
    </div>
  </nav>
 

  <section>
     
    <aside id="leftsidebar" class="sidebar">
       
      <div class="user-info">
 
        <div class="info-container">
          <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo ucfirst($_SESSION['name']); ?></div>
          <div class="btn-group user-helper-dropdown">
            <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
            <ul class="dropdown-menu pull-right">
              <li><a href="../pages-logout"><img src="./../../assets/icons/MaterialSymbolsLightExitToApp.svg" style="width: 25px"> Cerrar Sesión</a></li>
              <li><a href="./../panel-admin/edit-admin.php" style="display: flex;gap: 5px;"><img src="./../../assets/icons/IconParkSolidConfig.svg" style="width: 25px">Editar perfil</a></li>
            </ul>
          </div>
        </div>
      </div>
      <!-- #User Info -->

       
      <article class="menu">
        <ul class="list">
          <li class="header">MENÚ DE NAVEGACIÓN</li>
          <li>
            <a href="../panel-admin/administrador">
              <i class="material-icons">home</i>
              <span>INICIO</span>
            </a>
          </li>

          <li>
            <a href="javascript:void(0);" class="menu-toggle">
              <i class="material-icons">inbox</i>
              <span>PRODUCTOS</span>
            </a>
            <ul class="ml-menu">
              <li>
                <a href="../productos/nuevo">Registrar</a>
              </li>
              <li>
                <a href="../../folder/productos">Listar / Modificar</a>
              </li>
            </ul>
          </li>

          <li>
            <a href="javascript:void(0);" class="menu-toggle">
              <i class="material-icons">low_priority</i>
              <span>CATEGORÍAS</span>
            </a>
            <ul class="ml-menu">
              <li>
                <a href="../categorias/nuevo">Registrar</a>
              </li>
              <li>
                <a href="../../folder/categorias">Listar / Modificar</a>
              </li>
            </ul>
          </li>

          <li>
            <a href="javascript:void(0);" class="menu-toggle">
              <i class="material-icons">supervisor_account</i>
              <span>CLIENTES</span>
            </a>
            <ul class="ml-menu">
              <li>
                <a href="../clientes/nuevo">Registrar</a>
              </li>
              <li>
                <a href="../../folder/clientes">Listar / Modificar</a>
              </li>
            </ul>
          </li>

          <li>
            <a href="javascript:void(0);" class="menu-toggle">
              <i class="material-icons">person_pin</i>
              <span>VETERINARIOS</span>
            </a>
            <ul class="ml-menu">
              <li>
                <a href="../veterinarios/nuevo">Registrar</a>
              </li>
              <li>
                <a href="../../folder/veterinarios">Listar / Modificar</a>
              </li>
            </ul>
          </li>

          <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">business</i>
                            <span>PROVEEDORES</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="../proveedores/nuevo">Registrar</a>
                            </li>
                            <li>
                                <a href="../../folder/proveedores">Listar / Modificar</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">shopping_basket</i>
                            <span>COMPRA</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="../compra/nuevo">Registrar</a>
                            </li>

                            <li>
                                <a href="../compra/compras_fecha">Consultar por fecha</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">monetization_on</i>
                            <span>VENTA</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="../venta/nuevo">Registrar</a>
                            </li>

                            <li>
                                <a href="../venta/venta_fecha">Consultar por fecha</a>
                            </li>
                        </ul>
                    </li>



          <li>
            <a href="javascript:void(0);" class="menu-toggle">
              <i class="material-icons">flutter_dash</i>
              <span>MASCOTAS</span>
            </a>
            <ul class="ml-menu">
              <li>
                <a href="../mascotas/nuevo">Registrar</a>
              </li>
              <li>
                <a href="../../folder/mascotas">Listar / Modificar</a>
              </li>
              <li>
                <a href="../../folder/tipo">Tipos</a>
              </li>
              <li>
                <a href="../../folder/raza">Razas</a>
              </li>
                            <li>
                                <a href="../mascotas/animales_table.php">Mostrar Adopciones</a>
                            </li>
                            <li>
                                <a href="../mascotas/animales_insert.php">Agregar Adopción</a>
                            </li>
                            <li>
                                <a href="../mascotas/adopcion.php">Solicitudes</a>
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
                <a href="../citas/nuevo">Registrar</a>
              </li>
              <li>
                <a href="../../folder/citas">Listar / Modificar</a>
              </li>
              <li>
                <a href="../../folder/servicio">Servicio</a>
              </li>
              <li>
              <?php
                $sql = "SELECT * FROM quotes AS q WHERE q.vetID IS NULL ORDER BY q.dateCreation DESC";
                $results = mysqli_query($conn, $sql);
                $numberRequest = mysqli_num_rows($results);
              ?>
                <a href="./../citas/solicitud.php" style="display: flex;align-items:center;gap:5px">Solicitudes <span style="display: grid;place-items:center;margin: 0;color:#b00"><?= $numberRequest ?></span></a>
              </li>
            </ul>
          </li>

          <li>
            <a href="javascript:void(0);" class="menu-toggle">
              <i class="material-icons">assessment</i>
              <span>BITÁCORA</span>
            </a>
            <ul class="ml-menu">
              <li>
                <a href="./../audit/mostrar.php">Mostrar</a>
              </li>
            </ul>
          </li>

          <aside id="rightsidebar" class="right-sidebar"></aside>
      </article>
  </section>

   

  <section class="content">
    <div class="container-fluid">
      <div class="alert alert-info">
        <strong>Estimado usuario!</strong> Los campos remarcados con <span class="text-danger">*</span> son necesarios.
      </div>

      <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="card">
            <div class="header">
              <h2>REGISTRO DE PRODUCTOS</h2>
            </div>
            <div class="body">
            <form method="POST" autocomplete="off" enctype="multipart/form-data">

              
              <?php 
              class tools{
                public function randomCode() {
                $alphabet = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
                $pass = array();
                $pass[]="0"; 
                $alphaLength = strlen($alphabet) - 1; 
                for ($i = 0; $i < 13; $i++) {
                    $n = rand(0, $alphaLength);
                    $pass[] = $alphabet[$n];
                }
                return implode($pass); 
              }
            }

            $instancia = new tools();
            $codigo = $instancia->randomCode();
          ?>
            
            <div class="col-sm-6">
                <label class="control-label">Código de barra del producto</label>
                    <div class="form-group">
                      <div class="form-line">
                        <input id="codigo_barras" readonly value="<?php echo $codigo?>" type="text" name="codigo" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" maxlength="14" required class="form-control" placeholder="Código de barra del producto..." />
                      </div>
                  </div>
              </div>

                  <div class="col-sm-6">
                    <label class="control-label">Nombre del producto<span class="text-danger">*</span></label>
                    <div class="form-group">
                      <div class="form-line">
                        <input type="text" name="nompro" required class="form-control" placeholder="Nombre del producto" />
                      </div>
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="form-group">
                      <div class="form-line">
                        <label class="control-label">Categoría del producto<span class="text-danger">*</span></label>
                        <select class="form-control show-tick" name="id_cate">
                          <option value="" selected disabled>-- Seleccione una Categoría --</option>
                          <?php
                          $sql = "SELECT id_cate,nomcate FROM category";
                          $results = mysqli_query($conn,$sql);
                          foreach($results as $row) { ?>
                            <option value="<?= $row['id_cate']; ?>"><?= $row['nomcate'] ?></option>
                          <?php
                          }
                          ?>
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <label class="control-label">Proveedor<span class="text-danger">*</span></label>
                      <select class="form-control show-tick" required  name="id_prove">
                        <option value="">-- Seleccione un proveedor --</option>
                  
                  <?php 
                    $dbhost = 'localhost';
                    $dbname = 'vetdog';  
                    $dbuser = 'root';                  
                    $dbpass = '';                  
                  try{
                    $dbcon = new PDO("mysql:host={$dbhost};dbname={$dbname}",$dbuser,$dbpass);
                    $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    }catch(PDOException $ex){
                      
                      die($ex->getMessage());
                    }
                      $stmt = $dbcon->prepare('SELECT * FROM supplier');
                        $stmt->execute();
                            while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                      extract($row);
                      ?>
                      <option value="<?php echo $id_prove; ?>"><?php echo $nomprove; ?></option>
                    <?php
                      }
                    ?>
              </select>
            </div>

            <div class="col-sm-6">
              <label class="control-label">Precio compra<span class="text-danger">*</span></label>
                  <div class="form-group">
                    <div class="form-line">
                        <input type="text" name="preciC"  onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" required class="form-control" placeholder="Precio compra..." />
                      </div>
                    </div>
                </div>

                <div class="col-sm-6">
                  <label class="control-label">Precio venta<span class="text-danger">*</span></label>
                    <div class="form-group">
                        <div class="form-line">
                          <input type="text" name="precV"  onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" required class="form-control" placeholder="Precio venta..." />
                    </div>
                  </div>
                </div>

                  
                  <div class="col-sm-6">
                    <label class="control-label">Descripción del producto</label>
                    <div class="form-group">
                      <div class="form-line">
                        <textarea rows="4" name="descp" class="form-control no-resize" placeholder="Descripción..."></textarea>
                      </div>
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <label class="control-label">Imagen del producto</label>
                    <div class="form-group">
                      <div class="form-line">
                        <input type="file" id="imagen" name="foto" onchange="readURL(this);" data-toggle="tooltip" class="form-control">
                        <img id="blah" src="http://placehold.it/180" alt="your image" style="max-width:90px; margin-top: 10px;" />
                      </div>
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <label class="control-label">Peso del producto<span class="text-danger">*</span></label>
                    <div class="form-group">
                      <div class="form-line">
                        <input type="text" name="peso" maxlength="5" class="form-control" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" placeholder="Peso..." required/>
                      </div>
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="form-group">
                      <div class="form-line">
                        <label class="control-label">Selecciona el tipo de peso<span class="text-danger">*</span></label>
                        <select class="form-control show-tick" name="weightID" required>
                          <option value="" selected disabled>-- Seleccione un tipo de peso --</option>
                          <?php
                          $sql = "SELECT weightID,name FROM weight";
                          $results = mysqli_query($conn,$sql);
                          foreach($results as $row) { ?>
                            <option value="<?= $row['weightID']; ?>"><?= $row['name'] ?></option>
                          <?php
                          }
                          ?>
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <label class="control-label">Stock del producto<span class="text-danger">*</span></label>
                    <div class="form-group">
                      <div class="form-line">
                        <input type="text" maxlength="4" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue  = false;" name="stock" class="form-control" placeholder="Cantidad del producto..."  required/>
                      </div>
                        </div>
                  </div>
                </article>

                <div class="container-fluid text-center">
  <div class="d-flex justify-content-center">
    <a type="button" href="../../folder/productos" class="btn bg-red me-2">
      <i class="material-icons">cancel</i> LIMPIAR
    </a>
    <button class="btn bg-green" name="add">
      GUARDAR <i class="material-icons">save</i>
    </button>
  </div>
</div>


                </div>
              </form>
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
  <script src="../../assets/plugins/autosize/autosize.js"></script>
  <script src="../../assets/js/admin.js"></script>
  <script src="../../assets/js/pages/forms/basic-form-elements.js"></script>
  <script src="../../assets/js/demo.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
  <script src="../../assets/js/funciones/categoria.js"></script>
  
  <script>
'use strict';
  tippy('#input-price', {
    content: 'Precio en Dólares',
    placement: 'bottom',
  });
</script>



<?php
if (isset($_POST['add'])) {
    // Datos de conexión
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

    // Validamos que los campos obligatorios no estén vacíos
    if (empty($_POST['nompro']) || empty($_POST['id_cate']) || empty($_POST['preciC']) || empty($_POST['stock']) || empty($_POST['peso']) || empty($_POST['weightID'])) {
        echo '<script>swal("Información", "¡No puede enviar datos vacíos!", "info");</script>';
        exit;
    }

    // Recogemos los valores del formulario
    $codigo = $_POST['codigo'];
    $id_cate = $_POST['id_cate'];
    $foto = $_FILES['foto']['name'];
    $nompro = $_POST['nompro'];
    $peso = $_POST['peso'];
    $weightID = $_POST['weightID'];
    $id_prove = $_POST['id_prove'];
    $descp = $_POST['descp'];
    $preciC = $_POST['preciC'];
    $precV = $_POST['precV'];
    $stock = $_POST['stock'];
    $estado = 1;
    $now = date('Y-m-d');

    // Verificamos si el producto ya existe por su código
    $sql = "SELECT * FROM products WHERE codigo='$codigo'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo '<script>swal("Oops...!", "Ya existe el registro a agregar!", "error");</script>';
        exit;
    } else {
        // Si no existe, procedemos a insertarlo
        $sql2 = "INSERT INTO products(codigo, id_cate, foto, nompro, peso, weightID, id_prove, descp, preciC, precV, stock, estado, fere) 
        VALUES ('$codigo', '$id_cate', '$foto', '$nompro', '$peso', '$weightID', '$id_prove', '$descp', '$preciC', '$precV', '$stock', '$estado', '$now')";

        // Subimos la imagen
        if (move_uploaded_file($_FILES['foto']['tmp_name'], "../../assets/img/subidas/" . $_FILES['foto']['name'])) {
            if (mysqli_query($conn, $sql2)) {
                echo '<script>swal("¡Registrado!", "Agregado correctamente", "success").then(function() {
                    window.location = "../../folder/productos";
                });</script>';

                // Auditoría
                $tableID = mysqli_insert_id($conn);
                $adminID = $_SESSION['adminID'];
                $action = "Se creó un producto";
                $rol = "administrador";
                $nameTable = "producto";
                audit($tableID, $nameTable, $adminID, $rol, $action);
            } else {
                echo '<script>swal("Oops...!", "No se pudo guardar!", "error");</script>';
            }
        } else {
            echo '<script>swal("Oops...!", "Error al subir la imagen!", "error");</script>';
        }
    }

    // Cerramos la conexión
    $conn->close();
}
?>

<script>
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#blah').attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
