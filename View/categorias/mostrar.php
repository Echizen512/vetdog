<?php
session_start();
if (!isset($_SESSION['adminID']))
  header('location: ./../login.php');
require_once './../assets/db/connectionMysql.php';
?>

<?php include('./../Includes/Head.php'); ?>

<style>
  .swal2-popup {
    width: 500px;
    /* Ancho deseado */
    height: 300px;
    /* Alto deseado */
  }

  .swal2-title {
    font-size: 28px;
    /* Tamaño de fuente para el título */
  }

  #swal2-html-container {
    font-size: 20px;
    /* Tamaño de fuente para el contenido */
  }

  .swal2-confirm,
  .swal2-cancel {
    font-size: 18px !important;
    /* Tamaño de fuente para el botón de confirmación */
    padding: 10px 18px !important;
    /* Padding del botón de confirmación */
  }

  .swal2-icon {
    font-size: 12px;
    /* Tamaño de fuente para el icono */
  }

  .swal2-select {
    display: none !important;
    opacity: 0 !important;
  }
</style>

<body class="theme-red">
 

  <?php include('./../Includes/Loader.php'); ?>

   
  <div class="overlay"></div>
  

  
  <nav class="navbar">
    <div class="container-fluid">
      <div class="navbar-header">
        <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse"
          data-target="#navbar-collapse" aria-expanded="false"></a>
        <a href="javascript:void(0);" class="bars"></a>
        <a class="navbar-brand" href="../panel-admin/administrador"> CONSULTORIO - BEATRIZ FAGUNDEZ </a>
      </div>
    </div>
  </nav>
 

  <section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
       
      <div class="user-info">
 
        <div class="info-container">
          <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?php echo ucfirst($_SESSION['name']); ?></div>
          <div class="btn-group user-helper-dropdown">
            <i class="material-icons" data-toggle="dropdown" aria-haspopup="true"
              aria-expanded="true">keyboard_arrow_down</i>
            <ul class="dropdown-menu pull-right">
              <li><a href="../pages-logout"><img src="../../assets/icons/MaterialSymbolsLightExitToApp.svg"
                    style="width: 25px"> Cerrar Sesión</a></li>
              <li><a href="./../panel-admin/edit-admin.php" style="display: flex;gap: 5px;"><img
                    src="./../../assets/icons/IconParkSolidConfig.svg" style="width: 25px">Editar perfil</a></li>
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
  <!--=============================================================CONTENIDO DE LA PÁGINA =============================================================-->
  <section class="content">
    <div class="container-fluid">
      <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="card">
            <div class="header">
              <h2>Listado de categorías :</h2>
              <br>

            </div>
            <div class="body">
              <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                  <thead>
                    <tr>
                      <th class="text-center">Nº</th>
                      <th class="text-center">NOMBRE</th>
                      <th class="text-center">FECHA</th>
                      <th class="text-center">ACCIONES</th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php
                    $sql = "SELECT * FROM category ORDER BY fere DESC";

                    $results = mysqli_query($conn, $sql);
                    foreach ($results as $key => $row) { ?>
                      <tr>
                        <td class="text-center"><?= $key + 1 ?></td>
                        <td class="text-center"><?= $row['nomcate']; ?></td>
                        <td class="text-center"><?= date('d/m/Y', strtotime($row['fere'])) ?></td>
                        <td style="display: flex;justify-content: center;gap:5px">
                          <a type="button" href="../vista/categorias/edit?id=<?= $row["id_cate"]; ?>"
                            class="btn bg-blue btn-circle waves-effect waves-circle waves-float btnEdit">
                            <i class="material-icons">autorenew</i>
                          </a>
                          <!--- <button class="btn bg-red btn-circle waves-effect waves-circle waves-float btnDelete" id="<?= $row["id_cate"]; ?>">
                              <i class="material-icons">delete</i>
                            </button> --->
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

 
  <script src="../assets/plugins/jquery/jquery.min.js"></script>
 
  <script src="../assets/plugins/bootstrap/js/bootstrap.js"></script>
 
  <script src="../assets/plugins/bootstrap-select/js/bootstrap-select.js"></script>
 
  <script src="../assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
   
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

  
  <script src="../assets/js/admin.js"></script>
  <!-- <script src="../assets/js/pages/tables/jquery-datatable.js"></script> -->

  <!-- sweetalert2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- Demo Js -->
  <script src="../assets/js/demo.js"></script>

  <script>
    'use strict';
    document.querySelectorAll('.btnEdit').forEach(btn => {
      tippy(btn, {
        content: 'Editar',
        placement: 'bottom',
      })
    })

    document.querySelectorAll('.btnDelete').forEach(btn => {
      tippy(btn, {
        content: 'Eliminar',
        placement: 'bottom',
      })
    })

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
        }).then(async (result) => {
          if (result.isConfirmed) {
            const categoryID = btnDelete.id;
            const req = await fetch(`../vista/categorias/borrar.php?deleteID=${categoryID}`);
            const res = await req.json();

            if (res.success) Swal.fire('¡Eliminado!', '¡Categoría eliminado exitositamente!', 'success').then(() => location.reload());
            else if (res.error) Swal.fire('¡Error!', '¡No puede eliminar categorías con productos!', 'error');
          }
        });
      });
    });

    $(document).ready(function () {
      $('.js-exportable').DataTable({
        responsive: true,
        "language": {
          "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
        }
      });
    });
  </script>
  <?php
  if (isset($_POST["update"])) {
    $id = $_GET['id'];
    $nomcate = $_POST['nomcate'];

    $sql = "SELECT id_cate FROM category WHERE id_cate = '$id'";
    $result = mysqli_query($conn, $sql);

    // Validamos si hay resultados
    if (mysqli_num_rows($result) < 0) { ?>
      <script type="text/javascript">
        swal("Error", "Ha ocurrido un error", "error");
      </script>
      <?php
    } else {
      $sql2 = "UPDATE category SET nomcate = '$nomcate' WHERE id_cate = '$id'";

      if (mysqli_query($conn, $sql2)) { ?>
        <script type="text/javascript">
          swal("¡Actualizado!", "Actualizado correctamente", "success").then(() => {
            window.location = "categorias";
          });
        </script>
        <?php
      } else {
        echo "Error: " . $sql2 . "" . mysqli_error($conn);
      }
    }
    $conn->close();
  }
  if (isset($_SESSION['message'])) { ?>
    <script type="text/javascript">
      const msg = '<?php echo $_SESSION['message'] ?>';

      if (msg.includes('eliminar')) {
        swal("Error", msg, "error").then(() => {
          window.location = "categorias";
        });
      } else {
        swal("¡Eliminado!", msg, "success").then(() => {
          window.location = "categorias";
        });
      }
    </script>
    <?php
    unset($_SESSION['message']);
  }
  ?>
</body>

</html>