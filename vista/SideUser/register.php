<?php
session_start();
require_once './../../assets/db/connectionMysql.php';
require_once './../../utils/audit.php';

?>
<!DOCTYPE html>
<html lang="es-ES">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap Material Datetime Picker Css -->
  <link href="../../assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />
  <!-- Bootstrap DatePicker Css -->
  <link href="../../assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.css" rel="stylesheet" />
 
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
 
  <link href="../../assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
 
  <link href="../../assets/plugins/node-waves/waves.css" rel="stylesheet" />
  
  <link href="../../assets/plugins/animate-css/animate.css" rel="stylesheet" />
  <link href="../../css/style.css" rel="stylesheet">
  <link href="../../assets/css/themes/all-themes.css" rel="stylesheet" />
  <link rel="shortcut icon" type="image/x-icon" href="../../assets/img/lll.png" />
    <!-- tailwind css library  -->
    <script src="./../../assets/js/tailwindcss.js"></script>
  <title>Registrar Clientes Administrador | Beatriz Fagundez</title>
</head>

<body style="background-color: #475569">
 
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
  

  <section class="p-8">
    <div class="container-fluid">
      <div class="alert alert-info">
        <strong>Estimado usuario!</strong> Los campos remarcados con <span class="text-danger">*</span> son necesarios.
      </div>
      <!-- Input -->
      <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="card">
            <div class="header">
              <h2>REGISTRO DE CLIENTES</h2>
            </div>

            <div class="body">
              <form method="POST" autocomplete="off">

                <div class="row clearfix">
                  <div class="col-sm-6">
                    <label class="control-label">Cédula de identidad<span class="text-danger">*</span></label>
                    <div class="form-group">
                      <div class="form-line">
                        <input type="text" name="dni_due" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" maxlength="8" required class="form-control" placeholder="Cédula de identidad..." />
                      </div>
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <label class="control-label">Nombres<span class="text-danger">*</span></label>
                    <div class="form-group">
                      <div class="form-line">
                        <input type="text" name="nom_due" required class="form-control" placeholder="Nombres..." />
                      </div>
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <label class="control-label">Apellidos<span class="text-danger">*</span></label>
                    <div class="form-group">
                      <div class="form-line">
                        <input type="text" name="ape_due" required class="form-control" placeholder="Apellidos..." />
                      </div>
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <label class="control-label">Teléfono móvil<span class="text-danger">*</span></label>
                    <div class="form-group">
                      <div class="form-line">
                        <input type="text" name="movil" required onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" maxlength="11" class="form-control" placeholder="Telefono movil..." />
                      </div>
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <label class="control-label">Teléfono fijo</label>
                    <div class="form-group">
                      <div class="form-line">
                        <input type="text" name="fijo" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" maxlength="11" class="form-control" placeholder="Telefono fijo..." />
                      </div>
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <label class="control-label">Correo Electrónico<span class="text-danger">*</span></label>
                    <div class="form-group">
                      <div class="form-line">
                        <input type="email" name="correo" class="form-control" placeholder="Correo..." />
                      </div>
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <label class="control-label">Dirección<span class="text-danger">*</span></label>
                    <div class="form-group">
                      <div class="form-line">
                        <input type="text" name="direc" class="form-control" placeholder="Dirección..." />
                      </div>
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <label class="control-label">Contraseña<span class="text-danger">*</span></label>
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
                    <button class="btn bg-red btn-clear"><i class="material-icons">cancel</i> LIMPIAR </button>
                  </div>
                  <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                    <button class="btn bg-green" name="agregar">GUARDAR <i class="material-icons">save</i></button>
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
  
  <script src="../../assets/plugins/momentjs/moment.js"></script>
  <!-- Bootstrap Material Datetime Picker Plugin Js -->
  <script src="../../assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
  <!-- Bootstrap Datepicker Plugin Js -->
  <script src="../../assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>

  
  <script src="../../assets/js/admin.js"></script>
  <script src="../../assets/js/pages/forms/basic-form-elements.js"></script>
  

  <script src="../../assets/js/demo.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

  <!--------------------------------script nuevo----------------------------->
<script>
  'use strict';
  document.querySelector('.btn-clear').addEventListener('click',() => {
    location.reload();
  })
</script>
<?php
  if (isset($_POST["agregar"])) {
    if(empty($_POST['dni_due']) && empty($_POST['nom_due']) && empty($_POST['ape_due']) && empty($_POST['movil']) && empty($_POST['fijo']) && empty($_POST['correo']) && empty($_POST['direc']) && empty($_POST['contra'])) { ?>
      <script>
        swal("¡Información!", "¡No puede enviar datos vacíos!", "info").then();
      </script>
    <?php 
    exit;
    } else {
      $dni_due = $_POST['dni_due'];
      $nom_due = $_POST['nom_due'];
      $ape_due = $_POST['ape_due'];
      $movil = $_POST['movil'];
      $fijo = $_POST['fijo'];
      $correo = $_POST['correo'];
      $direc = $_POST['direc'];
      $estado = 1;
      $contra = password_hash($_POST['contra'],PASSWORD_DEFAULT);

      $sql = "SELECT dni_due FROM owner WHERE dni_due = '$dni_due' OR movil = '$movil' OR correo = '$correo'";
      $result = mysqli_query($conn, $sql);

      if (mysqli_num_rows($result) > 0) { ?>
        <script type="text/javascript">
          swal("¡Error!", "¡Ya existe el usuario a registrar!", "error");
        </script>
      <?php
      } else {
        $sql = "SELECT id_vet FROM veterinarian WHERE dnivet = '$dni_due' OR movil = '$movil' OR correo = '$correo'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) { ?>
          <script type="text/javascript">
            swal("¡Error!", "¡Ya existe el usuario a registrar!", "error");
          </script>
        <?php 
        } else {
          $sql = "SELECT id FROM admin WHERE email = '$correo'";
          $result = mysqli_query($conn, $sql);
      
          if (mysqli_num_rows($result) > 0) { ?>
            <script type="text/javascript">
              swal("¡Error!", "¡Ya existe el usuario a registrar!", "error");
            </script>
          <?php 
          } else {
            $now = date('Y-m-d H:i:s');
            $sql2 = "INSERT INTO owner(dni_due,nom_due,ape_due,movil,fijo,correo,direc,estado,contra,fere) VALUES ('$dni_due','$nom_due','$ape_due','$movil','$fijo','$correo','$direc','$estado','$contra','$now')";

            if (mysqli_query($conn, $sql2)) { ?>
              <script>
                swal("¡Registrado!", "Agregado correctamente", "success").then(function() {
                  window.location = './../login.php';
                });
              </script>
            <?php
              $tableID = mysqli_insert_id($conn);
              $nameTable = "cliente";
              $rol = "usuario";
              $action = "Se creó un cliente";
              
              audit($tableID,$nameTable,$tableID,$rol,$action);
            } else {
            ?>
              <script>
                swal("¡Error!", "No se pudo guardar!", "error");
              </script>
            <?php
            }
          }
        }
      $conn->close();
      } 
    }
  }
?>
</body>
</html>