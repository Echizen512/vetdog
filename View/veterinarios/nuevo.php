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
      <!-- Input -->
      <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="card">
            <div class="header">
              <h2>REGISTRO DE VETERINARIOS</h2>
            </div>

            <div class="body">
              <form method="POST" autocomplete="off">
                <div class="row clearfix">

                  <div class="col-sm-6">
                    <label class="control-label">Cédula de identidad<span class="text-danger">*</span></label>
                    <div class="form-group">
                      <div class="form-line">
                        <input type="text" name="dnivet" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false" maxlength="9"  class="form-control" placeholder="Cédula de identidad..." required/>
                      </div>
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <label class="control-label">Nombres<span class="text-danger">*</span></label>
                    <div class="form-group">
                      <div class="form-line">
                        <input type="text" name="nomvet" class="form-control" onKeypress="if(!isNaN(event.key)) return event.returnValue = false" placeholder="Nombres..." required/>
                      </div>
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <label class="control-label">Apellidos<span class="text-danger">*</span></label>
                    <div class="form-group">
                      <div class="form-line">
                        <input type="text" name="apevet" class="form-control" onKeypress="if(!isNaN(event.key)) return event.returnValue = false" placeholder="Apellidos..." />
                      </div>
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <label class="control-label">Correo electrónico<span class="text-danger">*</span></label>
                    <div class="form-group">
                      <div class="form-line">
                        <input type="email" name="correo" class="form-control" placeholder="Correo electrónico..." required/>
                      </div>
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <label class="control-label">Sexo del veterinario</label>
                    <select name="sexo" class="form-control show-tick" required>
                      <option value="" selected disabled>-- Seleccione un sexo --</option>
                      <option value="Masculino">Masculino</option>
                      <option value="Femenino">Femenino</option>
                    </select>
                  </div>

                  <div class="col-sm-6">
                    <label class="control-label">Dirección<span class="text-danger">*</span></label>
                    <div class="form-group">
                      <div class="form-line">
                        <input type="text" name="direcc" class="form-control" placeholder="Direccion..." required/>
                      </div>
                    </div>
                  </div>

                  <div class="col-sm-4">
                    <label class="control-label">Teléfono<span class="text-danger">*</span></label>
                    <div class="form-group">
                      <div class="form-line">
                        <input type="text" name="movil" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" maxlength="11" class="form-control" placeholder="Telefono móvil..." required/>
                      </div>
                    </div>
                  </div>

                  <div class="col-sm-4">
                    <label class="control-label">Teléfono fijo </span></label>
                    <div class="form-group">
                      <div class="form-line">
                        <input type="text" name="fijo" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" maxlength="11" class="form-control" placeholder="Teléfono fijo..." />
                      </div>
                    </div>
                  </div>

                  <div class="col-sm-4">
                    <label class="control-label">Contraseña <span class="text-danger">*</span></label>
                    <div class="form-group">
                      <div class="form-line">
                        <input type="password" name="contra" required class="form-control" placeholder="Contraseña..." />
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
                    <button class="btn bg-green" name="add">GUARDAR <i class="material-icons">save</i></button>
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
    if(empty($_POST['dnivet']) || empty($_POST['nomvet']) || empty($_POST['apevet']) || empty($_POST['correo']) || empty($_POST['sexo']) || empty($_POST['direcc']) || empty($_POST['movil']) || empty($_POST['contra'])) { ?>
      <script>
        swal("¡Información!", "¡No puede enviar datos vacíos!", "error");
      </script>
  <?php
      exit;
    }
    $dnivet = $_POST['dnivet'];
    $nomvet = $_POST['nomvet'];
    $apevet = $_POST['apevet'];
    $direcc = $_POST['direcc'];
    $sexo = $_POST['sexo'];
    $correo = $_POST['correo'];
    $fijo = $_POST['fijo'];
    $movil = $_POST['movil'];
    $contra = password_hash($_POST['contra'],PASSWORD_DEFAULT);
    $estado = 1;
    $now = date('Y-m-d');

    $sql = "SELECT * FROM veterinarian WHERE dnivet = '$dnivet' OR correo = '$correo' OR movil = '$movil'";
    $result = mysqli_query($conn,$sql);

    if (mysqli_num_rows($result) > 0) {
      if ($result) { ?>
        <script>
          swal("¡Error!", "¡Ya existe el veterinario a agregar!", "error");
        </script>
      <?php
      }
    } else {
      $sql = "INSERT INTO veterinarian(dnivet,nomvet,apevet,direcc,sexo,correo,fijo,movil,contra,estado,fere) VALUES ('$dnivet','$nomvet','$apevet','$direcc','$sexo','$correo','$fijo','$movil','$contra','$estado','$fere')";

      if (mysqli_query($conn,$sql)) { ?>
        <script>
          swal("¡Registrado!", "Agregado correctamente", "success").then(function() {
            window.location = "../../folder/veterinarios";
          });
        </script>
      <?php 
        //-audit
        $tableID = mysqli_insert_id($conn);
        $adminID = $_SESSION['adminID'];
        $action = "Se creó un veterinario";
        $rol = "administrador";
        $nameTable = "veterinario";

        audit($tableID,$nameTable,$adminID,$rol,$action);
        exit;
      } else { ?>
        <script>
          swal("¡Error!","¡No se pudo guardar!","error")
        </script>
      <?php
      echo "Error: " . $sql2 . "" . mysqli_error($conn);
    // Cerramos la conexión
    $conn->close();
      }
    }
  }
?>
</body>
</html>