<?php
session_start();
if (!isset($_SESSION['adminID'])) header('location: ./../login.php');
require_once './../../assets/db/connectionMysql.php';
?>
<!DOCTYPE html>
<html lang="es-ES">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, adminID-scalable=no" name="viewport">
 
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
 
  <link href="../../assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

 
  <link href="../../assets/plugins/node-waves/waves.css" rel="stylesheet" />
  
  <link href="../../assets/plugins/animate-css/animate.css" rel="stylesheet" />
  <link href="../../css/style.css" rel="stylesheet">
  <link href="../../assets/css/themes/all-themes.css" rel="stylesheet" />
  <link rel="shortcut icon" type="image/x-icon" href="../../assets/img/lll.png" />
  <!-- ChartJS -->
  <script src="../../assets/js/chart.js"></script>

  <title>Inicio Administrador | Beatriz Fagundez</title>
</head>
<style>
.swal2-popup {
  width: 500px; /* Ancho deseado */
  height: 330px; /* Alto deseado */
}
.swal2-title {
  font-size: 28px; /* Tamaño de fuente para el título */
}

#swal2-html-container {
  font-size: 20px; /* Tamaño de fuente para el contenido */
}
.swal2-confirm, .swal2-cancel {
  font-size: 18px !important; /* Tamaño de fuente para el botón de confirmación */
  padding: 10px 18px !important; /* Padding del botón de confirmación */
}
.swal2-icon {
  font-size: 12px; /* Tamaño de fuente para el icono */
}
.swal2-select {
  display: none !important;
  opacity: 0 !important;
}
</style>
<body class="theme-red">
 
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
   

   
  <div class="overlay"></div>
  

  
  <nav class="navbar">
    <div class="container-fluid">
      <div class="navbar-header">
        <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
        <a href="javascript:void(0);" class="bars"></a>
        <a class="navbar-brand" href="administrador">CONSULTORIO - BEATRIZ FAGUNDEZ</a>
      </div>
      <div class="collapse navbar-collapse" id="navbar-collapse">
      </div>
    </div>
  </nav>
 

  <section>
     
    <aside id="leftsidebar" class="sidebar">
       
      <div class="user-info">
        <!-- <div class="image">
          <img src="../assets/img/mujerico.png" width="48" height="48" alt="User" />
        </div> -->
        <div class="info-container">
          <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo ucfirst($_SESSION['name']); ?></div>
          <div class="btn-group user-helper-dropdown">
            <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
            <ul class="dropdown-menu pull-right">
              <li><a href="../pages-logout"><img src="../../assets/icons/MaterialSymbolsLightExitToApp.svg" style="width: 25px"> Cerrar Sesión</a></li>
              <li><a href="/vetdog/vista/panel-admin/edit-admin.php" style="display: flex;gap: 5px;"><img src="../../assets/icons/IconParkSolidConfig.svg" style="width: 25px">Editar perfil</a></li>
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
                <a href="../citas/mostrar.php">Listar / Modificar</a>
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
                <a href="../citas/solicitud.php" style="display: flex;align-items:center;gap:5px">Solicitudes <span style="display: grid;place-items:center;margin: 0;color:#b00"><?= $numberRequest ?></span></a>
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

          <aside id="rightsidebar" class="right-sidebar"></aside>
      </div>
  </section>
  <!--=============================================================CONTENIDO DE LA PÁGINA =============================================================-->

  <section class="content">
    <h2 class="text-center" style="margin-bottom: 15px;">Gráficas</h2>

    <br><br><br>
    <section class="container-fluid" id="container-graphics">

    <!-- Graphics -->
      <article class="container-fluid" style="width: 70vw;margin-bottom:10px">
        <div style="height: 400px;margin: 10px auto;display:flex;gap:40px;width:100%;justify-content:center;align-items: center;">

          <div style="width: 40%;display:flex;flex-direction: column;justify-content:center;align-items:center;">
            <h3>Dinero Generado<br><h4>(último cuatrimestre)<h4></h3>

            <canvas id="money"></canvas>
          </div>

          <div style="width: 40%;display:flex;flex-direction: column;justify-content:center;align-items: center;">
            <h3>Servicios más realizados<br><h4>(último cuatrimestre)<h4></h3>
            <canvas id="service"></canvas>
          </div>
        </div>
      </article>

      <hr style="margin: 50px auto;border:transparent">

      <article class="container-fluid" style="width: 70vw;margin-bottom:10px">
        <div style="height: 400px;margin: 20px auto;display:flex;gap:40px;width:100%;justify-content:center;align-items: center;">
          <div style="width: 40%;display:flex;flex-direction: column;justify-content:center;align-items: center;">
            <h3>Clientes registrados <br><h4>(último cuatrimestre)<h4></h3>
            <canvas id="clients"></canvas>
          </div>
          <div style="width: 40%;display:flex;flex-direction: column;justify-content:center;align-items: center;">
            <h3>Mascotas registradas<br><h4>(último cuatrimestre)<h4></h3>
            <canvas id="pets"></canvas>
          </div>
        </div>
      </article>

      <hr style="margin: 50px auto;border:transparent">
      
      <article class="container-fluid" style="width: 70vw;margin-bottom:10px">
        <div style="height: 400px;margin: 10px auto;display:flex;gap:40px;width:100%;justify-content:center;align-items: center;">

          <div style="width: 40%;display:flex;flex-direction: column;justify-content:center;align-items:center;">
            <h3>Veterinarios registrados<br><h4>(último cuatrimestre)<h4></h3>

            <canvas id="veterinarians"></canvas>
          </div>

          <div style="width: 40%;display:flex;flex-direction: column;justify-content:center;align-items: center;">
            <h3>Citas registradas<br><h4>(último cuatrimestre)<h4></h3>

            <canvas id="quotes"></canvas>
          </div>
        </div>
      </article>

    </section>
  </section>
 
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.js"></script>

 
  <script src="../../assets/plugins/bootstrap/js/bootstrap.js"></script>
  <!-- Js Booststrap -->
  <script src="../../assets/plugins/bootstrap-select/js/bootstrap-select.js"></script>
  <!--Js Scroll - Barra de Desplazamiento del Menú -->
  <script src="../../assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
  <!--Js Efectos de Página Completa -->
  <script src="../../assets/plugins/node-waves/waves.js"></script>
  <!-- JS Conteo de Números del SubMenú-->
  <script src="../../assets/plugins/jquery-countto/jquery.countTo.js"></script>
  
  <script src="../../assets/js/admin.js"></script>
  <script src="../../assets/js/pages/index.js"></script>

<script>
//* Get data and show results in graphics
addEventListener('load',() => {
  (getData = async () => { 
    const req = await fetch('./data.php');
    const res = await req.json();

    let labelServiceName = [];
    let labelServiceTotalPrice = [];

    if(res.service.length > 0) {
      res.service.forEach(value => {
        labelServiceName.push(value.name);
        labelServiceTotalPrice.push(value.price)
      })
    } 

    const backgroundColorArr = ['#FF6384','#70BEF1','#08D382','#94053E','#C9002C','#EB37A3','#62EFCF','#4a69bd','#9b59b6']

    const optionsLabel = {
      plugins: {
        legend: {
          display: true,
          position: 'bottom'
        }
      }
    }

    new Chart('money', {
      type: 'pie',
      data: {
        labels: [res.money1[1], res.money2[1], res.money3[1], res.money4[1]],
        datasets: [{
          label: 'Dinero Generado $',
          data: [res.money1[0],res.money2[0],res.money3[0],res.money4[0]],
          backgroundColor: ['#94053E', 'rgb(255, 99, 132)', 'rgb(54, 162, 235)', '#08D382'],
          hoverOffset: 10,
        }]
      },
      options: optionsLabel,
    });

    new Chart('service', {
      type: 'pie',
      data: {
        labels: labelServiceName,
        datasets: [{
          label: 'Dinero Generado $',
          data: labelServiceTotalPrice,
          backgroundColor: backgroundColorArr,
          hoverOffset: 10,
        }]
      },
      options: optionsLabel,
    });

    new Chart('clients', {
      type: 'pie',
      data: {
        labels: [res.user1[1], res.user2[1], res.user3[1], res.user4[1]],
        datasets: [{
          label: 'Número de clientes registrados',
          data: [res.user1[0], res.user2[0], res.user3[0], res.user4[0]],
          backgroundColor: ['#94053E', 'rgb(255, 99, 132)', 'rgb(54, 162, 235)', '#08D382'],
          hoverOffset: 10,
        }]
      },
      options: optionsLabel,
    });

    new Chart('pets', {
      type: 'pie',
      data: {
        labels: [res.pet1[1], res.pet2[1],res.pet3[1], res.pet4[1]],
        datasets: [{
          label: 'Número de mascotas registradas',
          data: [res.pet1[0],res.pet2[0],res.pet3[0],res.pet4[0]],
          backgroundColor: ['#94053E','rgb(255, 99, 132)','rgb(54, 162, 235)','#08D382'],
          hoverOffset: 10,
        }],
      },
      options: optionsLabel,
    });

    new Chart('veterinarians', {
      type: 'pie',
      data: {
        labels: [res.pet1[1], res.pet2[1],res.pet3[1], res.pet4[1]],
        datasets: [{
          label: 'Número de veterinarios registrados',
          data: [res.pet1[0],res.pet2[0],res.pet3[0],res.pet4[0]],
          backgroundColor: ['#94053E','rgb(255, 99, 132)','rgb(54, 162, 235)','#08D382'],
          hoverOffset: 10,
        }],
      },
      options: optionsLabel,
    });

    new Chart('quotes', {
      type: 'pie',
      data: {
        labels: [res.quotes1[1], res.quotes2[1],res.quotes3[1], res.quotes4[1]],
        datasets: [{
          label: 'Número de citas registradas',
          data: [res.quotes1[0],res.quotes2[0],res.quotes3[0],res.quotes4[0]],
          backgroundColor: ['#94053E','rgb(255, 99, 132)','rgb(54, 162, 235)','#08D382'],
          hoverOffset: 10,
        }],
      },
      options: optionsLabel,
    });

  })();
});

</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.min.js" integrity="sha512-L0Shl7nXXzIlBSUUPpxrokqq4ojqgZFQczTYlGjzONGTDAcLremjwaWv5A+EDLnxhQzY5xUZPWLOLqYRkY0Cbw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="./main.js"></script>
</body>
</html>