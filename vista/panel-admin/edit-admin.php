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
  <!-- Bootstrap Core Css -->
  <link href="../../assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
  <!-- Waves Effect Css -->
  <link href="../../assets/plugins/node-waves/waves.css" rel="stylesheet" />
  <!-- Animation Css -->
  <link href="../../assets/plugins/animate-css/animate.css" rel="stylesheet" />
  <link href="../../css/style.css" rel="stylesheet">
  <link href="../../assets/css/themes/all-themes.css" rel="stylesheet" />
  <link rel="shortcut icon" type="image/x-icon" href="../../assets/img/lll.png" />

  <title>Registrar Clientes Administrador | Beatriz Fagundez</title>
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
              <li><a href="./edit-admin.php" style="display: flex;gap: 5px;"><img src="./../../assets/icons/IconParkSolidConfig.svg" style="width: 25px">Editar perfil</a></li>
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
            </ul>
          </li>

          <li>
            <a href="javascript:void(0);" class="menu-toggle">
              <i class="material-icons">assessment</i>
              <span>BITÁCORA</span>
            </a>
            <ul class="ml-menu">
              <li>
                <a href="../../vista/audit/mostrar.php">Mostrar</a>
              </li>
            </ul>
          </li>

          <aside id="rightsidebar" class="right-sidebar"></aside>
      <div>
  </section>

  <!--============================CONTENIDO DE LA PÁGINA ==========================================================-->

  <section class="content">
    <div class="container-fluid">
      <!-- Input -->
      <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="card">
            <div class="header">
              <h2>EDITAR PERFIL ADMINISTRADOR</h2>
            </div>

            <?php
              $adminID = $_SESSION['adminID'];
              $sql = "SELECT * FROM admin WHERE id = '$adminID'";

              $results = mysqli_query($conn,$sql);

              foreach ($results as $row) { ?>
              <div class="body">
                <form method="POST" autocomplete="off">
                  <div class="row clearfix">
                    <div class="col-sm-6">
                    <label class="control-label">Nombre del administrador</span></label>
                      <div class="form-group">
                        <div class="form-line">
                          <input type="text" name="name" value="<?= $row['name'] ?>" class="form-control" placeholder="Nombre del administrador..." required />
                        </div>
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <label class="control-label">Correo</span></label>
                      <div class="input-group">
                        <div class="form-line">
                          <input type="email" name="email" value="<?= $row['email'] ?>" class="form-control money-euro" placeholder="Correo..." required>
                        </div>
                      </div>
                    </div>

                    <div class="col-sm-12">
                      <label class="control-label">Contraseña</span></label>
                      <div class="input-group">
                        <div class="form-line">
                          <input type="password" name="password" class="form-control money-euro" placeholder="Contraseña...">
                        </div>
                      </div>
                    </div>

                  </div>

                  <div class="container-fluid" align="center">
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                    </div>

                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                      <a type="button" href="./edit-admin.php" class="btn bg-red"><i class="material-icons">cancel</i> LIMPIAR </a>
                    </div>

                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                      <button type="submit" class="btn bg-green" name="update">ACTUALIZAR <i class="material-icons">save</i></button>
                    </div>

                  </div>
                </form>
              </div>
            <?php } ?>
  
          </div>
        </div>
      </div>
    </div>
    <!-- #END# Input -->
    </div>
  </section>

  <section class="content">
    <div class="container-fluid">
      <!-- Input -->
      <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="card">
            <div class="header">
              <h2>CREAR PERFIL ADMINISTRADOR</h2>
            </div>
              <div class="body">
                <form method="POST" autocomplete="off">
                  <div class="row clearfix">
                    <div class="col-sm-6">
                    <label class="control-label">Nombre del administrador</span></label>
                      <div class="form-group">
                        <div class="form-line">
                          <input type="text" name="name" class="form-control" placeholder="Nombre del administrador..."/>
                        </div>
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <label class="control-label">Correo</span></label>
                      <div class="input-group">
                        <div class="form-line">
                          <input type="email" name="email" class="form-control money-euro" placeholder="Correo...">
                        </div>
                      </div>
                    </div>

                    <div class="col-sm-12">
                      <label class="control-label">Contraseña</span></label>
                      <div class="input-group">
                        <div class="form-line">
                          <input type="password" name="password" class="form-control money-euro" placeholder="Contraseña...">
                        </div>
                      </div>
                    </div>

                  </div>

                  <div class="container-fluid" align="center">
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                    </div>

                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                      <a type="button" href="./edit-admin.php" class="btn bg-red"><i class="material-icons">cancel</i> LIMPIAR </a>
                    </div>

                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                      <button type="submit" class="btn bg-green" name="create">CREAR <i class="material-icons">save</i></button>
                    </div>

                  </div>
                </form>
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
  <!-- Bootstrap Material Datetime Picker Plugin Js -->

  <!-- Bootstrap Datepicker Plugin Js -->

  <!-- Custom Js -->
  <script src="../../assets/js/admin.js"></script>
  <script src="../../assets/js/pages/forms/basic-form-elements.js"></script>
  <!-- Demo Js -->

  <script src="../../assets/js/demo.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
  <!--------------------------------script nuevo----------------------------->
  <?php
  if (isset($_POST["update"])) {
    if(empty($_POST['name']) || empty($_POST['email'])) { ?>
      <script type="text/javascript">
        swal("Información!", "¡No puede enviar datos vacíos!", "info").then(function() {
        });
      </script>
    <?php
    } else {
      $adminID = $_SESSION['adminID'];
      $name = $_POST['name'];
      $email = $_POST['email'];

      $sql = "SELECT correo FROM owner WHERE correo = '$email'";
      $results = mysqli_query($conn,$sql);

      if(mysqli_num_rows($results) > 0) { ?>
        <script type="text/javascript">
          swal("¡Información!", "El correo ya existe", "info").then();
        </script>
    <?php 
        exit;
      } else { 
        $sql = "SELECT email FROM admin WHERE email = '$email' AND id <> '$adminID'";
        $results = mysqli_query($conn,$sql);
        
        if(mysqli_num_rows($results) > 0) { ?>
          <script type="text/javascript">
            swal("¡Información!", "El correo ya existe", "info").then();
          </script>
    <?php 
          exit;
        }
      }
      if(!empty($_POST['password'])){
        $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
        $sql = "UPDATE admin SET name = '$name', email = '$email', password = '$password' WHERE id = '$adminID'";
      } else {
        $sql = "UPDATE admin SET name = '$name', email = '$email' WHERE id = '$adminID'";
      }

      if(mysqli_query($conn, $sql)) { 
        $_SESSION['name'] = $name;
      ?>
        <script type="text/javascript">
        swal("¡Información!", "¡Administrador actualizado exitosamente!", "success").then(function() {
          location.href = './administrador.php';
        });
      </script>
    <?php 
        //-audit;
        $adminID = $_SESSION['adminID'];
        $action = 'Se actualizó un administrador';
        $rol = "administrador";

        audit($adminID,$rol,$adminID,$rol,$action);
        exit;
      } else { ?>
        <script type="text/javascript">
          swal("Información!", "Hubo un error", "error").then();
        </script>
    <?php
      }
      $conn->close();
    }
  }
  ?>

<?php
  if (isset($_POST["create"])) {
    if(empty($_POST['name']) && empty($_POST['email']) && empty($_POST['password'])) { ?>
      <script type="text/javascript">
        swal("Información!", "¡No puede enviar datos vacíos!", "info").then(function() {
        });
      </script>
    <?php
    } else {
      $adminID = $_SESSION['adminID'];
      $name = $_POST['name'];
      $email = $_POST['email'];
      $password = $_POST['password'];
      $dateCreation = date('Y-m-d');

      $sql = "SELECT correo FROM owner WHERE correo = '$email'";
      $results = mysqli_query($conn,$sql);

      if(mysqli_num_rows($results) > 0) { ?>
        <script type="text/javascript">
          swal("¡Información!", "El correo ya existe", "info").then();
        </script>
    <?php 
        exit;
      } else { 
        $sql = "SELECT email FROM admin WHERE email = '$email' AND id <> '$adminID'";
        $results = mysqli_query($conn,$sql);
        
        if(mysqli_num_rows($results) > 0) { ?>
          <script type="text/javascript">
            swal("¡Información!", "El correo ya existe", "info").then();
          </script>
    <?php 
          exit;
        }
      }
        $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
        $sql = "INSERT INTO admin(name,email,password,dateCreation) VALUES('$name','$email','$password','$dateCreation')";

      if(mysqli_query($conn, $sql)) { ?>
        <script type="text/javascript">
          swal("Información!", "Creado administrador exitosamente", "success").then(function() {
            location.href = './administrador.php';
          });
        </script>
    <?php 
        	//-audit
          $tableID = mysqli_insert_id($conn);
          $adminID = $_SESSION['adminID'];
          $action = 'Se creó un administrador';
          $rol = "administrador";

          audit($tableID,$rol,$adminID,$rol,$action);
        exit;
      } else { ?>
        <script type="text/javascript">
          swal("Información!", "Hubo un error", "error").then();
        </script>
    <?php
      }
      $conn->close();
    }
  }
  ?>
</body>
</html>