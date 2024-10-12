<?php
session_start();
if (!isset($_SESSION['adminID'])) header('location: ../vista/login.php');
require_once './../assets/db/connectionMysql.php';
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
  <link href="../assets/css/fullcalendar.css" rel="stylesheet" />
  <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
  <link href="../assets/css/themes/all-themes.css" rel="stylesheet" />
  <link rel="shortcut icon" type="image/x-icon" href="../assets/img/lll.png" />
  <!-- Tippy js  -->
  <script src="../assets/js/popper.js"></script>
  <script src="../assets/js/tippy-bundle.umd.js"></script>

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
.showDiagnosis {
  transform: scale(0.8);
}
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
.swal2-textarea {
  font-size: 2rem !important;
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
        <a class="navbar-brand" href="../panel-admin/administrador"> CONSULTORIO - BEATRIZ FAGUNDEZ</a>
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
            <!-- #User Info -->


            <div class="menu">
                <ul class="list">
                    <li class="header">MENÚ DE NAVEGACIÓN</li>
                    <li>
                        <a href="../vista/panel-admin/administrador">
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
                                <a href="../vista/productos/nuevo">Registrar</a>
                            </li>
                            <li>
                                <a href="../folder/productos">Listar / Modificar</a>
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
                                <a href="../vista/categorias/nuevo">Registrar</a>
                            </li>
                            <li>
                                <a href="../folder/categorias">Listar / Modificar</a>
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
                                <a href="../vista/clientes/nuevo">Registrar</a>
                            </li>
                            <li>
                                <a href="../folder/clientes">Listar / Modificar</a>
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
                                <a href="../vista/veterinarios/nuevo">Registrar</a>
                            </li>
                            <li>
                                <a href="../folder/veterinarios">Listar / Modificar</a>
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
                                <a href="../vista/mascotas/nuevo">Registrar</a>
                            </li>
                            <li>
                                <a href="../folder/mascotas">Listar / Modificar</a>
                            </li>
                            <li>
                                <a href="../folder/tipo">Tipos</a>
                            </li>
                            <li>
                                <a href="../folder/raza">Razas</a>
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
                                <a href="../vista/proveedores/nuevo">Registrar</a>
                            </li>
                            <li>
                                <a href="../folder/proveedores">Listar / Modificar</a>
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
                                <a href="../vista/compra/nuevo">Registrar</a>
                            </li>
                            <li>
                                <a href="../folder/compra">Listar / Modificar</a>
                            </li>

                            <li>
                                <a href="../vista/compra/compras_fecha">Consultar por fecha</a>
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
                                <a href="../vista/venta/nuevo">Registrar</a>
                            </li>
                            <li>
                                <a href="../folder/venta">Listar / Modificar</a>
                            </li>
                            <li>
                                <a href="../vista/venta/venta_fecha">Consultar por fecha</a>
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
                                <a href="../vista/citas/nuevo">Registrar</a>
                            </li>
                            <li>
                                <a href="../folder/citas">Listar / Modificar</a>
                            </li>
                            <li>
                                <a href="../folder/servicio">Servicio</a>
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
                <a href="../vista/audit/mostrar.php">Mostrar</a>
                </li>
            </ul>
        </li>

        <aside id="rightsidebar" class="right-sidebar">
        </aside>
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
                      <th class="text-center">CLIENTE</th>
                      <th class="text-center">PRECIO</th>
                      <th class="text-center">INICIO</th>
                      <th class="text-center">FIN</th>
                      <th class="text-center">ACCIONES</th>
                      <th class="text-center">ESTADO</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    foreach ($dato as $value) {
                      foreach ($value as $key => $va) { ?>
                        <tr>
                          <td class="text-center"><?= $key + 1 ; ?></td>
                          <td class="text-center"><?= $va['nom_due'] ?>&nbsp;<?= $va['ape_due'] ?></td>
                          <?php 
                            $quotesID = $va['quotesID'];
                            
                            $sql = "SELECT SUM(qs.priceTotal) as priceTotal FROM quotes_services as qs JOIN service AS s WHERE qs.serviceID = s.id_servi AND qs.quotesID = '$quotesID'";

                            $result = mysqli_query($conn,$sql);
                            foreach ($result as $row) { ?>
                              <td class="text-center"><?= $va['cost'] + $row['priceTotal'] ?>$</td>
                            <?php } ?>
                          <td class="text-center"><?= date('d/m/Y',strtotime($va['start'])) ?></td>
                          <td class="text-center"><?= date('d/m/Y',strtotime($va['end'])) ?></td>
                          <td style="display: flex;justify-content: center;">
                            <button onclick="nose('<?= $va['quotesID'] ?>','<?= $va['ownerID'] ?>')" class="btn bg-blue btn-circle waves-effect waves-circle waves-float btn-pdf" style="display: grid;place-items: center;">
                              <img src="./../assets/icons/TeenyiconsPdfOutline.svg" style="width: 100%;height: 100%;"/>
                            </button>
                            <?php if ($va['status'] == 1) { ?>
                              <button class="btn btn-primary showDiagnosis" value="<?= $va['quotesID'] ?>">Ver Diagnóstico</button>
                              <button class="btn btn-primary" style="transform: scale(0.8)" onClick="updateDiagnosis(<?= $va['quotesID'] ?>)">Editar</button>

                            <?php }?>
                          </td> 
                          <td class="text-center">
                            <div style="display: flex;justify-content: center;gap: 20px;align-items: center">
                              <?php
                              if ($va['status'] == 1) { ?>
                                  <span class="label label-success" style="transform: scale(1.2);">Atendido</span>
                              <?php } else { ?>
                                  <input type="checkbox" class="checkbox-verify" value="<?= $va['quotesID'] ?>" style="transform: scale(1.5);">
                              <?php } ?>
                            </div>
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

  <!--=============================================================CONTENIDO DE LA PÁGINA =============================================================-->

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
  <script src="../assets/plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
  <script src="../assets/plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
  <script src="../assets/plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
  <script src="../assets/plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
  <script src="../assets/plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>
  <!-- Custom Js -->
  <script src="../assets/js/admin.js"></script>
  <!-- <script src="../assets/js/pages/tables/jquery-datatable.js"></script> -->

  <!-- Demo Js -->
  <script src="../assets/js/demo.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
'use strict';
document.querySelectorAll('.btn-pdf').forEach(btn => {
  tippy(btn, {
    content: 'Ver PDF',
    placement: 'bottom',
  });
});

const nose = async(quotesID,ownerID) => { 
  const req = await fetch(`./../vista/citas/controllerRequest.php?ownerID=${ownerID}&quotesID=${quotesID}`,{
    method: 'PUT',
    headers: {'Content-Type': 'application/json'},
  });

  const res = await req.json();

  //create anchor for redirect to PDF
  const a = document.createElement('a');
  a.setAttribute('target', '_blank');
  a.setAttribute('href', './../vista/citas/createPDF.php');

  if(res.success) return a.click();
};

document.querySelectorAll('.checkbox-verify').forEach(checkbox => {
  tippy(checkbox, {
    content: 'Marcar como Atendido',
    placement: 'left',
  });

  checkbox.addEventListener('change', async e => {
    checkbox.checked = false;
    Swal.fire({
      title: "Escriba el diagnóstico",
      input: "textarea",
      inputAttributes: {
        autocapitalize: "off"
      },
      showCancelButton: true,
      showLoaderOnConfirm: true,
      cancelButtonText: 'Cancelar',
      confirmButtonText: "Actualizar",
      preConfirm: async (diagnosis) => {
        if (!diagnosis) Swal.showValidationMessage("Por favor, ingrese un diagnóstico válido");
      },
    }).then(async(result) => {
      if (result.isConfirmed) {
        const quotesID = e.target.value;
        const req = await fetch(`./../vista/citas/controllerRequest.php?quotesID=${quotesID}`,{
          method: 'PATCH',
          headers: {'Content-Type': 'application/json'},
          body: JSON.stringify({diagnosis: result.value}),
        });
        const res = await req.json();
        if(res.success) Swal.fire('¡Actualizado exitosamente!','El diagnóstico se ha actualizado exitosamente','success').then(() => location.reload());
      }
    });
  }); 
});

document.querySelectorAll('.showDiagnosis').forEach(btnShowDiagnosis => {
  btnShowDiagnosis.addEventListener('click',async e => {
    const quotesID = e.target.value;
    
    const query = await fetch(`./../vista/citas/controllerRequest.php?quotesID=${quotesID}`,{
      method: 'GET',
      headers: {'content-type': 'application/json'},
    });

    const res = await query.json();
    const diagnosis = decodeURIComponent(escape(res.diagnosis));
    Swal.fire({
      title: 'Diagnóstico',
      html: `<p style="font-size: 18px;text-indent:10px">${diagnosis}</p>`,
      confirmButtonText: "Cerrar",
    });
  })
})

const updateDiagnosis = async (quotesID) => {

const query = await fetch(`./../vista/citas/controllerRequest.php?quotesID=${quotesID}`,{
  method: 'GET',
  headers: {'content-type': 'application/json'},
});

const res = await query.json();
const diagnosis = decodeURIComponent(escape(res.diagnosis));

Swal.fire({
  title: "Actualizar el diagnóstico",
  input: "textarea",
  inputValue: diagnosis,
  inputAttributes: {
    autocapitalize: "off"
  },
  showCancelButton: true,
  showLoaderOnConfirm: true,
  cancelButtonText: 'Cancelar',
  confirmButtonText: "Actualizar",
  preConfirm: async (diagnosis) => {
    if (!diagnosis) Swal.showValidationMessage("Por favor, ingrese un diagnóstico válido");
  },
}).then(async(result) => {
  if (result.isConfirmed) {
    const req = await fetch(`/vetdog/vista/citas/controllerRequest.php?quotesID=${quotesID}`,{
      method: 'PATCH',
      headers: {'Content-Type': 'application/json'},
      body: JSON.stringify({diagnosis: result.value}),
    });
    const res = await req.json();
    if(res.success) Swal.fire('¡Actualizado exitosamente!','El diagnóstico se ha actualizado exitosamente','success').then(() => location.reload());
  }
});
}

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