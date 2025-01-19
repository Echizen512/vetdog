<?php
session_start();
  if (!isset($_SESSION['adminID']))
    header('location: ../vista/login.php');
require_once '../assets/db/connectionMysql.php';
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



  <?php include('./../Includes/Nav.php'); ?>


  <?php include '../Includes/Sidebar.php'; ?>


  <section class="content">
    <div class="container-fluid">
      <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="card">
            <div class="header">
              <h2>Listado de las razas de mascotas :</h2>
              <br>

              <a type="button" href="../vista/raza/nuevo" class="btn bg-light-green waves-effect">
                <span>NUEVO</span>
                <i class="material-icons">call_missed</i>
              </a>

            </div>
            <div class="body">
              <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                  <thead>
                    <tr>
                      <th class="text-center">Nº</th>
                      <th class="text-center">NOMBRE</th>
                      <th class="text-center">TIPO</th>
                      <th class="text-center">ESTADO</th>
                      <th class="text-center">ACCIONES</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    foreach ($dato as $key => $value) {
                      foreach ($value as $key => $va) { ?>
                        <tr>
                          <td class="text-center"><?= $key + 1 ?></td>
                          <td class="text-center"><?= $va['nomraza']; ?></td>
                          <td class="text-center"><?= $va['noTiM']; ?></td>
                          <td class="text-center"><?php
                          if ($va['estado'] == 1) { ?>
                              <form method="get" action="javascript:activo('<?php echo $va['id_raza']; ?>')">
                                <span class="label label-success">Activo</span>
                              </form>
                            <?php
                          } else { ?>
                              <form method="get" action="javascript:inactivo('<?php echo $va['id_raza']; ?>')">
                                <button type="submit" class="btn btn-danger btn-xs">Inactivo</button>
                              </form>
                            <?php } ?>
                          </td>
                          <td style="display: flex;justify-content: center;gap: 5px">
                            <a type="button" href="../vista/raza/edit?id=<?php echo $va["id_raza"]; ?>"
                              class="btn bg-blue btn-circle waves-effect waves-circle waves-float btnEdit">
                              <i class="material-icons">autorenew</i>
                            </a>
                            <button class="btn bg-red btn-circle waves-effect waves-circle waves-float btnDelete"
                              id="<?= $va["id_raza"] ?>">
                              <i class="material-icons">delete</i>
                            </button>
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

    </div>
  </section>

  <?php include('./../Includes/Footer.php'); ?>

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
            const idRaza = btnDelete.id;
            const req = await fetch(`./../../vetdog/vista/raza/borrar.php?deleteID=${idRaza}`);
            const res = await req.json();

            if (res.success) Swal.fire('¡Eliminado!', '¡Raza eliminada exitositamente!', 'success').then(() => location.reload());
            else if (res.error) Swal.fire('¡Error!', '¡Ocurrió un error', 'error');
            else if (res.no) Swal.fire('¡Error!', '¡Ocurrió un error', 'error');
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
</body>

</html>