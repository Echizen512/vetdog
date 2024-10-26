<?php
session_start();

if (!isset($_SESSION['adminID'])) {
  header('location: ../vista/login.php');
  exit();
}

require_once '../../assets/db/connectionMysql.php';

// Manejo de la actualización de estado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Obtener los parámetros
  $solicitudID = $_POST['solicitudID'];
  $nuevoEstado = $_POST['nuevoEstado'];

  // Validar que el estado sea uno de los valores permitidos
  $estadosPermitidos = ['aceptada', 'rechazada', 'pendiente'];
  if (!in_array($nuevoEstado, $estadosPermitidos)) {
    echo 'error';
    exit();
  }

  // Actualizar el estado de la solicitud
  $query = "UPDATE solicitudes SET estado = ? WHERE id_solicitud = ?";
  $stmt = $conn->prepare($query);
  $stmt->bind_param("si", $nuevoEstado, $solicitudID);

  if ($stmt->execute()) {
    echo 'success';
  } else {
    echo 'error';
  }

  $stmt->close();
  $conn->close();
  exit(); // Terminar la ejecución después de manejar la solicitud AJAX
}

// Consulta de solicitudes
$query = "
    SELECT s.id_solicitud, d.nom_due AS nombre_due, a.nombre, s.estado 
    FROM solicitudes s
    JOIN owner d ON s.id_due = d.id_due
    JOIN animales a ON s.id_animal = a.id_animal
";

$result = $conn->query($query);

if (!$result) {
  die("Error en la consulta: " . $conn->error);
}

$solicitudes = [];
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $solicitudes[] = $row;
  }
} else {
  echo "No se encontraron solicitudes.";
}
?>

<!DOCTYPE html>
<html lang="es-ES">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet"
    type="text/css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
  <link href="../../assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
  <link href="../../assets/plugins/node-waves/waves.css" rel="stylesheet" />
  <link href="../../assets/plugins/animate-css/animate.css" rel="stylesheet" />
  <link href="../../assets/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
  <link href="../../css/style.css" rel="stylesheet">
  <link href="../../assets/css/themes/all-themes.css" rel="stylesheet" />
  <link rel="shortcut icon" type="image/x-icon" href="../../assets/img/lll.png" />
  <script src="../../assets/js/popper.js"></script>
  <script src="../../assets/js/tippy-bundle.umd.js"></script>
  <title>Registrar Clientes Administrador | Beatriz Fagundez</title>
</head>

<body class="theme-red">

  <div class="overlay"></div>

  <nav class="navbar">
    <div class="container-fluid">
      <div class="navbar-header">
        <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse"
          data-target="#navbar-collapse" aria-expanded="false"></a>
        <a href="javascript:void(0);" class="bars"></a>
        <a class="navbar-brand" href="../../panel-admin/administrador">CONSULTORIO - BEATRIZ FAGUNDEZ </a>
      </div>
    </div>
  </nav>

  <section>

    <aside id="leftsidebar" class="sidebar">

      <div class="user-info">

        <div class="info-container">
          <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?php echo ucfirst($_SESSION['name']); ?></div>
          <div class="btn-group user-helper-dropdown">
            <i class="material-icons" data-toggle="dropdown" aria-haspopup="true"
              aria-expanded="true">keyboard_arrow_down</i>
            <ul class="dropdown-menu pull-right">
              <li><a href=" ./../pages-logout"><img src="./../../assets/icons/MaterialSymbolsLightExitToApp.svg"
                    style="width: 25px"> Cerrar Sesión</a></li>
              <li><a href="/vetdog/vista/panel-admin/edit-admin.php" style="display: flex;gap: 5px;"><img
                    src="./../../assets/icons/IconParkSolidConfig.svg" style="width: 25px">Editar perfil</a></li>
            </ul>
          </div>
        </div>
      </div>


      <div class="menu">
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
              <li>
                <a href="../mascotas/animales_table.php">Mostrar Adopciones</a>
              </li>
              <li>
                <a href="../mascotas/animales_insert.php">Agregar Adopción</a>
              </li>
              <li>
                <a href="../mascotas/adopcion.php">Solicitudes</a>
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
                <a href="./../citas/solicitud.php" style="display: flex;align-items:center;gap:5px">Solicitudes <span
                    style="display: grid;place-items:center;margin: 0;color:#b00"><?= $numberRequest ?></span></a>
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
              <h2><i class="fas fa-paw text-primary"></i> Solicitudes de Adopción:</h2>
              <br>
            </div>
            <div class="body">
              <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover dataTable" id="solicitudesTable">
                  <thead>
                    <tr>
                      <th class="text-center">Nº</th>
                      <th class="text-center">Nombre del Solicitante</th>
                      <th class="text-center">Nombre del Animal</th>
                      <th class="text-center">Estado</th>
                      <th class="text-center">Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($solicitudes as $index => $solicitud): ?>
                      <tr>
                        <td class="text-center"><?php echo $index + 1; ?></td>
                        <td class="text-center"><?php echo htmlspecialchars($solicitud['nombre_due']); ?></td>
                        <td class="text-center"><?php echo htmlspecialchars($solicitud['nombre']); ?></td>
                        <td class="text-center">
                          <?php
                          $estado = htmlspecialchars($solicitud['estado']);
                          if ($estado == 'rechazada') {
                            echo '<span class="text-danger font-weight-bold">Rechazada</span>';
                          } elseif ($estado == 'pendiente') {
                            echo '<span class="text-primary font-weight-bold">Pendiente</span>';
                          } else {
                            echo '<span class="text-success font-weight-bold">Aceptada</span>';
                          }
                          ?>
                        </td>
                        <td class="text-center">
                          <?php if ($estado == 'pendiente'): ?>
                            <button class="btn btn-success btn-sm"
                              onclick="cambiarEstado(<?php echo $solicitud['id_solicitud']; ?>, 'aceptada')">
                              <i class="fas fa-check"></i>
                            </button>
                            <button class="btn btn-danger btn-sm"
                              onclick="cambiarEstado(<?php echo $solicitud['id_solicitud']; ?>, 'rechazada')">
                              <i class="fas fa-times"></i>
                            </button>
                          <?php endif; ?>
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
  <script src="../../assets/plugins/jquery/jquery.min.js"></script>
  <script src="../../assets/plugins/bootstrap/js/bootstrap.js"></script>
  <script src="../../assets/plugins/bootstrap-select/js/bootstrap-select.js"></script>
  <script src="../../assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
  <script src="../../assets/plugins/node-waves/waves.js"></script>
  <script src="../../assets/plugins/jquery-datatable/jquery.dataTables.js"></script>
  <script src="../../assets/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
  <script src="../../assets/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
  <script src="../../assets/plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
  <script src="../../plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
  <script src="../../assets/plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
  <script src="../../assets/plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
  <script src="../../assets/plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
  <script src="../../assets/plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>
  <script src="../../assets/js/admin.js"></script>
  <script src="../../assets/js/demo.js"></script>


  <script>
    $(document).ready(function () {
      $('#solicitudesTable').DataTable(); // Inicializa DataTables
    });

    function cambiarEstado(solicitudID, nuevoEstado) {
      if (confirm(`¿Deseas cambiar el estado a ${nuevoEstado}?`)) {
        $.ajax({
          type: 'POST',
          url: '', // La misma página
          data: {
            solicitudID: solicitudID,
            nuevoEstado: nuevoEstado
          },
          success: function (response) {
            if (response === 'success') {
              alert(`El estado ha sido cambiado a ${nuevoEstado}.`);
              location.reload(); // Recargar la página para ver los cambios
            } else {
              alert('Hubo un problema al actualizar el estado.');
            }
          },
          error: function () {
            alert('No se pudo conectar al servidor.');
          }
        });
      }
    }
  </script>
</body>

</html>