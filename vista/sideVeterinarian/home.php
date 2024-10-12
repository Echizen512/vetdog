<?php
session_start();
if (!isset($_SESSION['veterinarianID'])) header('location: ./../login.php');
require_once './../../assets/db/connectionMysql.php';
?>
<!DOCTYPE html>
<html lang="es-ES">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Google Font - Iconos -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
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
  <!-- chart js  -->
  <script src="../../assets/js/chart.js"></script>
  
  <title>Inicio | Beatriz Fagundez</title>
</head>
<style>
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
        <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
        <a href="javascript:void(0);" class="bars"></a>
        <a class="navbar-brand" href="./home.php"> INICIO - VETERINARIO</a>
      </div>
    </div>
  </nav>
  <!-- #Top Bar -->

  <section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">

    <!-- Menu -->
    <article class="menu">
      <ul class="list">
        <li class="header">MENÚ DE NAVEGACIÓN</li>
        <li>
          <a href="./home.php">
            <i class="material-icons">home</i>
            <span>INICIO</span>
          </a>
        </li>

        <li>
          <a href="./editProfile.php">
            <i class="material-icons">person</i>
            <span>PERFIL</span>
          </a>
        </li> 

        <li>
          <a href="javascript:void(0);" class="menu-toggle">
            <i class="material-icons">calendar_today</i>
            <span>CITAS</span>
          </a>
          <ul class="ml-menu">
            <li>
              <a href="./quotes/mostrar.php">Listar / Modificar</a>
            </li>
          </ul>
        </li>

        <li>
          <a href="./closeSession.php">
            <i class="material-icons">input</i>
            <span>Cerrar Sesión</span>
          </a>
        </li>

        <aside id="rightsidebar" class="right-sidebar"></aside>
    </article>
  </section>
  <!--============================CONTENIDO DE LA PÁGINA ==========================================================-->
  <section class="content">
    <div class="container-fluid">
      <h2 class="text-center">Gráficas</h2>
      <br><br><br>
    
      <!-- Graphics --> 
        <section class="container-fluid">

          <article class="container-fluid" style="width: 70vw;margin-bottom:10px">
            <div style="height: 400px;margin: 10px auto;display:flex;gap:40px;width:100%;justify-content:center;align-items: center;">
              <div style="width: 40%;display:flex;flex-direction: column;justify-content:center;align-items: center;">
                <h3>Servicios realizados<br><h4>(último cuatrimestre)<h4></h3>
                <canvas id="services"></canvas>
              </div>
              <div style="width: 40%;display:flex;flex-direction: column;justify-content:center;align-items: center;">
                <h3>Mascotas registradas<br><h4>(último cuatrimestre)<h4></h3>
                <canvas id="pets"></canvas>
              </div>
            </div>
          </article>

          <hr style="margin: 50px auto;border:transparent">
          
        </section>

      </article> -->
    </div>
    <!-- #END# Input -->
    </div>
  </section>

  <!-- Jquery Core Js -->
  <script src="../../assets/plugins/jquery/jquery.min.js"></script>
  <script src="../../assets/js/funciones/tipo.js"></script>
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
  <!-- Moment Plugin Js -->

  <!-- Custom Js -->
  <script src="../../assets/js/admin.js"></script>
  <script src="../../assets/js/pages/forms/basic-form-elements.js"></script>
  <!-- Demo Js -->

  <script src="../../assets/js/demo.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>


  <script>
//* Get data and show results in graphics
addEventListener('load',() => {
  (getData = async () => { 
    const req = await fetch('./data.php');
    const res = await req.json();

    const optionsLabel = {
      plugins: {
        legend: {
          display: true,
          position: 'bottom'
        }
      }
    }

    new Chart('services', {
      type: 'pie',
      data: {
        labels: [res.service1[1], res.service2[1],res.service3[1], res.service4[1]],
        datasets: [{
          label: 'Cantidad de servicios realizados',
          data: [res.service1[0],res.service2[0],res.service3[0],res.service4[0]],
          backgroundColor: ['#94053E','rgb(255, 99, 132)','rgb(54, 162, 235)','#08D382'],
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
          label: 'Número de mascotas registrados',
          data: [res.pet1[0],res.pet2[0],res.pet3[0],res.pet4[0]],
          backgroundColor: ['#94053E','rgb(255, 99, 132)','rgb(54, 162, 235)','#08D382'],
          hoverOffset: 10,
        }]
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