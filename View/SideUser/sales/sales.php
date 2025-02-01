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


<?php include '../Includes/Head2.php'; ?>

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


  <?php include '../Includes/Sidebar2.php'; ?>


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
                    <tr class="bg-info">
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

  <?php include '../Includes/Footer2.php'; ?>

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