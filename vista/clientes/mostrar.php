<?php
session_start();

if (!isset($_SESSION['adminID'])) header('location: ./../login.php');
require_once '../assets/db/connectionMysql.php';

?>
<!DOCTYPE html>
<html lang="es-ES">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
  <!-- Bootstrap Core Css -->
  <link href="../assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
  <!-- Waves Effect Css -->
  <link href="../assets/plugins/node-waves/waves.css" rel="stylesheet" />
  <!-- Animation Css -->
  <link href="../assets/plugins/animate-css/animate.css" rel="stylesheet" />
  <!-- JQuery DataTable Css -->
  <link href="../assets/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
  <!-- Custom Css -->
  <link href="../css/style.css" rel="stylesheet">
  <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
  <link href="../assets/css/themes/all-themes.css" rel="stylesheet" />
  <link rel="shortcut icon" type="image/x-icon" href="../assets/img/lll.png" />
  <!-- Popper  -->
  <script src="../assets/js/popper.js"></script>
  <!-- TippyJS -->
  <script src="../assets/js/tippy-bundle.umd.js"></script>
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

  <?php include '../Includes/Sidebar.php'; ?>
  <!--=============================================================CONTENIDO DE LA PÁGINA =============================================================-->
  <section class="content">
    <div class="container-fluid">
      <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="card">
            <div class="header">
              <h2>Listado de clientes :</h2>
              <br>
            </div>
            <div class="body">
              <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                  <thead>
                    <tr>
                      <th class="text-center">Nº</th>
                      <th class="text-center">DNI</th>
                      <th class="text-center">NOMBRE Y APELLIDO</th>
                      <th class="text-center">MOVIL</th>
                      <th class="text-center">CORREO</th>
                      <th class="text-center">DIRECCIÓN</th>
                      <th class="text-center">ESTADO</th>
                      <th class="text-center">ACCIÓN</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    foreach ($dato as $key => $value) {
                      foreach ($value as $key => $va) { ?>
                        <tr>
                          <td class="text-center"><?php echo $key + 1 ?></td>
                          <td class="text-center"><?php echo $va['dni_due']; ?></td>
                          <td class="text-center"><?php echo $va['nom_due']; ?>&nbsp;<?php echo $va['ape_due']; ?></td>
                          <td class="text-center"><?php echo $va['movil']; ?></td>
                          <td class="text-center"><?php echo $va['correo']; ?></td>
                          <td class="text-center"><?php echo $va['direc']; ?></td>
                          <td class="text-center"><?php
                            if ($va['estado'] == 1) { ?>
                              <form method="get" action="javascript:activo('<?php echo $va['id_due']; ?>')">
                                <span class="label label-success">Activo</span>
                              </form>
                            <?php } else { ?>
                              <form method="get" action="javascript:inactivo('<?php echo $va['id_due']; ?>')">
                                <button type="submit" class="btn btn-danger btn-xs">Inactivo</button>
                              </form>
                            <?php  } ?>
                          </td>
                          <td style="display: grid;place-items:center">
                            <a type="button" href="../vista/clientes/edit?id=<?php echo $va["id_due"]; ?>" class="btn bg-blue btn-circle waves-effect waves-circle waves-float btnEdit">
                              <i class="material-icons">autorenew</i>
                            </a>
                          </td>
                        </tr>
                    <?php
                      }
                    }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- #END# Exportable Table -->
    </div>
  </section>

  <!-- Jquery Core Js -->
  <script src="../assets/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap Core Js -->
  <script src="../assets/plugins/bootstrap/js/bootstrap.js"></script>
  <!-- Select Plugin Js -->
  <script src="../assets/plugins/bootstrap-select/js/bootstrap-select.js"></script>
  <!-- Slimscroll Plugin Js -->
  <script src="../assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
  <!-- Waves Effect Plugin Js -->
  <script src="../assets/plugins/node-waves/waves.js"></script>

  <!-- Jquery DataTable Plugin Js -->
  <script src="../assets/plugins/jquery-datatable/jquery.dataTables.js"></script>
  <script src="../assets/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
  <script src="../assets/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
  <script src="../assets/plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
  <script src="../plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
  <script src="../assets/plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
  <script src="../assets/plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
  <script src="../assets/plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
  <script src="../assets/plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

  <!-- Custom Js -->
  <script src="../assets/js/admin.js"></script>
  <!-- <script src="../assets/js/pages/tables/jquery-datatable.js"></script> -->

  <!-- sweetalert2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- Demo Js -->
  <script src="../assets/js/demo.js"></script>

  <?php
  if(isset($_SESSION['message'])) { ?>
    <script type="text/javascript">
      const msg = '<?php echo $_SESSION['message'] ?>';

      if(msg.includes('pudo')) {
        swal("Error",msg,"error").then(function() {
          window.location = "clientes";
        });
      } else {
        swal("¡Actualizado!",msg, "success").then(function() {
          window.location = "clientes";
        });
      }
    </script>
  <?php 
    unset($_SESSION['message']);
  }
?>
<script>
'use strict';
document.querySelectorAll('.btnEdit').forEach(btn => {
  tippy(btn, {
    content: 'Editar',
    placement: 'bottom',
  })
})

$(document).ready(function() {
  $('.js-exportable').DataTable({
  responsive: true,
      "language": {
          "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
      }
  });
});

</script>
</body>
</html>