<?php
session_start();

if (!isset($_SESSION['adminID']))
  header('location: ./../login.php');
require_once '../assets/db/connectionMysql.php';

?>

<?php include('./../Includes/Head.php'); ?>

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
                            <?php } ?>
                          </td>
                          <td style="display: grid;place-items:center">
                            <a type="button" href="../vista/clientes/edit?id=<?php echo $va["id_due"]; ?>"
                              class="btn bg-blue btn-circle waves-effect waves-circle waves-float btnEdit">
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
      
    </div>
  </section>

 
  <?php include('./../Includes/Footer.php'); ?>

  <?php
  if (isset($_SESSION['message'])) { ?>
    <script type="text/javascript">
      const msg = '<?php echo $_SESSION['message'] ?>';

      if (msg.includes('pudo')) {
        swal("Error", msg, "error").then(function () {
          window.location = "clientes";
        });
      } else {
        swal("¡Actualizado!", msg, "success").then(function () {
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