<?php
session_start();
if (!isset($_SESSION['veterinarianID']))
  header('location: ./../login.php');
require_once './../../assets/db/connectionMysql.php';
require_once './../../utils/audit.php';

?>
<!DOCTYPE html>
<html lang="es-ES">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link href="../../assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css"
    rel="stylesheet" />
  <!-- Bootstrap DatePicker Css -->
  <link href="../../assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.css" rel="stylesheet" />
 
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet"
    type="text/css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
 
  <link href="../../assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
 
  <link href="../../assets/plugins/node-waves/waves.css" rel="stylesheet" />
  
  <link href="../../assets/plugins/animate-css/animate.css" rel="stylesheet" />
  <link href="../../css/style.css" rel="stylesheet">
  <link href="../../assets/css/themes/all-themes.css" rel="stylesheet" />
  <link rel="shortcut icon" type="image/x-icon" href="../../assets/img/lll.png" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.9/sweetalert2.min.css"
    integrity="sha512-cyIcYOviYhF0bHIhzXWJQ/7xnaBuIIOecYoPZBgJHQKFPo+TOBA+BY1EnTpmM8yKDU4ZdI3UGccNGCEUdfbBqw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.9/sweetalert2.all.min.js"
    integrity="sha512-IZ95TbsPTDl3eT5GwqTJH/14xZ2feLEGJRbII6bRKtE/HC6x3N4cHye7yyikadgAsuiddCY2+6gMntpVHL1gHw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <title>Inicio | Beatriz Fagundez</title>

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
        <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse"
          data-target="#navbar-collapse" aria-expanded="false"></a>
        <a href="javascript:void(0);" class="bars"></a>
        <a class="navbar-brand" href="./home.php"> PERFIL - VETERINARIO </a>
      </div>
    </div>
  </nav>


  <section>

    <aside id="leftsidebar" class="sidebar">


      <article class="menu">
        <ul class="list">
          <li class="header">MENÚ DE NAVEGACIÓN</li>
          <li>
            <a href="./home.php">
              <i class="material-icons">home</i>
              <span>INICIO</span>
            </a>
          </li>

          <li>
            <a href="./editProfile.php">
              <i class="material-icons">person</i>
              <span>PERFIL</span>
            </a>
          </li>


          <li>
            <a href="javascript:void(0);" class="menu-toggle">
              <i class="material-icons">calendar_today</i>
              <span>CITAS</span>
            </a>
            <ul class="ml-menu">
              <li>
                <a href="./quotes/mostrar.php">Listar / Modificar</a>
              </li>
            </ul>
          </li>

          <li><a href="./messages.php"><i class="material-icons">email</i><span>MENSAJES</span></a></li>

          <li>
            <a href="./closeSession.php">
              <i class="material-icons">input</i>
              <span>Cerrar Sesión</span>
            </a>
          </li>


          <aside id="rightsidebar" class="right-sidebar"></aside>
      </article>
  </section>

  <section class="content">
    <div class="container-fluid">
      <!-- Input -->
      <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="card">
            <div class="header">
              <h2>EDITAR PERFIL</h2>
            </div>

            <div class="body">
              <?php
              $id = $_SESSION['veterinarianID'];
              $sql = "SELECT * FROM veterinarian WHERE id_vet = '$id'";
              $query = $conn->query($sql);
              $data = [];
              if ($query) {
                while ($r = $query->fetch_object()) {
                  $data[] = $r;
                }
              }

              ?>
              <?php if (count($data) > 0): ?>
                <?php foreach ($data as $d): ?>
                  <form method="POST" autocomplete="off">
                    <div class="row clearfix">
                      <div class="col-sm-6">
                        <label class="control-label">Cédula de identidad<span class="text-danger">*</span></label>
                        <div class="form-group">
                          <div class="form-line">
                            <input type="text" value="<?php echo $d->dnivet; ?>" name="dnivet"
                              onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;"
                              maxlength="8" required class="form-control" placeholder="Cédula de identidad..." />
                          </div>
                        </div>
                      </div>

                      <div class="col-sm-6">
                        <label class="control-label">Nombres<span class="text-danger">*</span></label>
                        <div class="form-group">
                          <div class="form-line">
                            <input type="text" value="<?php echo $d->nomvet; ?>" name="nomvet" class="form-control"
                              placeholder="Nombres..." onKeypress="if(!isNaN(event.key)) return event.returnValue = false"
                              required />
                          </div>
                        </div>
                      </div>

                      <div class="col-sm-6">
                        <label class="control-label">Apellidos<span class="text-danger">*</span></label>
                        <div class="form-group">
                          <div class="form-line">
                            <input type="text" value="<?php echo $d->apevet; ?>" name="apevet" class="form-control"
                              onKeypress="if(!isNaN(event.key)) return event.returnValue = false" placeholder="Apellidos..."
                              required />
                          </div>
                        </div>
                      </div>

                      <div class="col-sm-6">
                        <label class="control-label">Telefono movil<span class="text-danger">*</span></label>
                        <div class="form-group">
                          <div class="form-line">
                            <input type="text" value="<?php echo $d->movil; ?>" name="movil"
                              onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;"
                              maxlength="11" class="form-control" placeholder="Telefono movil..." />
                          </div>
                        </div>
                      </div>

                      <div class="col-sm-6">
                        <label class="control-label">Telefono fijo</label>
                        <div class="form-group">
                          <div class="form-line">
                            <input type="text" value="<?php echo $d->fijo; ?>" name="fijo"
                              onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;"
                              maxlength="11" class="form-control" placeholder="Telefono fijo..." />
                          </div>
                        </div>
                      </div>

                      <div class="col-sm-6">
                        <label class="control-label">Correo<span class="text-danger">*</span></label>
                        <div class="form-group">
                          <div class="form-line">
                            <input type="email" value="<?php echo $d->correo; ?>" name="correo" class="form-control"
                              placeholder="Correo..." required />
                          </div>
                        </div>
                      </div>

                      <div class="col-sm-6">
                        <label class="control-label">Dirección<span class="text-danger">*</span></label>
                        <div class="form-group">
                          <div class="form-line">
                            <input type="text" value="<?php echo $d->direcc; ?>" name="direcc" class="form-control"
                              placeholder="Direccion..." required />
                          </div>
                        </div>
                      </div>

                      <div class="col-sm-6">
                        <label class="control-label">Contraseña</label>
                        <div class="form-group">
                          <div class="form-line">
                            <input type="password" name="password" class="form-control"
                              placeholder="Cambiar contraseña..." />
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="container-fluid" align="center">
                      <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3"></div>

                      <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <a type="button" href="./home.php" class="btn bg-red"><i class="material-icons">cancel</i> LIMPIAR
                        </a>
                      </div>

                      <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <button class="btn bg-green" name="update">ACTUALIZAR <i class="material-icons">save</i></button>
                      </div>

                    </div>
                  </form>
                </div>
              <?php endforeach; ?>

            <?php else: ?>
              <span
                class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-700">
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

 
  <script src="../../assets/plugins/jquery/jquery.min.js"></script>
 
  <script src="../../assets/plugins/bootstrap/js/bootstrap.js"></script>
 
  <script src="../../assets/plugins/bootstrap-select/js/bootstrap-select.js"></script>
 
  <script src="../../assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
   
  <script src="../../assets/plugins/node-waves/waves.js"></script>
  
  <script src="../../assets/plugins/autosize/autosize.js"></script>
  
  <script src="../../assets/plugins/momentjs/moment.js"></script>
  <script src="../../assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
  <!-- Bootstrap Datepicker Plugin Js -->
  <script src="../../assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
  
  <script src="../../assets/js/admin.js"></script>
  <script src="../../assets/js/pages/forms/basic-form-elements.js"></script>
  

  <script src="../../assets/js/demo.js"></script>

  
  <script src="../assets/js/demo.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
  <!--------------------------------script nuevo----------------------------->
  <?php
  if (isset($_POST['update'])) {
    if (empty($_POST['dnivet']) && empty($_POST['nomvet']) && empty($_POST['apevet']) && empty($_POST['movil']) && empty($_POST['correo']) && empty($_POST['direcc'])) { ?>
  <script>
    swal('Error', '¡No puede enviar datos vacíos!', 'error');
  </script>
  <?php
    }
    $id = $_SESSION['veterinarianID'];
    $dnivet = $_POST['dnivet'];
    $nomvet = htmlspecialchars($_POST['nomvet']);
    $apevet = htmlspecialchars($_POST['apevet']);
    $movil = $_POST['movil'];
    $fijo = $_POST['fijo'];
    $correo = $_POST['correo'];
    $direcc = $_POST['direcc'];
    $password = $_POST['password'];

    //- admin
    $sql = "SELECT id FROM admin WHERE email = '$correo'";
    if (mysqli_num_rows(mysqli_query($conn, $sql)) > 0) { ?>
  <script>
    swal('¡Error!', 'Ya existe un usuario con esos datos', 'error');
  </script>
  <?php
    } else {
      //- owner
      $sql = "SELECT id_due FROM owner WHERE dni_due = '$dnivet' OR movil = '$movil' OR correo = '$correo'";
      if (mysqli_num_rows(mysqli_query($conn, $sql)) > 0) { ?>
  <script>
    swal('¡Error!', 'Ya existe un usuario con esos datos', 'error');
  </script>
  <?php
      } else {
        //- owner
        $sql = "SELECT id_vet FROM veterinarian WHERE id_vet != '$id' AND dnivet = '$dnivet' OR id_vet != '$id' AND movil = '$movil' OR id_vet != '$id' AND correo = '$correo'";
        if (mysqli_num_rows(mysqli_query($conn, $sql)) > 0) { ?>
  <script>
    swal('¡Error!', 'Ya existe un usuario con esos datos', 'error');
  </script>
  <?php
        } else {
          if (!empty($password)) {
            $passwordEncripted = password_hash($password, PASSWORD_DEFAULT);
            $sql = "UPDATE veterinarian SET id_vet = '$id', nomvet = '$nomvet', apevet = '$apevet', movil = '$movil', fijo = '$fijo',correo = '$correo',direcc = '$direcc', contra = '$passwordEncripted' WHERE id_vet = '$id'";
          } else {
            $sql = "UPDATE veterinarian SET id_vet = '$id', nomvet = '$nomvet', apevet = '$apevet', movil = '$movil', fijo = '$fijo',correo = '$correo',direcc = '$direcc' WHERE id_vet = '$id'";
          }

          if (mysqli_query($conn, $sql)) { ?>
  <script>
    swal('Actualizado', '¡Actualizado exitosamente!', 'success').then(() => {
      location.href = './home.php';
    });
  </script>
  <?php
                  //-audit
                  $tableName = "veterinario";
                  $action = "Se actualizó un veterinario";
                  audit($id, $tableName, $id, $tableName, $action);

          } else { ?>
  <script>
    swal('Error', 'Ocurrió un error al actualizar', 'error');
  </script>
  <?php
          }
        }
      }
    }
  } ?>
</body>

</html>