<?php
session_start();
if (!isset($_SESSION['ownerID'])) header('location: ./login.php');
require_once './../../../assets/db/connectionMysql.php';
require_once './../../../utils/audit.php';
?>
<!DOCTYPE html>
<html lang="es-ES">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
 
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
  <link href="../../../assets/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
 
  <link href="../../../assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
 
  <link href="../../../assets/plugins/node-waves/waves.css" rel="stylesheet" />
  
  <link href="../../../assets/plugins/animate-css/animate.css" rel="stylesheet" />
  <link href="../../../css/style.css" rel="stylesheet">
  <link href="../../../assets/css/themes/all-themes.css" rel="stylesheet" />
  <link rel="shortcut icon" type="image/x-icon" href="./../../../assets/img/lll.png" />
  
  <title>Registro de mascostas | Beatriz Fagundez</title>
</head>
<style>
.swal2-popup {
  width: 500px; /* Ancho deseado */
  height: 300px; /* Alto deseado */
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
        <a class="navbar-brand" href="./../home.php">EDITAR MASCOTA - USUARIO</a>
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
              <a href="./register.php">Registrar</a>
            </li>
            <li>
              <a href="./list.php">Listar / Modificar</a>
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
              <a href="../../folder/servicio">Servicio</a>
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
      <div class="alert alert-info">
        <strong>Estimado usuario!</strong> Los campos remarcados con <span class="text-danger">*</span> son necesarios.
      </div>
      <!-- Input -->
      <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="card">
            <div class="header">
              <h2>EDITAR MASCOTA</h2>
            </div>

            <div class="body">
            <?php
              $id = $_GET['id_pet'];

              $sql = "SELECT pet.nomas, pet_type.id_tiM, pet_type.noTiM, raza.id_raza, raza.nomraza, pet.weightID, w.name AS weightName, pet.sexo, pet.edad, pet.typeAge, pet.tamano, pet.peso, owner.id_due, owner.dni_due, owner.nom_due, owner.ape_due, owner.movil, owner.fijo, owner.correo, owner.direc, pet.estado, pet.fere FROM pet JOIN pet_type ON pet.id_tiM = pet_type.id_tiM JOIN raza ON pet.id_raza = raza.id_raza JOIN owner ON pet.id_due = owner.id_due JOIN weight AS w ON pet.weightID = w.weightID WHERE id_pet = '$id'";

              $results = mysqli_query($conn,$sql);

              foreach($results as $row) { ?>
                <form method="POST" autocomplete="off">
                  <div class="row clearfix">

                    <div class="col-sm-4">
                      <div class="form-group">
                        <div class="form-line">
                          <label class="control-label">Nombre de la mascota<span class="text-danger">*</span></label>
                          <input type="text" name="nomas" value="<?= $row['nomas'] ?>" class="form-control" placeholder="Nombre de la mascota..." required/>
                        </div>
                      </div>
                    </div>

                    <div class="col-sm-4">
                      <div class="form-group">
                        <div class="form-line">
                          <label class="control-label">Sexo de la mascota<span class="text-danger">*</span></label>
                          <select name="sexo" class="form-control show-tick" required>
                          <?php 
                            if($row['sexo'] === 'Macho') { ?>
                              <option value="Macho" selected>Macho</option>
                              <option value="Hembra">Hembra</option>
                          <?php
                            } else { ?>
                              <option value="Hembra" selected>Hembra</option>
                              <option value="Macho">Macho</option>
                          <?php
                            }
                          ?>
                          </select>
                        </div>
                      </div>
                    </div>
                    
                    <div class="col-sm-4">
                      <div class="form-group">
                        <div class="form-line">
                          <label class="control-label">Edad de la mascota<span class="text-danger">*</span></label>
                          <input type="text" value="<?= $row['edad'] ?>" name="edad" class="form-control" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false" placeholder="Edad de la mascota..." required/>
                        </div>
                      </div>
                    </div>

                    <div class="col-sm-4">
                      <div class="form-group">
                        <div class="form-line">
                          <label class="control-label">Unidad<span class="text-danger">*</span></label>
                          <select class="form-control show-tick" name="age" required>
                            <?php
                              if($row['typeAge'] === 'Meses') { ?>
                                <option value="meses" selected>Meses</option>
                                <option value="años">Años</option>
                            <?php
                              } else { ?>
                                <option value="años" selected>Años</option>
                                <option value="meses">Meses</option>
                            <?php
                              }
                            ?>
                          </select>
                        </div>
                      </div>
                    </div>

                    <div class="col-sm-4">
                      <div class="form-group">
                        <div class="form-line">
                          <label class="control-label">Tipo de la mascota<span class="text-danger">*</span></label>
                          <select name="id_tiM" class="form-control show-tick" onchange="getTypeForRaza(this.value)">
                          <option selected value="<?= $row['id_tiM'] ?>"><?= $row['noTiM'] ?></option>
                          <?php
                            $pet_id = $row['id_tiM'];
                            $sql3 = "SELECT id_tiM,noTiM FROM pet_type WHERE id_tiM <> '$pet_id'";

                            $results3 = mysqli_query($conn,$sql3);
                            foreach($results3 as $row3) {
                              echo '<option value="' . $row3['id_tiM'] . '">' . $row3['noTiM'] . '</option>' . "\n";
                            }
                          ?> 
                          </select>
                        </div>
                      </div>
                    </div>

                    <div class="col-sm-4" id="id_raza">
                      <div class="form-group">
                        <div class="form-line">
                        <label class="control-label">Raza de la mascota<span class="text-danger">*</span></label>
                        <select class="form-control show-tick" name="id_raza" required>
                          <option value="" disabled>-- Seleccione una raza --</option>
                        </select>
                        </div>
                      </div>
                    </div>

                    <div class="col-sm-4">
                      <div class="form-group">
                        <div class="form-line">
                        <label class="control-label">Tamaño de la mascota<span class="text-danger">*</span></label>
                        <select name="tamano" class="form-control show-tick" required>
                          <?php 
                          if($row['tamano'] === "Pequeña") { ?>
                            <option value="Pequeña" selected>Pequeña</option>
                            <option value="Grande">Grande</option>
                        <?php 
                          } else { ?>
                            <option value="Pequeña">Pequeña</option>
                            <option value="Grande" selected>Grande</option>
                        <?php
                          }
                          ?>
                        </select>
                        </div>
                      </div>
                    </div>

                    <div class="col-sm-4">
                      <label class="control-label">Peso de la mascota<span class="text-danger">*</span></label>
                      <div class="form-group">
                        <div class="form-line">
                          <input type="text" name="peso" value="<?= $row['peso'] ?>" maxlength="4" class="form-control" placeholder="Peso de la mascota..." onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false" required/>
                        </div>
                      </div>
                    </div>

                    <div class="col-sm-4">
                      <div class="form-group">
                        <div class="form-line">
                          <label class="control-label">Selecciona el tipo de peso<span class="text-danger">*</span></label>
                          <select class="form-control show-tick" name="weightID" required>
                            <?php
                            $sql4 = "SELECT weightID,name FROM weight";
                            $results4 = mysqli_query($conn,$sql4);

                            foreach($results4 as $row4) { 
                              if($row4['weightID'] === $row['weightID']) { ?>
                                <option selected value="<?= $row4['weightID']; ?>"><?= $row4['name'] ?></option>
                            <?php
                              } else { ?>
                                <option value="<?= $row4['weightID']; ?>"><?= $row4['name'] ?></option>
                            <?php
                              }
                            }
                            ?>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="container-fluid" align="center">
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                    </div>

                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                      <a type="button" href="../../folder/mascotas" class="btn bg-red"><i class="material-icons">cancel</i> LIMPIAR </a>
                    </div>

                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                      <button class="btn bg-green" name="update">ACTUALIZAR<i class="material-icons">save</i></button>
                    </div>

                  </div>
                </form>
            </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
    <!-- #END# Input -->
    </div>
  </section>

 
  <script src="./../../../assets/plugins/jquery/jquery.min.js"></script>
  <script src="./../../../assets/js/funciones/tipo.js"></script>
 
  <script src="./../../../assets/plugins/bootstrap/js/bootstrap.js"></script>
  <!-- Select Plugin Js -->
  <script src="./../../../assets/plugins/bootstrap-select/js/bootstrap-select.js"></script>
 
  <script src="./../../../assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
   
  <script src="./../../../assets/plugins/node-waves/waves.js"></script>
  
  <script src="./../../../assets/plugins/autosize/autosize.js"></script>

  
  <script src="./../../../assets/js/admin.js"></script>
  <script src="./../../../assets/js/pages/forms/basic-form-elements.js"></script>
  

  <script src="./../../../assets/js/demo.js"></script>
  <!-- sweetalert2  -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
'use strict';
addEventListener('load',() => {
  (async () => { 
    const id = "<?= $pet_id ?>"
    const req = await fetch(`../../funciones/raza.php?id=${id}`);
    const res = await req.text();
    document.getElementById("id_raza").innerHTML = res;
  })();
})

//* Get all type for the raze 
const getTypeForRaza = async id => { 
  const req = await fetch(`../../funciones/raza.php?id=${id}`);

  const res = await req.text();
  document.getElementById("id_raza").innerHTML = res;
};
</script>
</body>
</html>
<?php
if (isset($_POST['update'])) {
  if(empty($_POST['nomas']) || empty($_POST['sexo']) || empty($_POST['edad']) || empty($_POST['age']) || empty($_POST['id_tiM']) || empty($_POST['id_raza']) || !$_SESSION['ownerID'] || empty($_POST['tamano']) || empty($_POST['peso']) || empty($_POST['weightID'])) {
    echo "<script>Swal.fire('¡Información!','¡No puede enviar datos vacíos!','info');</script>";
    exit;
  }

  $ownerID = $_SESSION['ownerID'];

  $nomas = $_POST['nomas'];
  $sexo = $_POST['sexo'];
  $edad = $_POST['edad'];
  $typeAge = $_POST['age'];
  $edad = $_POST['edad'];
  $id_tiM = $_POST['id_tiM'];
  $id_raza = $_POST['id_raza'];
  $tamano = $_POST['tamano'];
  $peso = $_POST['peso'];
  $weightID = $_POST['weightID'];

  $sql = "UPDATE pet SET nomas = '$nomas', id_tiM = '$id_tiM', id_raza = '$id_raza', weightID = '$weightID', sexo = '$sexo',edad = '$edad', typeAge = '$typeAge', tamano = '$tamano', peso = '$peso',weightID = '$weightID' WHERE id_pet = '$id'";

  if(mysqli_query($conn,$sql)) {
    echo "
      <script>
        Swal.fire('¡Actualizado!','¡La mascota ha sido actualizada exitosamente!','success').then(() => {
          location.href = './list.php';
        });
      </script>";

  //-audit
  $ownerID = $_SESSION['ownerID'];
  $action = "Se actualizó una mascota";
  $rol = "cliente";
  $nameTable = "mascota";
  
  audit($id,$nameTable,$ownerID,$rol,$action);
  exit;
  }
}
?>