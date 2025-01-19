<?php
session_start();
if (!isset($_SESSION['ownerID']))
  header('location: ./../login.php');
require_once './../../../assets/db/connectionMysql.php';

// Asignar el valor de la sesión a la variable $id_due
$id_due = $_SESSION['ownerID'];

$query = "SELECT id_venta, fecha, numfact, estado, total FROM venta WHERE id_due = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id_due);
$stmt->execute();
$result = $stmt->get_result();

$compras = [];
while ($row = $result->fetch_assoc()) {
  // Formatear la fecha a un formato más legible
  $row['fecha'] = date("d-m-Y", strtotime($row['fecha']));
  $compras[] = $row;
}
$stmt->close();
$conn->close();
?>


<!DOCTYPE html>
<html lang="es-ES">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
   
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet"
    type="text/css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

  <link href="./../../../assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

  <link href="../../../assets/plugins/node-waves/waves.css" rel="stylesheet" />

  <link href="../../../assets/plugins/animate-css/animate.css" rel="stylesheet" />
 
  <link href="../../../assets/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
  
  <link href="../../../css/style.css" rel="stylesheet">
  <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
  <link href="../../../assets/css/themes/all-themes.css" rel="stylesheet" />
  <link rel="shortcut icon" type="image/x-icon" href="../assets/img/lll.png" />

  <title>Inicio | Beatriz Fagundez</title>
</head>

<body>

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
  </style>

  <body class="theme-red">





    <div class="overlay"></div>



    <nav class="navbar">
      <div class="container-fluid">
        <div class="navbar-header">
          <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse"
            data-target="#navbar-collapse" aria-expanded="false"></a>
          <a href="javascript:void(0);" class="bars"></a>
          <a class="navbar-brand" href="./../home.php">CITAS - USUARIO</a>
        </div>
      </div>
      </div>
    </nav>


    <section>

      <aside id="leftsidebar" class="sidebar">

        <div class="menu">
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
                  <a href="./../pets/register.php">Registrar</a>
                </li>
                <li>
                  <a href="./../pets/list.php">Listar / Modificar</a>
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
                  <a href="../quotes/newQuote.php">Pedir Cita</a>
                </li>
                <li>
                  <a href="../quotes/mostrar.php">Listar</a>
                </li>
              </ul>
            </li>

            <li>
              <a href="javascript:void(0);" class="menu-toggle">
                <i class="material-icons">store</i>
                <span>Tienda</span>
              </a>
              <ul class="ml-menu">
                <li>
                  <a href="./sales.php">Compras</a>
                </li>
              </ul>
            </li>


            <li>
              <a href="./../Veterinarian.php">
                <i class="material-icons">chat</i>
                <span>CHAT</span>
              </a>
            </li>


            <li>
              <a href="./../closeSession.php">
                <i class="material-icons">input</i>
                <span>Cerrar Sesión</span>
              </a>
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
                <h2><i class="fas fa-shopping-cart text-primary"></i> Mis Compras</h2>
                <br>
              </div>
              <div class="body">
                <div class="table-responsive">
                  <table id="tabla-compras"
                    class="table table-bordered table-striped table-hover dataTable js-exportable">
                    <thead>
                      <tr>
                        <th class="text-center">ID Venta</th>
                        <th class="text-center">Fecha</th>
                        <th class="text-center">Número de Factura</th>
                        <th class="text-center">Estado</th>
                        <th class="text-center">Total</th>
                        <th class="text-center">Factura</th> <!-- Columna para imprimir factura -->
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($compras as $key => $compra): ?>
                        <tr>
                          <td class="text-center"><?= $key + 1 ?></td>
                          <td class="text-center"><?= $compra['fecha']; ?></td>
                          <td class="text-center"><?= $compra['numfact']; ?></td>
                          <td class="text-center"><?= $compra['estado']; ?></td>
                          <td class="text-center"><?= $compra['total'] . ' $'; ?></td>
                          <td style="display: flex; justify-content: center; gap: 5px;">
                            <a href="generar_pdf.php?id_venta=<?= $compra['id_venta']; ?>"
                              class="btn bg-blue btn-circle waves-effect waves-circle waves-float" target="_blank">
                              <i class="material-icons">print</i>
                            </a>
                          </td>
                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Jquery Core Js -->
    <script src="./../../../assets/plugins/jquery/jquery.min.js"></script>

    <script src="./../../../assets/plugins/bootstrap/js/bootstrap.js"></script>
    <!-- Select Plugin Js -->
    <script src="./../../../assets/plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <script src="./../../../assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

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


    <script src="./../../../assets/js/admin.js"></script>
    <!-- <script src="./../../../assets/js/pages/tables/jquery-datatable.js"></script> -->


    <script src="./../../../assets/js/demo.js"></script>

    <!-- sweetalert2  -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
      $(document).ready(function () {
        $('#tabla-compras').DataTable({
          language: {
            "sEmptyTable": "No hay datos disponibles en la tabla",
            "sInfo": "Mostrando _START_ a _END_ de _TOTAL_ entradas",
            "sInfoEmpty": "Mostrando 0 a 0 de 0 entradas",
            "sInfoFiltered": "(filtrados de _MAX_ entradas totales)",
            "sLengthMenu": "Mostrar _MENU_ entradas",
            "sLoadingRecords": "Cargando...",
            "sProcessing": "Procesando...",
            "sSearch": "Buscar: <i class='fas fa-search'></i>",
            "sZeroRecords": "No se encontraron resultados",
            "oPaginate": {
              "sFirst": "Primero",
              "sLast": "Último",
              "sNext": "Siguiente",
              "sPrevious": "Anterior"
            },
            "oAria": {
              "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
              "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
          }
        });
      });
    </script>

  </body>

</html>