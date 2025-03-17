<?php
session_start();

if (!isset($_SESSION['adminID'])) header('location: ../login.php');
require_once './../../assets/db/connectionMysql.php';
require_once './../../utils/audit.php';
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.9/sweetalert2.all.min.js" integrity="sha512-IZ95TbsPTDl3eT5GwqTJH/14xZ2feLEGJRbII6bRKtE/HC6x3N4cHye7yyikadgAsuiddCY2+6gMntpVHL1gHw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  
  <title>Registrar Clientes Administrador | Beatriz Fagundez</title>
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


             
            <div class="menu">
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
                        </ul>
    </li>
   
                  

    <li>
            <a href="javascript:void(0);" class="menu-toggle">
                <i class="material-icons">assessment</i>
                <span>BITÁCORA</span>
            </a>
            <ul class="ml-menu">
                <li>
                <a href="../audit/mostrar.php">Mostrar</a>
                </li>
            </ul>
    </li>

   
        <aside id="rightsidebar" class="right-sidebar">
        </aside>
    </section>
   
  <section class="content">
    <div class="container-fluid">
      <!-- Input -->
      <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="card">
            <div class="header">
              <h2>MODIFICAR RAZAS DE ANIMALES</h2>
            </div>

            <div class="body">
              <?php
              $id_raza = $_GET['id'];
              $sql = "SELECT raza.nomraza, raza.id_raza, pet_type.id_tiM, pet_type.noTiM, raza.estado FROM raza JOIN pet_type ON raza.id_tiM = pet_type.id_tiM WHERE id_raza = '$id_raza'";
              $results  = mysqli_query($conn,$sql);

              foreach ($results as $row) { ?>
                <form method="POST" autocomplete="off">
                  <div class="row clearfix">
                    <div class="col-sm-6">
                      <label class="control-label">Nombre de la raza <span class="text-danger">*</span></label>
                      <div class="form-group">
                        <div class="form-line">
                          <input type="text" name="nomraza" value="<?= $row['nomraza'] ?>" class="form-control" placeholder="Nombre de la raza..." required/>
                        </div>
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <label class="control-label">Tipo de la mascota <span class="text-danger">*</span></label>
                      <select class="form-control show-tick" value="<?= $row['id_tiM'] ?>" name="id_tiM" required>
                        <option selected value="<?= $row['id_tiM'] ?>"><?= $row['noTiM'] ?></option>
                        <?php
                        $sql2 = "SELECT pt.id_tiM,pt.noTiM FROM raza AS r JOIN pet_type AS pt WHERE pt.id_tiM <> r.id_tiM AND r.id_raza = '$id_raza';";
                        $results2 = mysqli_query($conn,$sql2);
                        foreach($results2 as $row2) { ?>
                          <option value="<?= $row2['id_tiM'] ?>"><?= $row2['noTiM'] ?></option>
                        <?php
                        }
                        ?>
                      </select>
                    </div>
                  </div>

                  <div class="container-fluid" align="center">
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                    </div>

                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                      <a type="button" href="../../folder/raza" class="btn bg-red"><i class="material-icons">cancel</i> LIMPIAR </a>
                    </div>

                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                      <button class="btn bg-green" name="update">ACTUALIZAR<i class="material-icons">save</i></button>
                    </div>

                  </div>
                </form>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
    <!-- #END# Input -->
    </div>
  </section>

 
  <script src="../../assets/plugins/jquery/jquery.min.js"></script>
 
  <script src="../../assets/plugins/bootstrap/js/bootstrap.js"></script>
  <!-- Select Plugin Js -->
  <script src="../../assets/plugins/bootstrap-select/js/bootstrap-select.js"></script>
 
  <script src="../../assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
   
  <script src="../../assets/plugins/node-waves/waves.js"></script>
  
  <script src="../../assets/plugins/autosize/autosize.js"></script>
  

  
  <script src="../../assets/js/admin.js"></script>
  <script src="../../assets/js/pages/forms/basic-form-elements.js"></script>
  

  <script src="../../assets/js/demo.js"></script>

</body>
</html>

<?php
  if (isset($_POST['update'])) {
    if(empty($_POST['nomraza']) || empty($_POST['id_tiM'])) { ?>
      <script>
        Swal.fire('¡Información!','¡No puede enviar datos vacíos!','info');
      </script>
  <?php
    exit;
    }
    $nomraza = strtolower($_POST['nomraza']);
    $id_tiM = $_POST['id_tiM'];

    $sql = "SELECT id_raza FROM raza WHERE nomraza = '$nomraza' AND id_raza <> '$id_raza'";

    if(mysqli_num_rows(mysqli_query($conn,$sql)) > 0) { ?>
      <script>
        Swal.fire('¡Información!','¡Ya existe la raza a agregar!','info');
      </script>
  <?php
      exit;
    }

    $sql = "UPDATE raza SET nomraza = '$nomraza', id_tiM = '$id_tiM' WHERE id_raza = '$id_raza'";
    if(mysqli_query($conn,$sql)) { ?>
      <script>
        Swal.fire('¡Actualizado exitosamente!','¡Se ha actualizado la raza exitosamente!','success').then(() => {
          location.href = '../../folder/raza';
        });
      </script>
  <?php
      //-audit
      $adminID = $_SESSION['adminID'];
      $action = "Se actualizó una raza";
      $rol = "administrador";
      $nameTable = "raza";

      audit($id_raza,$nameTable,$adminID,$rol,$action);
      exit;
    }
  }
?>