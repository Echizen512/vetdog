<?php
session_start();
if (!isset($_SESSION['ownerID'])) header('location: ./../../login.php');
$ownerID = $_SESSION['ownerID'];

require_once './../../../assets/db/connectionMysql.php';
?>
<!DOCTYPE html>
<html lang="es-ES">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link href="../../../assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />
  <!-- Bootstrap DatePicker Css -->
  <link href="../../../assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.css" rel="stylesheet" />
 
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
 
  <link href="../../../assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
 
  <link href="../../../assets/plugins/node-waves/waves.css" rel="stylesheet" />
  
  <link href="../../../assets/plugins/animate-css/animate.css" rel="stylesheet" />
  <link href="../../../css/style.css" rel="stylesheet">
  <link href="../../../assets/css/themes/all-themes.css" rel="stylesheet" />
  <link rel="shortcut icon" type="image/x-icon" href="../../../assets/img/lll.png" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.9/sweetalert2.all.min.js" integrity="sha512-IZ95TbsPTDl3eT5GwqTJH/14xZ2feLEGJRbII6bRKtE/HC6x3N4cHye7yyikadgAsuiddCY2+6gMntpVHL1gHw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  
  <title>Inicio | Beatriz Fagundez</title>
</head>
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
        <a class="navbar-brand" href="./home.php"> PERFIL - USUARIO </a>
      </div>
    </div>
  </nav>
 

  <section>
     
    <aside id="leftsidebar" class="sidebar">

     
    <article class="menu">
      <ul class="list">
        <li class="header">MENÚ DE NAVEGACIÓN</li>
        <li>
          <a href="./../home.php">
            <i class="material-icons">home</i>
            <span>INICIO</span>
          </a>
        </li>

        <li>
          <a href="./../editProfile.php">
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
              <a href="./../pets/newQuote.php">Pedir Cita</a>
            </li>
            <li>
              <a href="./../pets/list.php">Listar / Modificar</a>
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
              <a href="./../quotes/newQuote.php">Pedir Cita</a>
            </li>
            <li>
              <a href="./../quotes/mostrar.php">Listar</a>
            </li>
            <!-- <li>
              <a href="../../../folder/servicio">Servicio</a>
            </li>  -->
          </ul>
        </li>

        <li>
              <a href="javascript:void(0);" class="menu-toggle">
                <i class="material-icons">store</i>
                <span>Tienda</span>
              </a>
              <ul class="ml-menu">
                <li>
                  <a href="../sales/sales.php">Compras</a>
                </li>
              </ul>
            </li>


            <li>
              <a href="./../Veterinarian.php">
                <i class="material-icons">chat</i>
                <span>CHAT</span>
              </a>
            </li>

        <li>
          <a href="./../closeSession.php">
            <i class="material-icons">input</i>
            <span>Cerrar Sesión</span>
          </a>
        </li>

        <aside id="rightsidebar" class="right-sidebar"></aside>
    </article>
  </section>
   
  <section class="content">
    <div class="container-fluid">
      <!-- Input -->
      <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="card">
            <div class="header">
              <h2>SOLICITAR CITA</h2>
            </div>

            <div class="body">
              <div class="row clearfix">

                <div class="col-sm-6" style="display: flex;flex-direction:column;gap:10px">
                  <form method="POST" autocomplete="off" id="formServices">
                    <p class="control-label">Servicio<span class="text-danger">*</span></p>
                      <?php
                      $sql = "SELECT id_servi,nomser FROM service";
                      $results = mysqli_query($conn, $sql);
                      foreach ($results as $key => $row) { ?>
                        <input type="checkbox" id="checkbox-<?= $key ?>" name="service" class="checkbox-services" value="<?= $row['id_servi'] ?>">
                        <label for="checkbox-<?= $key ?>"><?= $row['nomser'] ?></label>
                        <br>
                      <?php } ?>
                  </form>
                </div>

                <div class="col-sm-6" style="display: flex;flex-direction:column;gap:10px">
                  <form method="POST" autocomplete="off" id="formPets">
                  <p class="control-label">Mascotas<span class="text-danger">*</span></p>
                    <?php
                    $sql = "SELECT id_pet,nomas FROM pet WHERE id_due = '$ownerID'";
                    $results = mysqli_query($conn,$sql);
                    foreach ($results as $key => $row) { ?>
                      <input type="checkbox" id="checkbox2-<?= $key ?>" name="pet" class="checkbox-pets" value="<?= $row['id_pet'] ?>">
                      <label for="checkbox2-<?= $key ?>"><?= $row['nomas'] ?></label>
                      <br>
                    <?php } ?>
                  </form>
                </div>

                <div class="col-sm-12" style="display: flex; justify-content:center; gap:10px;margin-top: 30px;">

                  <div>
                    <a type="button" href="./../home.php" class="btn bg-red"><i class="material-icons">cancel</i> LIMPIAR </a>
                  </div>

                  <div>
                    <button class="btn bg-blue" id="btnAddQuote">PEDIR CITA <i class="material-icons">save</i></button>
                  </div>
                </div> 
                
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
    
    <!-- #END# Input -->
    </div>
  </section>

 
  <script src="../../../assets/plugins/jquery/jquery.min.js"></script>
 
  <script src="../../../assets/plugins/bootstrap/js/bootstrap.js"></script>
  <!-- Select Plugin Js -->
  <script src="../../../assets/plugins/bootstrap-select/js/bootstrap-select.js"></script>
 
  <script src="../../../assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
   
  <script src="../../../assets/plugins/node-waves/waves.js"></script>
  
  <script src="../../../assets/plugins/autosize/autosize.js"></script>
  
  <script src="../../../assets/js/admin.js"></script>
  <script src="../../../assets/js/pages/forms/basic-form-elements.js"></script>
  

  <script src="../../../assets/js/demo.js"></script>
  
  <script src="../assets/js/demo.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<script>
const btnAddQuote = document.getElementById('btnAddQuote');
const formServices = document.getElementById('formServices');
const formPets = document.getElementById('formPets');

btnAddQuote.addEventListener('click',async () => {

 //* Validate services and pets checkbox
  const checkboxesSelectedServices = document.querySelectorAll('.checkbox-services:checked');
  const checkboxesSelectedPets = document.querySelectorAll('.checkbox-pets:checked');

  const checkboxValuesServices = [];
  const checkboxValuesPets = [];

  checkboxesSelectedServices.forEach((value, key) => {
    let checkboxValue = checkboxesSelectedServices[key].value;
    checkboxValuesServices.push(checkboxValue);
  });

  checkboxesSelectedPets.forEach((value, key) => {
    let checkboxValue = checkboxesSelectedPets[key].value;
    checkboxValuesPets.push(checkboxValue);
  });

  if(checkboxValuesServices.length === 0) return swal('Información','Por favor elija al menos un servicio','info');
  else if(checkboxValuesPets.length === 0) return swal('Información','Por favor elija al menos una mascota','info');

  const req = await fetch('./controllerRequest.php',{
    method: 'POST',
    headers: {
      'content-type': 'application/json',
    },
    body: JSON.stringify({checkboxValuesServices,checkboxValuesPets}),
  });

  const res = await req.json();

  if(res.success) return swal('¡Creada exitosamente!','¡Cita creada exitosamente!','success').then(() => {
    location.href = './mostrar.php';
  });

});
</script>
</body>
</html>