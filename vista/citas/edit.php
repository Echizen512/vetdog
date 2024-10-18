<?php
session_start();
if (!isset($_SESSION['adminID']) || !isset($_GET['quotesID']))
  header('location: ../login.php');
require_once './../../assets/db/connectionMysql.php';
$quotesID = $_GET['quotesID'];
?>
<!DOCTYPE html>
<html lang="es-ES">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet"
    type="text/css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
  <link href="../../assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
  <link href="../../assets/plugins/node-waves/waves.css" rel="stylesheet" />
  <link href="../../assets/plugins/animate-css/animate.css" rel="stylesheet" />
  <link href="../../css/style.css" rel="stylesheet">
  <link href="../../assets/css/themes/all-themes.css" rel="stylesheet" />
  <link rel="shortcut icon" type="image/x-icon" href="../../assets/img/lll.png" />
  <link href="../../assets/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css">
  <!-- Tippy js  -->
  <script src="../../assets/js/popper.js"></script>
  <script src="../../assets/js/tippy-bundle.umd.js"></script>

  <title>Registrar Clientes Administrador | Beatriz Fagundez</title>
</head>
<style>
  input[type="date"]::-webkit-calendar-picker-indicator {
    background-size: 125% 125%;
    /* Ajusta el tamaño del icono del calendario */
  }

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
      <!-- User Info -->
      <div class="user-info">
        <!-- <div class="image">
          <img src="../../assets/img/mujerico.png" width="48" height="48" alt="User" />
        </div> -->
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

      <!-- Menu -->
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

          <li <li>>
            <a href="javascript:void(0);" class="menu-toggle">
              <i class="material-icons">calendar_today</i>
              <span>CITAS</span>
            </a>
            <ul class="ml-menu">
              <li <li>>
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

  <!--============================CONTENIDO DE LA PÁGINA ==========================================================-->
  <section class="content">
    <div class="container-fluid">
      <div class="alert alert-info">
        <strong>Estimado usuario!</strong> Los campos remarcados con <span class="text-danger">*</span> son necesarios.
      </div>
      <!-- Input -->
      <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="card">
            <div class="header">
              <h2>CREACIÓN DE LA CONSULTA</h2>
            </div>
            <!--==================================================================================================================================================-->
            <div class="body">
              <form method="POST" autocomplete="off" id="form">
                <div class="row clearfix">

                  <div class="col-sm-6">
                    <label for="vete" class="control-label">Veterinario<span class="text-danger">*</span></label>
                    <select name="id_vet" class="form-control show-tick" id="vete" required>
                      <option value="">-- Seleccione un veterinario --</option>
                      <?php
                      $sql = "SELECT id_vet,nomvet,apevet FROM veterinarian";
                      $results = mysqli_query($conn, $sql);

                      foreach ($results as $row) { ?>
                        <option value="<?php echo $row['id_vet'] ?>">
                          <?php echo $row['nomvet'] ?>&nbsp;<?php echo $row['apevet'] ?></option>
                      <?php } ?>
                    </select>
                  </div>

                  <div class="col-sm-6" style="display: flex;flex-direction:column;gap:10px">
                    <p class="control-label">Servicio<span class="text-danger">*</span></p>
                    <?php
                    $sql = "SELECT id_servi,nomser FROM quotes_services AS qs JOIN service s WHERE qs.serviceID = s.id_servi AND qs.quotesID = '$quotesID'";
                    $results = mysqli_query($conn, $sql);

                    $servicesID = [];

                    foreach ($results as $key => $row) {
                      $servicesID[$key] = $row['id_servi'];
                      ?>
                      <input type="checkbox" name="service" id="checkbox-<?= $row['id_servi'] ?>"
                        class="checkbox-services" value="<?= $row['id_servi'] ?>" checked>
                      <label for="checkbox-<?= $row['id_servi'] ?>"><?= $row['nomser'] ?></label>
                    <?php
                    }
                    $excludedIDs = implode(',', $servicesID);

                    // Consulta SQL para seleccionar servicios que no estén en $servicesID
                    $sql = "SELECT id_servi, nomser FROM service WHERE id_servi NOT IN ($excludedIDs)";
                    $results = mysqli_query($conn, $sql);

                    foreach ($results as $key => $row) { ?>
                      <input type="checkbox" name="service" id="checkbox-<?= $row['id_servi'] ?>"
                        class="checkbox-services" value="<?= $row['id_servi'] ?>">
                      <label for="checkbox-<?= $row['id_servi'] ?>"><?= $row['nomser'] ?></label>
                      <?php
                    }
                    ?>
                  </div>
                </div>

                <article class="row clearfix">
                  <div class="col-sm-6">
                    <label class="control-label">Atendido por<span class="text-danger">*</span></label>
                    <div class="input-group">
                      <div class="form-line">
                        <input type="text" name="attended" class="form-control" placeholder="Atendido por..." required>
                      </div>
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <label class="control-label">Precio de la consulta<span class="text-danger">*</span></label>
                    <div class="input-group">
                      <span class="input-group-addon">
                        <i class="material-icons">monetization_on</i>
                      </span>
                      <div class="form-line">
                        <input type="text" id="price-input" name="cost"
                          onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;"
                          class="form-control money-euro" placeholder="Precio... Ex: $19,99" required>
                      </div>
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label class="control-label">Fecha de inicio<span class="text-danger">*</span></label>
                      <div class='input-group date' name="start">
                        <input type='date' name="start" class="form-control" style="" min="<?php echo date('Y-m-d'); ?>"
                          required />
                      </div>
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <label class="control-label">Fecha de fin<span class="text-danger">*</span></label>
                    <div class="form-group">
                      <div class='input-group date' name="end">
                        <input type='date' name="end" class="form-control"
                          min="<?php echo date('Y-m-d', strtotime('+1 day')); ?>" required />
                      </div>
                    </div>
                  </div>

                </article>
                <div class="container-fluid" align="center">
                  <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                  </div>

                  <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                    <a type="button" href="../../folder/citas" class="btn bg-red"><i class="material-icons">cancel</i>
                      LIMPIAR </a>
                  </div>

                  <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                    <button class="btn bg-blue" name="update">CREAR CONSULTA <i class="material-icons">save</i></button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- #END# Input -->
    </div>
  </section>
  <!-- #END# Colored Card - With Loading -->
  <script type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
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
  <!-- Autosize Plugin Js -->
  <script src="../../assets/plugins/autosize/autosize.js"></script>

  <!-- Custom Js -->
  <script src="../../assets/js/admin.js"></script>
  <script src="../../assets/js/pages/forms/basic-form-elements.js"></script>
  <!-- Demo Js -->
  <script src="../../assets/js/demo.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
  <!--------------------------------script nuevo----------------------------->
  <script>
    'use strict';
    // * Vertify if get All data for URL 
    tippy('#price-input', {
      content: 'Por favor, indique el precio de la consulta. El precio de los servicios irá incluido al costo total y será mostrado antes de completar la transacción.',
      placement: 'bottom',
    });

    const form = document.getElementById('form');

    form.addEventListener('submit', async e => {
      e.preventDefault();

      //* Validate services checkbox
      const checkboxesSelected = document.querySelectorAll('input[type="checkbox"]:checked');
      const checkboxValues = [];

      checkboxesSelected.forEach((value, key) => {
        let checkboxValue = checkboxesSelected[key].value;
        checkboxValues.push(checkboxValue);
      });

      if (checkboxValues.length === 0) return swal('Información', 'Por favor elija al menos un servicio', 'info');

      //* Get info the checkbox
      const formInfo = new FormData(form);
      const data = {};

      if (formInfo.get('start') > formInfo.get('end')) return swal('Información', 'La fecha de inicio no puede ser superior a la de finalización', 'info')

      formInfo.forEach((x, key) => {
        if (key !== 'service') data[key] = x;
      });

      const req = await fetch('./editQuote.php?quotesID=<?= $quotesID ?>', {
        method: 'PUT',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ data: data, checkboxValues }),
      });

      const res = await req.json();

      if (res.success) return swal('¡Creada!', '¡Cita creada exitosamente!', 'success').then(() => {
        location.href = '../../folder/citas';
      });
    });
  </script>
</body>

</html>