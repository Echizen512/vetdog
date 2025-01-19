<?php
session_start();

if (!isset($_SESSION['adminID']))
  header('location: ../login.php');
require_once './../../assets/db/connectionMysql.php';

?>

<?php include('./../Includes/Head.php'); ?>

<body class="theme-red">

  <?php include('./../Includes/Loader.php'); ?>


  <div class="overlay"></div>


  <?php include('./../Includes/Nav.php'); ?>


  <?php include '../Includes/Sidebar.php'; ?>


  <section class="content">
    <div class="container-fluid">
      <div class="block-header">
        <h1>Generar Cita</h1>
      </div>
      <br>
      <br>

      <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="card">
            <div class="header">
              <h2>CREACIÓN DE CITA</h2>
            </div>

            <div class="body">
              <form method="POST" autocomplete="off">
                <div class="row clearfix">

                  <?php
                  if (!isset($_SESSION['search_owner'])) {
                    ?>
                    <div class="col-sm-12">
                      <label class="control-label">Cédula del cliente</label>
                      <div class="form-group">
                        <div class="form-line">
                          <input type="text" name="dni" class="form-control" placeholder="Ingrese la cédula"
                            onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;"
                            maxlength="8" />
                        </div>
                      </div>
                    </div>

                    <div class="container-fluid my-5" align="center">
                      <button class="btn bg-blue mx-auto" name="search">BUSCAR <i
                          class="material-icons">search</i></button>
                    </div>

                    <!-- Show all info the owner and your pets -->
                  <?php } else {
                    $owner_id = $_SESSION['owner_id'];
                    $sql = "SELECT * FROM owner WHERE id_due = '$owner_id'";

                    $results = mysqli_query($conn, $sql);
                    foreach ($results as $row) { ?>
                      <article style="padding: 0 30px;">
                        <div class="col-sm-6">
                          <label class="control-label">Nombre del cliente</label>
                          <h3 style="margin: 0;"><?php echo $row['nom_due'] ?></h3>
                        </div>

                        <div class="col-sm-6">
                          <label class="control-label">Apellido del cliente</label>
                          <h3 style="margin: 0;"><?php echo $row['ape_due'] ?></h3>
                        </div>

                        <div class="col-sm-6">
                          <label class="control-label">Cédula del cliente</label>
                          <h3 style="margin: 0;"><?php echo $row['dni_due'] ?></h3>
                        </div>

                        <div class="col-sm-6">
                          <label class="control-label">Télefono del cliente</label>
                          <h3 style="margin: 0;"><?php echo $row['movil'] ?></h3>
                        </div>
                      </article>

                    <?php } ?>

                    <section class="col-sm-12">
                      <article class="container-fluid" style="margin-top: 40px;">
                        <div class="row clearfix">
                          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="card">
                              <div class="header">
                                <h2>Listado de las mascotas de <?= $row['nom_due'] ?> &nbsp; <?= $row['ape_due'] ?></h2>
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
                                        <th class="text-center">RAZA</th>
                                        <th class="text-center">SEXO</th>
                                        <th class="text-center">ACCIONES</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <?php
                                      $sql = "SELECT p.id_pet,p.nomas,p.sexo,r.nomraza,pt.noTiM FROM pet AS p JOIN owner AS o JOIN raza AS r JOIN pet_type AS pt WHERE r.id_raza = p.id_raza AND pt.id_tiM = p.id_tiM AND o.id_due = p.id_due AND o.id_due = '$owner_id'";
                                      $results = mysqli_query($conn, $sql);

                                      foreach ($results as $key => $va) { ?>
                                        <tr>
                                          <td class="text-center"><?= $key + 1 ?></td>
                                          <td class="text-center"><?= $va['nomas']; ?></td>
                                          <td class="text-center"><?= $va['noTiM']; ?></td>
                                          <td class="text-center"><?= $va['nomraza']; ?></td>
                                          <td class="text-center"><?= $va['sexo']; ?></td>
                                          <td style="display: flex;justify-content: center;">
                                            <button value="<?= $va['id_pet'] ?>" type="button"
                                              class="btn-select-pet btn btn btn-circle waves-effect waves-circle waves-float"
                                              style="display: grid;place-items: center;"><img
                                                src="./../../assets/icons/FluentCheckboxUnchecked12Regular.svg"
                                                style="width: 100%;height: 100%;transform: scale(1.5);"></button>
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

                      </article>

                    </section>

                    <div class="container-fluid">
                      <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3"></div>

                      <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <a type="button" id="btn-clear" href="../../folder/veterinarios" class="btn bg-red"><i
                            class="material-icons">cancel</i> LIMPIAR </a>
                      </div>

                      <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <button type="button" id="btn-add" class="btn bg-blue" name="agregar"
                          style="display: flex;justify-content: center;align-items: center;">IR A CONSULTA <img
                            src="./../../assets/icons/MaterialSymbolsArrowForward.svg" alt="arrow"
                            style="width: 25px;height: 25px;"></button>
                      </div>
                    </div>
                  <?php } ?>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  <script src="../../assets/plugins/jquery/jquery.min.js"></script>
  <script src="../../assets/plugins/bootstrap/js/bootstrap.js"></script>
  <script src="../../assets/plugins/bootstrap-select/js/bootstrap-select.js"></script>
  <script src="../../assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
  <script src="../../assets/plugins/node-waves/waves.js"></script>
  <script src="../../assets/plugins/autosize/autosize.js"></script>
  <script src="../../assets/js/admin.js"></script>
  <script src="../../assets/js/pages/forms/basic-form-elements.js"></script>
  <script src="../../assets/js/demo.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

  <?php
  if (isset($_POST["search"])) {
    // if send dates empty 
    if (empty($_POST['dni'])) { ?>
  <script type="text/javascript">
    swal("Importante", "Seleccione una cédula", "info");
  </script>
  <?php
    } else {
      $dni = $_POST['dni'];
      $sql = "SELECT id_due FROM owner WHERE dni_due = '$dni'";

      $results = mysqli_query($conn, $sql);

      if ($results->num_rows > 0) {
        foreach ($results as $row) {
          $id_due = $row['id_due'];
        }
        $_SESSION['search_owner'] = true;
        $_SESSION['owner_id'] = $id_due;
        ?>
  <script>location.href = './nuevo.php'</script>
  <?php
      } else { ?>
  <script>
    swal("Ops...", "No se encontró el usuario", "error");
  </script>
  <?php
      }
    }
  }
  ?>

  <!-- Select pets with btn  -->
  <script>
    'use strict';

    const btns = document.querySelectorAll('.btn-select-pet');
    let count = 0;

    let valoresSeleccionados = [];

    btns.forEach((btn) => {
      let isChecked = false;

      tippy(btns, {
        content: 'Atender Mascota',
        placement: 'right',
      });

      btn.addEventListener('click', () => {
        if (isChecked) {
          btn.innerHTML = '';
          const imgNoCheck = document.createElement('img');
          imgNoCheck.src = './../../assets/icons/FluentCheckboxUnchecked12Regular.svg';
          imgNoCheck.style.width = '100%';
          imgNoCheck.style.height = '100%';
          imgNoCheck.style.transform = 'scale(1.5)';
          btn.appendChild(imgNoCheck);
          count--;

          let index = valoresSeleccionados.indexOf(btn.value);
          if (index !== -1) valoresSeleccionados.splice(index, 1);
        } else {
          btn.innerHTML = '';
          const imgCheck = document.createElement('img');
          imgCheck.src = './../../assets/icons/FluentCheckboxChecked24Regular.svg';
          imgCheck.style.width = '100%';
          imgCheck.style.height = '100%';
          imgCheck.style.transform = 'scale(1.5)';
          btn.appendChild(imgCheck);
          count++;
          valoresSeleccionados.push(btn.value);
        }
        isChecked = !isChecked;
      });
    });

    // Save all info 
    const btnAdd = document.getElementById('btn-add');
    if (btnAdd) {
      btnAdd.addEventListener('click', () => {
        if (count > 0) {
          location.href = `./cita_rapida.php?pet_id=${encodeURIComponent(valoresSeleccionados.join(','))}`
        } else {
          swal('Advertencia', 'Tiene que seleccionar alguna mascota', 'info');
        }
      })
    }

    //Clear info the user
    const btnClear = document.getElementById('btn-clear');
    if (btnClear) {
      btnClear.addEventListener('click', async () => {
        const req = await fetch('./nuevo.php?clear-session=true');
        location.reload();
      });
    }
  </script>

  <?php
  if (isset($_GET['clear-session'])) {
    if (isset($_SESSION['search_owner']))
      unset($_SESSION['search_owner']);
  }
  ?>
</body>

</html>