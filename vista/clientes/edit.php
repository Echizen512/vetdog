<?php
session_start();
if (!isset($_SESSION['adminID'])) header('location: ./../login.php');
require_once './../../assets/db/connectionMysql.php';
require_once './../../utils/audit.php';

?>
<!DOCTYPE html>
<html lang="es-ES">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link href="../../assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />
  <!-- Bootstrap DatePicker Css -->
  <link href="../../assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.css" rel="stylesheet" />
  <!-- Google Font - Iconos -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
  <!-- Bootstrap Core Css -->
  <link href="../../assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
  <!-- Waves Effect Css -->
  <link href="../../assets/plugins/node-waves/waves.css" rel="stylesheet" />
  <!-- Animation Css -->
  <link href="../../assets/plugins/animate-css/animate.css" rel="stylesheet" />
  <link href="../../css/style.css" rel="stylesheet">
  <link href="../../assets/css/themes/all-themes.css" rel="stylesheet" />
  <link rel="shortcut icon" type="image/x-icon" href="../../assets/img/lll.png" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.9/sweetalert2.min.css" integrity="sha512-cyIcYOviYhF0bHIhzXWJQ/7xnaBuIIOecYoPZBgJHQKFPo+TOBA+BY1EnTpmM8yKDU4ZdI3UGccNGCEUdfbBqw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.9/sweetalert2.all.min.js" integrity="sha512-IZ95TbsPTDl3eT5GwqTJH/14xZ2feLEGJRbII6bRKtE/HC6x3N4cHye7yyikadgAsuiddCY2+6gMntpVHL1gHw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  
  <title>Mostrar Productos Administrador | Beatriz Fagundez</title>
</head>
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
        <a class="navbar-brand" href="../panel-admin/administrador"> CONSULTORIO - BEATRIZ FAGUNDEZ</a>
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
              <li><a href="../pages-logout"><img src="./../../assets/icons/MaterialSymbolsLightExitToApp.svg" style="width: 25px"> Cerrar Sesión</a></li>
              <li><a href="./../panel-admin/edit-admin.php" style="display: flex;gap: 5px;"><img src="./../../assets/icons/IconParkSolidConfig.svg" style="width: 25px">Editar perfil</a></li>
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
          <!--======================================================================================================-->
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
          <!--======================================================================================================-->
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
          <!--======================================================================================================-->
          <li <li>>
            <a href="javascript:void(0);" class="menu-toggle">
              <i class="material-icons">supervisor_account</i>
              <span>CLIENTES</span>
            </a>
            <ul class="ml-menu">
              <li>
                <a href="../clientes/nuevo">Registrar</a>
              </li>
              <li <li>>
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
          <!--======================================================================================================-->
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
            </ul>
          </li>
          <!--======================================================================================================-->
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
              <h2>MODIFICAR CLIENTES</h2>
            </div>

            <div class="body">
            <?php
              $id = $_GET['id'];
              $sql = "SELECT * FROM owner WHERE id_due = '$id'";
              $query = $conn->query($sql);
              $data = [];
              if ($query) {
                while ($r = $query->fetch_object()) {
                  $data[] = $r;
                }
              }
            ?>
            <?php if (count($data) > 0) : ?>
              <?php foreach ($data as $d) : ?>
                <form method="POST">
                  <div class="row clearfix">
                    <div class="col-sm-6">
                      <label class="control-label">Cédula de identidad<span class="text-danger">*</span></label>
                      <div class="form-group">
                        <div class="form-line">
                          <input type="text" value="<?php echo $d->dni_due; ?>" name="dni_due" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" maxlength="8" class="form-control" placeholder="Cédula de identidad..." required/>
                        </div>
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <label class="control-label">Nombres<span class="text-danger">*</span></label>
                      <div class="form-group">
                        <div class="form-line">
                          <input type="text" value="<?php echo $d->nom_due; ?>" name="nom_due" onKeypress="if(!isNaN(event.key)) return event.returnValue = false" class="form-control" placeholder="Nombres..." required/>
                        </div>
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <label class="control-label">Apellidos<span class="text-danger">*</span></label>
                      <div class="form-group">
                        <div class="form-line">
                          <input type="text" value="<?php echo $d->ape_due; ?>" name="ape_due" onKeypress="if(!isNaN(event.key)) return event.returnValue = false" class="form-control" placeholder="Apellidos..." required/>
                        </div>
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <label class="control-label">Telefono movil <span class="text-danger">*</span></label>
                      <div class="form-group">
                        <div class="form-line">
                          <input type="text" value="<?php echo $d->movil; ?>" name="movil" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" maxlength="11" class="form-control" placeholder="Telefono movil..." />
                        </div>
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <label class="control-label">Telefono fijo</label>
                      <div class="form-group">
                        <div class="form-line">
                          <input type="text" value="<?php echo $d->fijo; ?>" name="fijo" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" maxlength="11" class="form-control" placeholder="Telefono fijo..." />
                        </div>
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <label class="control-label">Correo electrónico<span class="text-danger">*</span></label>
                      <div class="form-group">
                        <div class="form-line">
                          <input type="email" value="<?php echo $d->correo; ?>" name="correo" required class="form-control" placeholder="Correo electrónico..." />
                        </div>
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <label class="control-label">Direccion<span class="text-danger">*</span></label>
                      <div class="form-group">
                        <div class="form-line">
                          <input type="text" value="<?php echo $d->direc; ?>" name="direc" required class="form-control" placeholder="Direccion..." />
                        </div>
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <label class="control-label">Contraseña</label>
                      <div class="form-group">
                        <div class="form-line">
                          <input type="password" name="password" class="form-control" placeholder="Contraseña..."/>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="container-fluid" align="center">
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                    </div>

                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                      <a type="button" href="../../folder/clientes" class="btn bg-red"><i class="material-icons">cancel</i> LIMPIAR </a>
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
  <!-- Moment Plugin Js -->
  <script src="../../assets/plugins/momentjs/moment.js"></script>
  <script src="../../assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
  <!-- Bootstrap Datepicker Plugin Js -->
  <script src="../../assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
  <!-- Custom Js -->
  <script src="../../assets/js/admin.js"></script>
  <script src="../../assets/js/pages/forms/basic-form-elements.js"></script>
  <!-- Demo Js -->

  <script src="../../assets/js/demo.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

  <!--------------------------------script nuevo----------------------------->

</body>
</html>
<?php

if(isset($_POST['update'])) {

  if(!empty($_POST['dni_due']) && !empty($_POST['nom_due']) && !empty($_POST['ape_due']) && !empty($_POST['movil']) && !empty($_POST['correo']) && !empty($_POST['direc'])) {
    $ownerID = $_GET['id'];
    $dni_due = $_POST['dni_due'];
    $nom_due = $_POST['nom_due'];
    $ape_due = $_POST['ape_due'];
    $movil = $_POST['movil'];
    $fijo = $_POST['fijo'];
    $correo = $_POST['correo'];
    $direccion = $_POST['direc'];
    $password = $_POST['password'];

    $sql = "SELECT dni_due FROM owner WHERE id_due <> '$ownerID' AND movil = '$movil' OR id_due <> '$ownerID' AND correo = '$correo' OR id_due <> '$ownerID' AND dni_due = '$dni_due'";
    if(mysqli_num_rows(mysqli_query($conn,$sql)) > 0) { ?>
      <script>
        swal("¡Información!","Ya el usuario existe","info");
      </script>
  <?php 
      exit;
    } else { 
      if(!empty($password)) {
        $passwordEncripted = password_hash($password,PASSWORD_DEFAULT);
        
        $sql = "UPDATE owner SET dni_due = '$dni_due', nom_due = '$nom_due', ape_due = '$ape_due', movil = '$movil', fijo = '$fijo', correo = '$correo', direc = '$direccion', contra = '$passwordEncripted' WHERE id_due = '$ownerID'";
      } else {
        $sql = "UPDATE owner SET dni_due = '$dni_due', nom_due = '$nom_due', ape_due = '$ape_due', movil = '$movil', fijo = '$fijo', correo = '$correo', direc = '$direccion' WHERE id_due = '$ownerID'";
      }

      if(mysqli_query($conn,$sql)) { ?>
        <script>
          swal("Exitoso","El usuario ha sido actualizado exitosamente","success").then(() => location.href = './../../folder/clientes');
        </script>
  <?php
      //- audit 
      $adminID = $_SESSION['adminID'];
      $action = "Se actualizó un cliente";
      $rol = "administrador";
      $nameTable = "cliente";
      audit($ownerID,$nameTable,$adminID,$rol,$action);
      exit;
      }
    }

  } else { ?>
    <script>
      swal("¡Información!","No puede enviar datos vacíos","info");
    </script>
<?php
    exit;
  }
}
?>