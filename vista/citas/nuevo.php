<?php
session_start();

if (!isset($_SESSION['adminID']))
  header('location: ../login.php');
require_once './../../assets/db/connectionMysql.php';

?>
<!DOCTYPE html>
<html lang="es-ES">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Google Font - Iconos -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet"
    type="text/css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
  <!-- Bootstrap Select Css -->
  <link href="../../assets/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
  <!-- Bootstrap Core Css -->
  <link href="../../assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
  <!-- Waves Effect Css -->
  <link href="../../assets/plugins/node-waves/waves.css" rel="stylesheet" />
  <!-- Animation Css -->
  <link href="../../assets/plugins/animate-css/animate.css" rel="stylesheet" />
  <link href="../../css/style.css" rel="stylesheet">
  <link href="../../assets/css/themes/all-themes.css" rel="stylesheet" />
  <link rel="shortcut icon" type="image/x-icon" href="../../assets/img/lll.png" />

  <!-- Tippy js  -->
  <script src="../../assets/js/popper.js"></script>
  <script src="../../assets/js/tippy-bundle.umd.js"></script>
  <title>Registrar Clientes Administrador | Beatriz Fagundez</title>
</head>
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
        <a class="navbar-brand" href="../panel-admin/administrador"> CONSULTORIO - BEATRIZ FAGUNDEZ</a>
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
          <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?php echo ucfirst($_SESSION['name']); ?></div>
          <div class="btn-group user-helper-dropdown">
            <i class="material-icons" data-toggle="dropdown" aria-haspopup="true"
              aria-expanded="true">keyboard_arrow_down</i>
            <ul class="dropdown-menu pull-right">
              <li><a href="../pages-logout"><img src="./../../assets/icons/MaterialSymbolsLightExitToApp.svg"
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
            </ul>
          </li>

          <li>
            <a href="javascript:void(0);" class="menu-toggle">
              <i class="material-icons">assessment</i>
              <span>BITÁCORA</span>
            </a>
            <ul class="ml-menu">
              <li>
                <a href="../audit/mostrar.php">Mostrar</a>
              </li>
            </ul>
          </li>

          <aside id="rightsidebar" class="right-sidebar">
          </aside>
  </section>

  <!--============================CONTENIDO DE LA PÁGINA ==========================================================-->
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
                        <!-- #END# Exportable Table -->
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
  <!-- #END# Colored Card - With Loading -->

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