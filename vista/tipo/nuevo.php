<?php
session_start();

if (!isset($_SESSION['adminID'])) header('location: ../login.php');
include_once './../../assets/db/connectionMysql.php';
include_once './../../utils/audit.php';

?>
<!DOCTYPE html>
<html lang="es-ES">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
 
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
 
  <link href="../../assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
 
  <link href="../../assets/plugins/node-waves/waves.css" rel="stylesheet" />
  
  <link href="../../assets/plugins/animate-css/animate.css" rel="stylesheet" />
  <link href="../../css/style.css" rel="stylesheet">
  <link href="../../assets/css/themes/all-themes.css" rel="stylesheet" />
  <link rel="shortcut icon" type="image/x-icon" href="../../assets/img/lll.png" />

  <title>Registrar Clientes Administrador | Beatriz Fagundez</title>
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
        <a class="navbar-brand" href="../panel-admin/administrador"> CONSULTORIO - BEATRIZ FAGUNDEZ</a>
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
              <li><a href=" ./../pages-logout"><img src="./../../assets/icons/MaterialSymbolsLightExitToApp.svg" style="width: 25px"> Cerrar Sesión</a></li>
              <li><a href="/vetdog/vista/panel-admin/edit-admin.php" style="display: flex;gap: 5px;"><img src="./../../assets/icons/IconParkSolidConfig.svg" style="width: 25px">Editar perfil</a></li>
            </ul>
          </div>
        </div>
      </div>
       
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
   
  <section class="content">
    <div class="container-fluid">
      <div class="alert alert-info">
        <strong>Estimado usuario!</strong> Los campos remarcados con <span class="text-danger">*</span> son necesarios.
      </div>
      <!-- Input -->
      <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="card">
            <div class="header">
              <h2>REGISTRO DE TIPOS DE MASCOTAS</h2>
            </div>

            <div class="body">
              <form method="POST" autocomplete="off">
                <div class="row clearfix">
                  <div class="col-sm-12">
                    <label class="control-label">Nombre del tipo de mascota<span class="text-danger">*</span></label>
                    <div class="form-group">
                      <div class="form-line">
                        <input type="text" name="noTiM" class="form-control" placeholder="Nombre del tipo de mascota..." required/>
                      </div>
                    </div>
                  </div>

                </div>

                <div class="container-fluid" align="center">
                  <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                  </div>

                  <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                    <a type="button" href="../../folder/tipo" class="btn bg-red"><i class="material-icons">cancel</i> LIMPIAR </a>
                  </div>

                  <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                    <button class="btn bg-green" name="add">GUARDAR<i class="material-icons">save</i></button>
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

  <!--------------------------------script nuevo----------------------------->

  <?php
  if (isset($_POST["add"])) {
    if(empty($_POST['noTiM'])) { ?>
      <script>
        swal("¡Información!", "¡No puede enviar datos vacíos!", "info");
      </script>
  <?php
    }
    $noTiM = strtolower($_POST['noTiM']);
    $estado = 1;
    $now = date('Y-m-d');

    $sql = "SELECT * FROM pet_type WHERE noTiM = '$noTiM'";
    $result = mysqli_query($conn,$sql);

    if (mysqli_num_rows($result) > 0) { ?>
      <script>
        swal("¡Error!", "Ya existe el registro a agregar!", "error")
      </script>
    <?php
      exit;
    } else {
      $sql = "INSERT INTO pet_type(noTiM,estado,fere) VALUES ('$noTiM','$estado','$now')";

      if (mysqli_query($conn,$sql)) { ?>
        <script>
          swal("¡Registrado!", "Agregado correctamente", "success").then(() => {
            window.location = "../../folder/tipo";
          });
        </script>
    <?php
      //-audit
      $tableID = mysqli_insert_id($conn);
      $adminID = $_SESSION['adminID'];
      $action = "Se creó un tipo de mascota";
      $rol = "administrador";
      $tableName = "tipo mascota";

      audit($tableID,$tableName,$adminID,$rol,$action);
      exit;
      } else { ?>
        <script>
          swal("Oops...!", "No se pudo guardar!", "error")
        </script>
    <?php
      }
    }
  }
  ?>
</body>
</html>