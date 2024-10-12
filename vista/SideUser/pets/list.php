<?php
session_start();
if (!isset($_SESSION['ownerID'])) header('location: ./login.php');
require_once './../../../assets/db/connectionMysql.php';
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
  <link href="./../../../assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
  <!-- Waves Effect Css -->
  <link href="../../../assets/plugins/node-waves/waves.css" rel="stylesheet" />
  <!-- Animation Css -->
  <link href="../../../assets/plugins/animate-css/animate.css" rel="stylesheet" />
  <!-- JQuery DataTable Css -->
  <link href="../../../assets/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
  <!-- Custom Css -->
  <link href="../../../css/style.css" rel="stylesheet">
  <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
  <link href="../../../assets/css/themes/all-themes.css" rel="stylesheet" />
  <link rel="shortcut icon" type="image/x-icon" href="../assets/img/lll.png" />

  <title>Registro de mascostas | Beatriz Fagundez</title>
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
        <a class="navbar-brand" href="../panel-admin/administrador"> MASCOTAS - USUARIO</a>
      </div>
    </div>
  </nav>
  <!-- #Top Bar -->

  <section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">

    <!-- Menu -->
    <article class="menu">
      <ul class="list">
        <li class="header">MENÚ DE NAVEGACIÓN</li>
        <li>
          <a href="./../home.php">
            <i class="material-icons">home</i>
            <span>INICIO</span>
          </a>
        </li>

        <li>
          <a href="./../editProfile.php">
            <i class="material-icons">person</i>
            <span>PERFIL</span>
          </a>
        </li> 

        <li>
          <a href="javascript:void(0);" class="menu-toggle">
            <i class="material-icons">flutter_dash</i>
            <span>MASCOTAS</span>
          </a>
          <ul class="ml-menu">
            <li>
              <a href="./register.php">Registrar</a>
            </li>
            <li>
              <a href="./list.php">Listar / Modificar</a>
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
              <a href="./../quotes/newQuote.php">Pedir Cita</a>
            </li>
            <li>
              <a href="./../quotes/mostrar.php">Listar </a>
            </li>
          </ul>
        </li>

        <li>
          <a href="javascript:void(0);" class="menu-toggle">
            <i class="material-icons">calendar_today</i>
            <span>Tienda</span>
          </a>
          <ul class="ml-menu">
            <li>
              <a href="../sales/sales.php">Compras</a>
            </li>
          </ul>
        </li>

        <li>
          <a href="./../closeSession.php">
            <i class="material-icons">input</i>
            <span>Cerrar Sesión</span>
          </a>
        </li>
        
        <aside id="rightsidebar" class="right-sidebar"></aside>
    </article>
    
  </section>
  <!--=============================================================CONTENIDO DE LA PÁGINA =============================================================-->
  <section class="content">
    <div class="container-fluid">
      <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="card">
            <div class="header">
              <h2>Listado de las mascotas :</h2>
              <br>
            </div>
            <div class="body">
              <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                  <thead>
                    <tr>
                      <th class="text-center">Nº</th>
                      <th class="text-center">NOMBRE</th>
                      <th class="text-center">TIPO</th>
                      <th class="text-center">SEXO</th>
                      <th class="text-center">RAZA</th>
                      <th class="text-center">FECHA REGISTRADO</th>
                      <th class="text-center">ACCIONES</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $ownerID = $_SESSION['ownerID'];
                      $sql = "SELECT p.id_pet,p.nomas,pt.noTiM,r.nomraza,p.sexo,p.fere FROM pet AS p JOIN pet_type AS pt JOIN raza AS r JOIN owner AS o WHERE p.id_raza = r.id_raza AND p.id_due = o.id_due AND p.id_tiM = pt.id_tiM AND o.id_due = '$ownerID'";

                      $results = mysqli_query($conn,$sql);

                      foreach ($results as $key => $va) { ?>
                        <tr>
                          <td class="text-center"><?= $key + 1 ?></td>
                          <td class="text-center"><?= $va['nomas']; ?></td>
                          <td class="text-center"><?= $va['noTiM']; ?></td>
                          <td class="text-center"><?= $va['sexo']; ?></td>
                          <td class="text-center"><?= $va['nomraza']; ?></td>
                          <td class="text-center"><?= date('d/m/Y',strtotime($va['fere'])) ?></td>
                          <td style="display: flex;justify-content: center;gap: 5px;"> 
                            <a type="button" href="./edit.php?id_pet=<?= $va["id_pet"]; ?>" class="btn bg-blue btn-circle waves-effect waves-circle waves-float">
                              <i class="material-icons">autorenew</i>
                            </a>
                            <button id="<?= $va["id_pet"] ?>" class="btn bg-red btn-circle waves-effect waves-circle waves-float btnDelete">
                              <i class="material-icons">delete</i>
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
  <script src="./../../../assets/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap Core Js -->
  <script src="./../../../assets/plugins/bootstrap/js/bootstrap.js"></script>
  <!-- Select Plugin Js -->
  <script src="./../../../assets/plugins/bootstrap-select/js/bootstrap-select.js"></script>
  <!-- Slimscroll Plugin Js -->
  <script src="./../../../assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
  <!-- Waves Effect Plugin Js -->
  <script src="./../../../assets/plugins/node-waves/waves.js"></script>

  <!-- Jquery DataTable Plugin Js -->
  <script src="./../../../assets/plugins/jquery-datatable/jquery.dataTables.js"></script>
  <script src="./../../../assets/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
  <script src="./../../../assets/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
  <script src="./../../../assets/plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
  <script src="./../../../plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
  <script src="./../../../assets/plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
  <script src="./../../../assets/plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
  <script src="./../../../assets/plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
  <script src="./../../../assets/plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

  <!-- Custom Js -->
  <script src="./../../../assets/js/admin.js"></script>
  <!-- <script src="./../../../assets/js/pages/tables/jquery-datatable.js"></script> -->

  <!-- Demo Js -->
  <script src="./../../../assets/js/demo.js"></script>

  <!-- sweetalert2  -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
'use strict';

document.querySelectorAll('.btnDelete').forEach(btnDelete => {
  btnDelete.addEventListener('click', async () => {
    Swal.fire({
      title: "¿Está seguro?",
      text: "Al eliminar no se puede recuperar.",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      confirmButtonText: "Eliminar",
      cancelButtonColor: "#d33",
      cancelButtonText: "Cancelar",
    }).then( async (result) => {
      if (result.isConfirmed) {
        const petID = btnDelete.id;
        const req = await fetch(`./borrar.php?deleteID=${petID}`);
        const res = await req.json();

        if(res.success) Swal.fire('¡Eliminado!','¡Mascota eliminado exitositamente!','success').then(() => location.reload());
        else if(res.error) Swal.fire('¡Error!','¡No puede eliminar una mascota con cita!','error');
      }
    });
  });
});

$(document).ready(function() {
  $('.js-exportable').DataTable({
  responsive: true,
    "language": {
        "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
    }
  });
});
</script>
<?php
  if (isset($_SESSION["message"])) { ?>
    <script type="text/javascript">
      swal('¡Actualizado!','Actualizado exitosamente','success');
    </script>
  <?php 
    unset($_SESSION["message"]);  
  } 
?>
</body>
</html>