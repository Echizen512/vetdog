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
  <!-- Google Font - Iconos -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
  <!-- Bootstrap Select Css -->
  <link href="../../assets/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
  <!-- Bootstrap Core Css -->
  <link href="../../assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
  <!-- Waves Effect Css -->
  <link href="../../assets/plugins/node-waves/waves.css" rel="stylesheet" />
  <!-- Animation Css -->
  <link href="../../assets/plugins/animate-css/animate.css" rel="stylesheet" />
  <link href="../../css/style.css" rel="stylesheet">
  <link href="../../assets/css/themes/all-themes.css" rel="stylesheet" />
  <link rel="shortcut icon" type="image/x-icon" href="../../assets/img/lll.png" />

  <title>Vetdog V.1 | Vetdog - Vetdog Admin Template</title>
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
  <!-- Page Loader -->
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
  <!-- #END# Page Loader -->

  <!-- Overlay For Sidebars -->
  <div class="overlay"></div>
  <!-- #END# Overlay For Sidebars -->

  <!-- Top Bar -->
  <nav class="navbar">
    <div class="container-fluid">
      <div class="navbar-header">
        <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
        <a href="javascript:void(0);" class="bars"></a>
        <a class="navbar-brand" href="../panel-admin/administrador">CONSULTORIO - BEATRIZ FAGUNDEZ </a>
      </div>
    </div>
  </nav>
  <!-- #Top Bar -->

  <section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
      <!-- User Info -->
      <div class="user-info">
        <!-- <div class="image">
          <img src="../../assets/img/mujerico.png" width="48" height="48" alt="User" />
        </div> -->
        <div class="info-container">
          <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo ucfirst($_SESSION['name']); ?></div>
          <div class="btn-group user-helper-dropdown">
            <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
            <ul class="dropdown-menu pull-right">
              <li><a href=" ./../pages-logout"><img src="./../../assets/icons/MaterialSymbolsLightExitToApp.svg" style="width: 25px"> Cerrar Sesión</a></li>
              <li><a href="/vetdog/vista/panel-admin/edit-admin.php" style="display: flex;gap: 5px;"><img src="./../../assets/icons/IconParkSolidConfig.svg" style="width: 25px">Editar perfil</a></li>
            </ul>
          </div>
        </div>
      </div>

      <!-- Menu -->
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
      </div>
  </section>

  <!--============================CONTENIDO DE LA PÁGINA ==========================================================-->

  <section class="content">
    <div class="container-fluid">
      <!-- Input -->
      <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="card">
            <div class="header">
              <h2>MODIFICAR VETERINARIOS</h2>
            </div>

            <div class="body">
              <?php
              $id = $_GET['id'];
              $id_vet;
              $sql = "SELECT * FROM veterinarian WHERE id_vet = '$id'";
              $query = $conn->query($sql);
              $data =  array();
              if ($query) {
                while ($r = $query->fetch_object()) {
                  $data[] = $r;
                }
              }

              ?>
              <?php if (count($data) > 0) : ?>
                <?php foreach ($data as $d) : 
                  $id_vet = $d->id_vet
                  ?>
                  <form method="POST" autocomplete="off">
                    <div class="row clearfix">
                      <div class="col-sm-4">
                        <label class="control-label">Cédula de identidad<span class="text-danger">*</label>
                        <div class="form-group">
                          <div class="form-line">
                            <input type="text" name="dnivet" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false" maxlength="8" value="<?php echo $d->dnivet; ?>" class="form-control" placeholder="Cédula de identidad..." />
                          </div>
                        </div>
                      </div>

                      <div class="col-sm-4">
                        <label class="control-label">Nombres<span class="text-danger">*</label>
                        <div class="form-group">
                          <div class="form-line">
                            <input type="text" value="<?php echo $d->nomvet; ?>" name="nomvet" onKeypress="if(!isNaN(event.key)) return event.returnValue = false" class="form-control" placeholder="Nombres..." required/>
                          </div>
                        </div>
                      </div>

                      <div class="col-sm-4">
                        <label class="control-label">Apellidos<span class="text-danger">*</label>
                        <div class="form-group">
                          <div class="form-line">
                            <input type="text" name="apevet" value="<?php echo $d->apevet; ?>" onKeypress="if(!isNaN(event.key)) return event.returnValue = false" class="form-control" placeholder="Apellidos..." required/>
                          </div>
                        </div>
                      </div>

                      <div class="col-sm-4">
                        <label class="control-label">Direccion <span class="text-danger">*</label>
                        <div class="form-group">
                          <div class="form-line">
                            <input type="text" name="direcc" value="<?php echo $d->direcc; ?>" required class="form-control" placeholder="Direccion..." />
                          </div>
                        </div>
                      </div>

                      <div class="col-sm-4">
                        <label class="control-label">Sexo del veterinario<span class="text-danger">*</label>
                        <select name="sexo" class="form-control show-tick">
                          <option value="<?php echo $d->sexo; ?>"><?php echo $d->sexo; ?></option>
                          <option value="Masculino">Masculino</option>
                          <option value="Femenino">Femenino</option>
                        </select>
                      </div>

                      <div class="col-sm-4">
                        <label class="control-label">Correo del veterinario<span class="text-danger">*</label>
                        <div class="form-group">
                          <div class="form-line">
                            <input type="email" value="<?php echo $d->correo; ?>" name="correo" required class="form-control" placeholder="Correo..." />
                          </div>
                        </div>
                      </div>

                      <div class="col-sm-6">
                        <label class="control-label">Télefono movil <span class="text-danger">*</label>
                        <div class="form-group">
                          <div class="form-line">
                            <input type="text" value="<?php echo $d->movil; ?>" name="movil" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" maxlength="11" required class="form-control" placeholder="Télefono movil..." />
                          </div>
                        </div>
                      </div>

                      <div class="col-sm-6">
                        <label class="control-label">Télefono fijo </label>
                        <div class="form-group">
                          <div class="form-line">
                            <input type="text" name="fijo" value="<?php echo $d->fijo; ?>" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" maxlength="11" class="form-control" placeholder="Telefono fijo..." />
                          </div>
                        </div>
                      </div>

                      <div class="col-sm-4">
                        <label class="control-label">Contraseña</label>
                        <div class="form-group">
                          <div class="form-line">
                            <input type="password" name="password" class="form-control" placeholder="Actualizar contraseña..." />
                          </div>
                        </div>
                      </div>

                    </div>

                    <div class="container-fluid" align="center">
                      <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                      </div>

                      <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <a type="button" href="../../folder/veterinarios" class="btn bg-red"><i class="material-icons">cancel</i> LIMPIAR </a>
                      </div>

                      <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <button class="btn bg-green" name="update">ACTUALIZAR <i class="material-icons">save</i></button>
                      </div>

                    </div>
                  </form>
            </div>
          <?php endforeach; ?>

        <?php else : ?>
          <span class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-700">
            No hay datos
          </span>
        <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
    </div>
    <!-- #END# Input -->
    </div>
  </section>

  <!-- Jquery Core Js -->
  <script src="../../assets/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap Core Js -->
  <script src="../../assets/plugins/bootstrap/js/bootstrap.js"></script>
  <!-- Select Plugin Js -->
  <script src="../../assets/plugins/bootstrap-select/js/bootstrap-select.js"></script>
  <!-- Slimscroll Plugin Js -->
  <script src="../../assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
  <!-- Waves Effect Plugin Js -->
  <script src="../../assets/plugins/node-waves/waves.js"></script>
  <!-- Autosize Plugin Js -->
  <script src="../../assets/plugins/autosize/autosize.js"></script>

  <!-- Custom Js -->
  <script src="../../assets/js/admin.js"></script>
  <script src="../../assets/js/pages/forms/basic-form-elements.js"></script>
  <!-- Demo Js -->

  <script src="../../assets/js/demo.js"></script>
  <!-- sweetalert2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>

<?php

if (isset($_POST['update'])) {
  if(empty($_POST['dnivet']) || empty($_POST['nomvet']) || empty($_POST['apevet']) || empty($_POST['direcc']) || empty($_POST['sexo']) || empty($_POST['correo']) || empty($_POST['movil'])) {
    $_SESSION['message'] = 'No puede enviar datos vacíos.';
  } else {
    $id = $_GET['id'];
    $dnivet  = $_POST['dnivet'];
    $nomvet = htmlspecialchars($_POST['nomvet']);
    $apevet = htmlspecialchars($_POST['apevet']);
    $direcc = $_POST['direcc'];
    $sexo = $_POST['sexo'];
    $correo = strtolower($_POST['correo']);
    $fijo = $_POST['fijo'];
    $movil = $_POST['movil'];
    $adminID = $_SESSION['adminID'];

    $sql = "SELECT dnivet FROM veterinarian WHERE id_vet <> '$id' AND dnivet = '$dnivet' OR id_vet <> '$id' AND correo = '$correo'";

    if(mysqli_num_rows(mysqli_query($conn,$sql)) > 0) {
      echo "<script>Swal.fire('¡Información!','¡El correo ya existe!','info')</script>";
      exit;
    } else {
      $sql = "SELECT id_due FROM owner WHERE dni_due = '$dnivet' OR correo = '$correo'";

      if(mysqli_num_rows(mysqli_query($conn,$sql)) > 0) {
        echo "<script>Swal.fire('¡Información!','¡El correo ya existe!','info')</script>";
        exit;
      } else {
        $sql = "SELECT id FROM admin WHERE email = '$correo'";

        if(mysqli_num_rows(mysqli_query($conn,$sql)) > 0) {
          echo "<script>Swal.fire('¡Información!','¡El correo ya existe!','info')</script>";
          exit;
        } else {
          $sql = "UPDATE veterinarian SET dnivet = '$dnivet', nomvet = '$nomvet', apevet = '$apevet', direcc = '$direcc', sexo = '$sexo', correo = '$correo',movil = '$movil' WHERE id_vet = '$id'";

          if(!empty($_POST['password'])) {
            $sql = "UPDATE veterinarian SET dnivet = '$dnivet', nomvet = '$nomvet', apevet = '$apevet', direcc = '$direcc', sexo = '$sexo', correo = '$correo',fijo = '$fijo',movil = '$movil' WHERE id_vet = '$id'";
          }

          if(!empty($_POST['password'])) {
            $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
            $sql = "UPDATE veterinarian SET dnivet = '$dnivet', nomvet = '$nomvet', apevet = '$apevet', direcc = '$direcc', sexo = '$sexo', correo = '$correo',fijo = '$fijo',movil = '$movil', contra = '$password' WHERE id_vet = '$id'";
          } 
            
          if(mysqli_query($conn,$sql)) {
          echo "<script>Swal.fire('¡Información!','¡Veterinario actualizado correctamente!','success').then(() => {
            location.href = '../../folder/veterinarios'
          })</script>";
            exit;
          } else {
            echo "<script>Swal.fire('¡Información!','¡No se puso actualizar el veterinario!','info')</script>";
            exit;
          }

          //-audit
            $action = "Se actualizó un veterinario";
            $rol = "administrador";
            $nameTable = "veterinario";
            audit($id,$nameTable,$adminID,$rol,$action);
        }
      }
    }
  }
}