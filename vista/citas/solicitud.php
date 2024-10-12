<?php
session_start();
if (!isset($_SESSION['adminID'])) header('location: ../vista/login.php');
require_once './../../assets/db/connectionMysql.php';
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
  <link href="./../../assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
  <!-- Waves Effect Css -->
  <link href="./../../assets/plugins/node-waves/waves.css" rel="stylesheet" />
  <!-- Animation Css -->
  <link href="./../../assets/plugins/animate-css/animate.css" rel="stylesheet" />
  <!-- JQuery DataTable Css -->
  <link href="./../../assets/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
  <!-- Custom Css -->
  <link href="./../../css/style.css" rel="stylesheet">
  <link href="./../../assets/css/fullcalendar.css" rel="stylesheet" />
  <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
  <link href="./../../assets/css/themes/all-themes.css" rel="stylesheet" />
  <link rel="shortcut icon" type="image/x-icon" href="../assets/img/lll.png" />
  <!-- Tippy js  -->
  <script src="./../../assets/js/popper.js"></script>
  <script src="./../../assets/js/tippy-bundle.umd.js"></script>

  <title>Registrar Clientes Administrador | Beatriz Fagundez</title>
</head>
<style>
input[type="checkbox"] {
    display: inline-block !important;
    opacity: 1 !important;
    visibility: visible !important;
    margin: 0 !important;
    padding: 0 !important; 
    float: none !important; 
    position: static !important;
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
        <a class="navbar-brand" href="./../../panel-admin/administrador"> CONSULTORIO - BEATRIZ FAGUNDEZ</a>
      </div>
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
          <img src="./../../assets/img/mujerico.png" width="48" height="48" alt="User" />
        </div> -->
        <div class="info-container">
          <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo ucfirst($_SESSION['name']); ?></div>
          <div class="btn-group user-helper-dropdown">
            <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
            <ul class="dropdown-menu pull-right">
              <li><a href="/vetdog/vista/pages-logout.php"><img src="./../../assets/icons/MaterialSymbolsLightExitToApp.svg" style="width: 25px"> Cerrar Sesión</a></li>
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
            <a href="../../panel-admin/administrador">
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
                <a href="../../productos/nuevo">Registrar</a>
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
                <a href="../../categorias/nuevo">Registrar</a>
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
                <a href="../../clientes/nuevo">Registrar</a>
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
                <a href="../../veterinarios/nuevo">Registrar</a>
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
                <a href="../../mascotas/nuevo">Registrar</a>
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
          <li <li>>
            <a href="javascript:void(0);" class="menu-toggle">
              <i class="material-icons">calendar_today</i>
              <span>CITAS</span>
            </a>
            <ul class="ml-menu">
              <li>
                <a href="../../citas/nuevo">Registrar</a>
              </li>
              <li>
                <a href="../..//folder/citas">Listar / Modificar</a>
              </li>
              <li>
                <a href="../../folder/servicio">Servicio</a>
              </li>
              <?php
                  $sql = "SELECT * FROM quotes AS q WHERE q.vetID IS NULL ORDER BY q.dateCreation DESC";
                  $results = mysqli_query($conn, $sql);
                  $numberRequest = mysqli_num_rows($results);
              ?>
              <li <li>>
                <a href="./solicitud.php" style="display: flex;align-items:center;gap:5px">Solicitudes <span style="display: grid;place-items:center;margin: 0;color:#b00"><?= $numberRequest ?></span></a>
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
      <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="card">
            <div class="header">
              <h2>Listado de las citas rapidas :</h2>
              <br>
            </div>
            <div class="body">
              <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                  <thead>
                    <tr>
                      <th class="text-center">Nº</th>
                      <th class="text-center">CÉDULA</th>
                      <th class="text-center">CLIENTE</th>
                      <th class="text-center">FECHA DE SOLICITUD</th>
                      <th class="text-center">ACCIONES</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $sql = "SELECT quotesID,dni_due,nom_due,ape_due,dateCreation FROM quotes AS q JOIN owner AS o WHERE q.ownerID = o.id_due AND q.vetID IS NULL ORDER BY q.dateCreation DESC";

                      $results = mysqli_query($conn,$sql);
                      foreach ($results as $key => $row) { ?>
                        <tr>
                          <td class="text-center"><?= $key + 1 ?></td>
                          <td class="text-center"><?= $row['dni_due'] ?></td>
                          <td class="text-center"><?= $row['nom_due'] ?>&nbsp;<?= $row['ape_due'] ?></td>
                          <td class="text-center"><?= date('d/m/Y',strtotime($row['dateCreation'])) ?></td>
                          <td style="display: flex;justify-content: center;">
                            <button onclick="attend('<?= $row['quotesID'] ?>')" class="btn bg-blue btn-circle waves-effect waves-circle waves-float btn-pdf" style="display: grid;place-items: center;">
                              <img src="./../../assets/icons/TablerUserExclamation.svg" style="width: 100%;height: 100%"/>
                            </button>
                          </td> 
                        </tr>
                    <?php
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
  <script src="./../../assets/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap Core Js -->
  <script src="./../../assets/plugins/bootstrap/js/bootstrap.js"></script>
  <!-- Select Plugin Js -->
  <script src="./../../assets/plugins/bootstrap-select/js/bootstrap-select.js"></script>
  <!-- Slimscroll Plugin Js -->
  <script src="./../../assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
  <!-- Waves Effect Plugin Js -->
  <script src="./../../assets/plugins/node-waves/waves.js"></script>
  <!-- Jquery DataTable Plugin Js -->
  <script src="./../../assets/plugins/jquery-datatable/jquery.dataTables.js"></script>
  <script src="./../../assets/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
  <script src="./../../assets/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
  <script src="./../../assets/plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
  <script src="./../../assets/plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
  <script src="./../../assets/plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
  <script src="./../../assets/plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
  <script src="./../../assets/plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
  <script src="./../../assets/plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>
  <!-- Custom Js -->
  <script src="./../../assets/js/admin.js"></script>
  <!-- <script src="./../../assets/js/pages/tables/jquery-datatable.js"></script> -->

  <!-- Demo Js -->
  <script src="./../../assets/js/demo.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
'use strict';
document.querySelectorAll('.btn-pdf').forEach(btn => {
  tippy(btn, {
    content: 'Atender',
    placement: 'right',
  });
});

const attend = async quotesID => { 
  return location.href = `./../citas/edit.php?quotesID=${quotesID}`;
};

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