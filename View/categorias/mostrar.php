<?php
session_start();
if (!isset($_SESSION['adminID']))
  header('location: ./../login.php');
require_once './../assets/db/connectionMysql.php';
?>

<?php include('./../Includes/Head.php'); ?>

tyle>

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