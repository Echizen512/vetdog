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
  
  <title>Mostrar Productos Administrador | Beatriz Fagundez</title>
</head>
<style>
.swal2-popup {
  width: 500px; /* Ancho deseado */
  height: 300px; /* Alto deseado */
}
.swal2-title {
  font-size: 28px; /* Tamaño de fuente para el título */
}

#swal2-html-container {
  font-size: 20px; /* Tamaño de fuente para el contenido */
}
.swal2-confirm, .swal2-cancel {
  font-size: 18px !important; /* Tamaño de fuente para el botón de confirmación */
  padding: 10px 18px !important; /* Padding del botón de confirmación */
}
.swal2-icon {
  font-size: 12px; /* Tamaño de fuente para el icono */
}
.swal2-select {
  display: none !important;
  opacity: 0 !important;
}
</style>
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
    </div>
  </nav>

     
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

       
      <section class="menu">
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
                                <a href="../../folder/compra">Listar / Modificar</a>
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
                                <a href="../../folder/venta">Listar / Modificar</a>
                            </li>
                            <li>
                                <a href="../venta/venta_fecha">Consultar por fecha</a>
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

          <aside id="rightsidebar" class="right-sidebar">
          </aside>
      </section>
    </aside>
   

  <section class="content">
    <div class="container-fluid">
      <!-- Input -->
      <div class="alert alert-info">
        <strong>Estimado usuario!</strong> Los campos remarcados con <span class="text-danger">*</span> son necesarios.
      </div>

      <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="card">
            <div class="header"><h2>MODIFICAR PRODUCTOS</h2></div>
            <section class="body">
              <?php
                $id = $_GET['id'];

                $sql = "SELECT p.id_prod, c.id_cate, c.nomcate, p.nompro, p.peso,w.weightID,w.name AS weightName, p.preciC, p.stock, p.fere FROM products AS p JOIN category AS c JOIN weight AS w WHERE p.id_cate = c.id_cate AND p.weightID = w.weightID AND p.id_prod = '$id'";

                $results = mysqli_query($conn,$sql);
                foreach($results as $row) { ?>
                  <form method="POST" autocomplete="off">
                    <section class="row">

                      <div class="col-sm-6">
                        <label class="control-label">Nombre del producto <span class="text-danger">*</span></label>
                        <div class="form-group">
                          <div class="form-line">
                            <input type="text" name="nompro" value="<?= $row['nompro'] ?>" class="form-control" placeholder="Nombre del producto..." required/>
                          </div>
                        </div>
                      </div>

                      <div class="col-sm-6">
                        <div class="form-group">
                          <div class="form-line">
                            <label class="control-label">Categoria del producto <span class="text-danger">*</span></label>
                            <select class="form-control show-tick" name="id_cate" required>
                              <option value="<?= $row['id_cate'] ?>"><?= $row['nomcate'] ?></option>
                              <?php
                                $sql2 = "SELECT id_cate,nomcate FROM category";
                                $results2 = mysqli_query($conn,$sql2);

                                foreach($results2 as $row2) { ?>
                                  <option value="<?= $row2['id_cate'] ?>"><?= $row2['nomcate'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                          </div>
                        </div>
                      </div>

                      <div class="col-sm-6">
                        <label class="control-label">Precio compra</label>
                        <div class="form-group">
                          <div class="form-line">
                            <input type="text" value="<?= $row['preciC'] ?>" name="preciC" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" class="form-control" placeholder="Precio compra..." required/>
                          </div>
                        </div>
                      </div>

                      <div class="col-sm-6">
                        <label class="control-label">Stock del producto</label>
                        <div class="form-group">
                          <div class="form-line">
                            <input type="text" value="<?= $row['stock'] ?>" maxlength="4" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" name="stock" class="form-control" placeholder="Cantidad..." required/>
                          </div>
                        </div>
                      </div>

                      <div class="col-sm-6">
                        <label class="control-label">Peso del producto<span class="text-danger">*</span></label>
                        <div class="form-group">
                          <div class="form-line">
                            <input type="text" value="<?= $row['peso'] ?>" name="peso" maxlength="5" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" class="form-control" placeholder="Peso..." required/>
                          </div>
                        </div>
                      </div>

                      <div class="col-sm-6">
                        <div class="form-group">
                          <div class="form-line">
                            <label class="control-label">Selecciona el tipo de peso<span class="text-danger">*</span></label>
                            <select class="form-control show-tick" name="weightID" required>
                              <option value="<?= $row['weightID']?>" selected ><?= $row['weightName'] ?></option>
                              <?php
                              $sql3 = "SELECT weightID,name FROM weight";
                              $results3 = mysqli_query($conn,$sql3);

                              foreach($results3 as $row3) { ?>
                                <option value="<?= $row3['weightID']; ?>"><?= $row3['name'] ?></option>
                              <?php
                              }
                              ?>
                            </select>
                          </div>
                        </div>
                      </div>

                    </section>

                    <div class="container-fluid">
                      <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3"></div>

                      <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <a type="button" href="../../folder/productos" class="btn bg-red"><i class="material-icons">cancel</i> LIMPIAR </a>
                      </div>

                      <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <button class="btn bg-green" name="update">ACTUALIZAR <i class="material-icons">save</i></button>
                      </div>
                    </div>
                  </form>
              <?php } ?>
            </section>
          </div>
        </div>
      </div>
    </div>
  </section>

 
  <script src="../../assets/plugins/jquery/jquery.min.js"></script>
 
  <script src="../../assets/plugins/bootstrap/js/bootstrap.js"></script>
  <!-- Select Plugin Js -->
  <script src="../../assets/plugins/bootstrap-select/js/bootstrap-select.js"></script>
 
  <script src="../../assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
   
  <script src="../../assets/plugins/node-waves/waves.js"></script>
  
  <script src="../../assets/plugins/autosize/autosize.js"></script>
  
  <script src="../../assets/plugins/momentjs/moment.js"></script>
  <!-- Bootstrap Material Datetime Picker Plugin Js -->

  <!-- sweetalert2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  
  <script src="../../assets/js/admin.js"></script>
  <script src="../../assets/js/pages/forms/basic-form-elements.js"></script>
  
  <script src="../../assets/js/demo.js"></script>

<?php
  if (isset($_POST["update"])) {
    if(empty($_POST["nompro"]) || empty($_POST["id_cate"]) || empty($_POST["preciC"]) || empty($_POST["stock"]) || empty($_POST["peso"]) || empty($_POST["weightID"])) { ?>
      <script>
        Swal.fire('¡Información!','¡No puede enviar datos vacíos!','info');
      </script>
    <?php
      exit;
    } 

    $id_prod = $_GET['id'];
    $nompro = $_POST['nompro'];
    $id_cate = $_POST['id_cate'];
    $preciC = $_POST['preciC'];
    $stock = $_POST['stock'];
    $peso = $_POST['peso'];
    $weightID = $_POST['weightID'];

    $sql = "UPDATE products SET id_cate = '$id_cate', nompro = '$nompro', peso = '$peso', weightID = '$weightID', preciC = '$preciC', stock = '$stock', peso = '$peso', weightID = '$weightID' WHERE id_prod = '$id_prod'";

    if(mysqli_query($conn,$sql)) { ?>
      <script>
        Swal.fire('¡Actualizado!','¡Se ha actualizado exitosamente!','success').then(() => {
          location.href = '../../folder/productos';
        });
      </script>
  <?php
    //-audit
    $adminID = $_SESSION['adminID'];
    $action = "Se actualizó un producto";
    $rol = "administrador";
    $nameTable = "producto";

    audit($id_prod,$nameTable,$adminID,$rol,$action);
    exit;
    }
  }
?>
</body>
</html>