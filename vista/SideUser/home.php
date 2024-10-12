<?php
session_start();
if (!isset($_SESSION['ownerID'])) header('location: ./../login.php');
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
.container-category {
  display: grid;
  grid-template-columns: repeat(4,1fr);
  gap: 40px;
}
.card {
  text-decoration: none !important;
}
.card p {
  font-size: 17px;
  font-weight: 400;
  line-height: 20px;
  color: #666;
}
.card p.small {
  font-size: 14px;
}
.go-corner {
  display: flex;
  align-items: center;
  justify-content: center;
  position: absolute;
  width: 32px;
  height: 32px;
  overflow: hidden;
  top: 0;
  right: 0;
  background-color: #00838d;
  border-radius: 0 4px 0 32px;
}
.go-arrow {
  margin-top: -4px;
  margin-right: -4px;
  color: white;
  font-family: courier, sans;
}
.card1 {
  display: block;
  position: relative;
  max-width: 262px;
  background-color: #f2f8f9;
  border-radius: 4px;
  padding: 32px 24px;
  margin: 12px;
  text-decoration: none !important;
  z-index: 0;
  overflow: hidden;
}
.card1:before {
  content: "";
  position: absolute;
  z-index: -1;
  top: -16px;
  right: -16px;
  background: #00838d;
  height: 32px;
  width: 32px;
  border-radius: 32px;
  transform: scale(1);
  transform-origin: 50% 50%;
  transition: transform 0.25s ease-out;
}
.card1:hover:before {
  transform: scale(21);
}
.card1:hover p {
  transition: all 0.3s ease-out;
  color: rgba(255, 255, 255, 0.8);
}
.card1:hover h3 {
  transition: all 0.3s ease-out;
  color: #fff;
}
.card2 {
  display: block;
  top: 0px;
  position: relative;
  max-width: 262px;
  background-color: #f2f8f9;
  border-radius: 4px;
  padding: 32px 24px;
  margin: 12px;
  text-decoration: none;
  z-index: 0;
  overflow: hidden;
  border: 1px solid #f2f8f9;
}
.card2:hover {
  transition: all 0.2s ease-out;
  box-shadow: 0px 4px 8px rgba(38, 38, 38, 0.2);
  top: -4px;
  border: 1px solid #ccc;
  background-color: white;
}
.card2:before {
  content: "";
  position: absolute;
  z-index: -1;
  top: -16px;
  right: -16px;
  background: #00838d;
  height: 32px;
  width: 32px;
  border-radius: 32px;
  transform: scale(2);
  transform-origin: 50% 50%;
  transition: transform 0.15s ease-out;
}
.card2:hover:before {
  transform: scale(2.15);
}
.card3 {
  display: block;
  top: 0px;
  position: relative;
  max-width: 262px;
  background-color: #f2f8f9;
  border-radius: 4px;
  padding: 32px 24px;
  margin: 12px;
  text-decoration: none;
  overflow: hidden;
  border: 1px solid #f2f8f9;
}
.card3 .go-corner {
  opacity: 0.7;
}
.card3:hover {
  border: 1px solid #00838d;
  box-shadow: 0px 0px 999px 999px rgba(255, 255, 255, 0.5);
  z-index: 500;
}
.card3:hover p {
  color: #00838d;
}
.card3:hover .go-corner {
  transition: opactiy 0.3s linear;
  opacity: 1;
}
.card4 {
  display: block;
  top: 0px;
  position: relative;
  max-width: 262px;
  background-color: #fff;
  border-radius: 4px;
  padding: 32px 24px;
  margin: 12px;
  text-decoration: none;
  overflow: hidden;
  border: 1px solid #ccc;
}
.card4 .go-corner {
  background-color: #00838d;
  height: 100%;
  width: 16px;
  padding-right: 9px;
  border-radius: 0;
  transform: skew(6deg);
  margin-right: -36px;
  align-items: start;
  background-image: linear-gradient(-45deg, #8f479a 1%, #dc2a74 100%);
}
.card4 .go-arrow {
  transform: skew(-6deg);
  margin-left: -2px;
  margin-top: 9px;
  opacity: 0;
}
.card4:hover {
  border: 1px solid #cd3d73;
}
.card4 h3 {
  margin-top: 8px;
}
.card4:hover .go-corner {
  margin-right: -12px;
}
.card4:hover .go-arrow {
  opacity: 1;
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
        <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
        <a href="javascript:void(0);" class="bars"></a>
        <a class="navbar-brand" href="./home.php"> INICIO - USUARIO</a>
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
            <i class="material-icons">flutter_dash</i>
            <span>MASCOTAS</span>
          </a>
          <ul class="ml-menu">
            <li>
              <a href="./pets/register.php">Registrar</a>
            </li>
            <li>
              <a href="./pets/list.php">Listar / Modificar</a>
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
              <a href="./quotes/newQuote.php">Pedir Cita</a>
            </li>
            <li>
              <a href="./quotes/mostrar.php">Listar</a>
            </li>
            <!-- <li>
              <a href="../../folder/servicio">Servicio</a>
            </li>  -->
          </ul>
        </li>

        <li>
          <a href="javascript:void(0);" class="menu-toggle">
            <i class="material-icons">calendar_today</i>
            <span>Tienda</span>
          </a>
          <ul class="ml-menu">
            <li>
              <a href="./sales/sales.php">Compras</a>
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
      <h2 class="text-center">Servicios</h2>
      <br><br>
      <section class="container-category">
        <?php
        $sql = "SELECT nomser FROM service ORDER BY nomser DESC";
        $results = mysqli_query($conn,$sql);

          foreach($results as $row) { ?>
            <a href="/vetdog/vista/SideUser/quotes/newQuote.php" class="card">
              <div class="card1" style="user-select: none;">
                <p><?= $row['nomser']?></p>
                <!-- <p class="small">Aqui descripcion</p> -->
                <div class="go-corner" href="#">
                  <div class="go-arrow"> → </div>
                </div>
              </div>
          </a>
        <?php } ?>
      </section>
          
      <!-- graphics  -->
      <h3 class="text-center">Mascotas Atendidas</h3>
      <section class="container-fluid" style="display: grid;place-items: center">
        <div style="width: 350px;height:350px">
          <canvas id="pets"></canvas>
        </div>
      </section>


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
    const req = await fetch('./data.php?ownerID=<?= $_SESSION['ownerID'] ?>');
    const res = await req.json();

    const optionsLabel = {
      plugins: {
        legend: {
          display: true,
          position: 'bottom'
        }
      }
    }

    new Chart('pets', {
      type: 'pie',
      data: {
        labels: ['Mascotas registradas','Mascotas atendidas'],
        datasets: [{
          label: 'Número total de mascotas',
          data: [res.pet1,res.pet2],
          backgroundColor: ['rgb(54, 162, 235)','#3AF8AC'],
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