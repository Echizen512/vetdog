<?php
session_start();
if (!isset($_SESSION['adminID'])) header('location: ./../login.php');
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
  <link href="../../assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
  <!-- Waves Effect Css -->
  <link href="../../assets/plugins/node-waves/waves.css" rel="stylesheet" />
  <!-- Animation Css -->
  <link href="../../assets/plugins/animate-css/animate.css" rel="stylesheet" />
  <!-- JQuery DataTable Css -->
  <link href="../assets/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
  <!-- Custom Css -->
  <link href="../../css/style.css" rel="stylesheet">
  <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
  <link href="../../assets/css/themes/all-themes.css" rel="stylesheet" />
  <link rel="shortcut icon" type="image/x-icon" href="../assets/img/lll.png" />
  
  <title>Mostrar Productos Administrador | Beatriz Fagundez</title>
</head>
<style>
.swal2-popup {
  width: 500px; /* Ancho deseado */
  height: 330px; /* Alto deseado */
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
        <a class="navbar-brand" href="../panel-admin/administrador"> CONSULTORIO - BEATRIZ FAGUNDEZ </a>
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

      <!-- Menu -->
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
  
  <!--=============================================================CONTENIDO DE LA PÁGINA =============================================================-->
  <section class="content">
    
    <form id="form">
      <h2 class="text-center" style="margin-bottom: 10px;">Bitácora del sistema</h2>
      <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 container">
          <div class="body container">
            <div class="row clearfix container-fluid p-5">
              <div class="col-sm-5">
                <label class="control-label">Fecha de incio<span class="text-danger">*</span></label>
                <div class="form-group">
                  <div class="form-line">
                    <input type="date" name="date-start" class="form-control" required/>
                  </div>
                </div>
              </div>

              <div class="col-sm-5">
                <label class="control-label">Fecha de fin<span class="text-danger">*</span></label>
                <div class="form-group">
                  <div class="form-line">
                    <input type="date" name="date-end" class="form-control" required/>
                  </div>
                </div>
              </div>

              <div class="col-sm-2" style="display: grid;place-items:center">
                <button type="submit" class="btn btn-primary">Solicitar datos</button>
              </div>
            </div>
          </div>
        </div>
      </div>

    </form>
    <br>

    <!-- table  -->
    <div class="container-fluid">
      <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

          <div class="card" style="display: none;">
            <div class="header">
              <h2 class="text-center">Bitácora:</h2>
              <br>

            </div>
            <div class="body">
              <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover dataTable js-exportable" id="table">
                  <thead>
                    <tr>
                      <th class="text-center">Nº</th>
                      <th class="text-center">NOMBRE DE LA TABLA</th>
                      <th class="text-center">ID DEL USUARIO</th>
                      <th class="text-center">ROL</th>
                      <th class="text-center">ACCIÓN REALIZADA</th>
                      <th class="text-center">FECHA DE REALIZADO</th>
                    </tr>
                  </thead>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
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

  <!-- Jquery DataTable Plugin Js -->
  <script src="../../assets/plugins/jquery-datatable/jquery.dataTables.js"></script>
  <script src="../../assets/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
  <script src="../../assets/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
  <script src="../../assets/plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
  <script src="../../plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
  <script src="../../assets/plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
  <script src="../../assets/plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
  <script src="../../assets/plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
  <script src="../../assets/plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

  <!-- Custom Js -->
  <script src="../../assets/js/admin.js"></script>

  <!-- sweetalert2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- Demo Js -->
  <script src="../../assets/js/demo.js"></script>

<script>
const form = document.querySelector('form');
form.addEventListener('submit',async e => {
  e.preventDefault();

  const data = [];

  await new FormData(form).forEach((value,key) => {
    data[key] = value;
  });

  let url; 
  if(data["date-start"] > data["date-end"]) return Swal.fire('¡Información!','¡La fecha de inicio no puede ser mayor a la de culminación!','info')
  else if(data["date-start"] === data["date-end"]) url = `./data.php?start=${data["date-start"]}&end=${data["date-end"]}&now=true`;
  else url = `./data.php?start=${data["date-start"]}&end=${data["date-end"]}`;

  const req = await fetch(url,{
    method: 'POST',
    headers: {'Content-Type': 'application/json'},
    body: data,
  });
  
  const res = await req.json();
  document.querySelector('.card').style.display = 'block';

  if ($.fn.DataTable.isDataTable('#table')) {
    $('#table').DataTable().destroy();
  }

  $('#table').DataTable({
    data: res,
    columns: [
      { data: 'number' },
      { data: 'table_name' },
      { data: 'userID' },
      { data: 'rol' },
      { data: 'action' },
      { data: 'date' },
    ],
    language: {
      "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
    }
  });
});

</script>
</body>
</html>