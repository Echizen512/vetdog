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
 

  <?php include '../Includes/Sidebar.php'; ?>

   
  <section class="content">
    <div class="container-fluid">
      <!-- Input -->
      <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="card">
            <div class="header">
              <h2>REGISTRO DE SERVICIOS</h2>
            </div>

            <div class="body">
              <form method="POST" autocomplete="off">
                <div class="row clearfix">
                  <div class="col-sm-6">
                  <label class="control-label">Nombre del servicio<span class="text-danger">*</span></label>
                    <div class="form-group">
                      <div class="form-line">
                        <input type="text" name="nomser" required class="form-control" placeholder="Nombre del servicio..." />
                      </div>
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <label class="control-label">Precio<span class="text-danger">*</span></label>
                    <div class="input-group">
                      <span class="input-group-addon">
                        <i class="material-icons">monetization_on</i>
                      </span>
                      <div class="form-line">
                        <input type="text" required name="price" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" class="form-control money-euro" placeholder="Precio... Ex: $5 ,99">
                      </div>
                    </div>
                  </div>

                  <div class="col-sm-5" style="display:none;">
                    <select name="estado" class="form-control show-tick">
                      <option value="1">1</option>
                    </select>
                  </div>

                </div>

                <div class="container-fluid" align="center">
                  <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                  </div>

                  <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                    <a type="button" href="../../folder/servicio" class="btn bg-red"><i class="material-icons">cancel</i> LIMPIAR </a>
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
    if(empty($_POST['nomser']) || empty($_POST['price']) ) { ?>
      <script>
        swal("¡Información!", "¡No puede enviar datos vacíos!", "info");
      </script>
  <?php
    }
      $nomser = strtolower($_POST['nomser']);
      $price = $_POST['price'];
      $estado = 1;

      $sql = "SELECT * FROM service WHERE nomser = '$nomser'";
      $result = mysqli_query($conn, $sql);

      if (mysqli_num_rows($result) > 0) { ?>
        <script>
          swal("¡Información!", "¡Ya existe el servicio a agregar!", "info");
        </script>
      <?php
      } else {
        $now = date('Y-m-d');
        $sql = "INSERT INTO service(nomser,price,estado,fere) VALUES ('$nomser','$price','$estado','$now')";

        if (mysqli_query($conn, $sql)) { ?>
            <script>
              swal("¡Registrado!", "¡Servicio agregado correctamente!", "success").then(() => {
                window.location = "../../folder/servicio";
              });
            </script>
        <?php
          //-audit
          $tableID = mysqli_insert_id($conn);
          $adminID = $_SESSION['adminID'];
          $action = "Se creó un servicio";
          $rol = "administrador";
          $nameTable = "servicio";

          audit($tableID,$nameTable,$adminID,$rol,$action);
          exit;
        } else { ?>
          <script>
            swal("Oops...!", "No se pudo guardar!", "error");
          </script>
        <?php
        } 
      }
    }
  ?>
</body>
</html>