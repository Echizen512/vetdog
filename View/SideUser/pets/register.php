<?php
session_start();
if (!isset($_SESSION['ownerID'])) header('location: ./login.php');
require_once './../../../assets/db/connectionMysql.php';
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
        <a class="navbar-brand" href="./../home.php">MASCOTAS - USUARIO</a>
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
              <h2>REGISTRO DE NUEVAS MASCOTAS</h2>
            </div>

            <div class="body">
              <form method="POST" autocomplete="off">
                <div class="row clearfix">

                  <div class="col-sm-4">
                    <div class="form-group">
                      <div class="form-line">
                        <label class="control-label">Nombre de la mascota<span class="text-danger">*</span></label>
                        <input type="text" name="nomas" class="form-control" placeholder="Nombre de la mascota..." required/>
                      </div>
                    </div>
                  </div>

                  <div class="col-sm-4">
                    <div class="form-group">
                      <div class="form-line">
                      <label class="control-label">Sexo de la mascota<span class="text-danger">*</span></label>
                      <select name="sexo" class="form-control show-tick" required>
                        <option value="">-- Seleccione un sexo --</option>
                        <option value="Macho">Macho</option>
                        <option value="Hembra">Hembra</option>
                      </select>
                      </div>
                    </div>
                  </div>

                  <div class="col-sm-4">
                    <label class="control-label">Edad de la mascota<span class="text-danger">*</span></label>
                    <div class="form-group">
                      <div class="form-line">
                        <input type="text" name="edad" class="form-control" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false" placeholder="Edad de la mascota..." required/>
                      </div>
                    </div>
                  </div>

                  <div class="col-sm-4">
                    <div class="form-group">
                      <div class="form-line">
                        <label class="control-label">Unidad<span class="text-danger">*</span></label>
                        <select class="form-control show-tick" name="age" required>
                          <option value="" selected disabled>-- Seleccione un unidad --</option>
                          <option value="meses">Meses</option>
                          <option value="años">Años</option>
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="col-sm-4">
                    <div class="form-group">
                      <div class="form-line">
                        <label class="control-label">Tipo de la mascota<span class="text-danger">*</span></label>
                        <select name="id_tiM" class="form-control show-tick" onchange="getTypeForRaza(this.value)" required>
                          <option value="" selected disabled>-- Seleccione un tipo --</option>
                          <?php include "../../funciones/tipo.php" ?>
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
                        <option value="">-- Seleccione un tamaño --</option>
                        <option value="Pequeña">Pequeña</option>
                        <option value="Grande">Grande</option>
                      </select>
                      </div>
                    </div>
                  </div>

                  <div class="col-sm-4">
                    <label class="control-label">Peso de la mascota<span class="text-danger">*</span></label>
                    <div class="form-group">
                      <div class="form-line">
                        <input type="text" name="peso" maxlength="4" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false" class="form-control" placeholder="Peso de la mascota..." required/>
                      </div>
                    </div>
                  </div>

                  <div class="col-sm-4">
                    <div class="form-group">
                      <div class="form-line">
                        <label class="control-label">Selecciona el tipo de peso<span class="text-danger">*</span></label>
                        <select class="form-control show-tick" name="weightID" required>
                          <option value="" selected disabled>-- Seleccione un tipo de peso --</option>
                          <?php
                          $sql = "SELECT weightID,name FROM weight";
                          $results = mysqli_query($conn,$sql);

                          foreach($results as $row) { ?>
                            <option value="<?= $row['weightID']; ?>"><?= $row['name'] ?></option>
                          <?php
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
                    <a type="button" href="./list.php" class="btn bg-red"><i class="material-icons">cancel</i> LIMPIAR </a>
                  </div>

                  <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                    <button class="btn bg-green" name="add">GUARDAR<i class="material-icons">save</i></button>
                  </div>

                </div>
              </form>
            </div>
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

  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

  <script>
    //* Get all type for the raze 
    const getTypeForRaza = async id => { 
      const req = await fetch(`./../../funciones/raza.php?id=${id}`);

      const res = await req.text();
      document.getElementById("id_raza").innerHTML = res;
    };
  </script>
  
  <?php
  if (isset($_POST["add"])) {
    if(!empty($_POST['nomas']) && !empty($_POST['id_tiM']) && !empty($_POST['id_raza']) && !empty($_POST['sexo']) && !empty($_POST['edad']) && !empty($_POST['age']) && !empty($_POST['tamano']) && !empty($_POST['peso']) && $_SESSION['ownerID'] && !empty($_POST['weightID']) ) {
      $id_due = $_SESSION['ownerID'];
      
      $nomas = $_POST['nomas'];
      $id_tiM = $_POST['id_tiM'];
      $id_raza = $_POST['id_raza'];
      $weightID = $_POST['weightID'];
      $sexo = $_POST['sexo'];
      $edad = $_POST['edad'];
      $typeAge = $_POST['age'];
      $tamano = $_POST['tamano'];
      $peso = $_POST['peso'];
      $estado = 1;
      $dateCreation = date('Y-m-d');

      $sql = "INSERT INTO pet(nomas,id_tiM,id_raza,weightID,id_due,sexo,edad,typeAge,tamano,peso,estado,fere) VALUES('$nomas','$id_tiM','$id_raza','$weightID','$id_due','$sexo','$edad','$typeAge','$tamano','$peso','$estado','$dateCreation')";
  
      if (mysqli_query($conn,$sql)) { ?>
        <script>
          swal("¡Registrado!", "Agregado correctamente", "success").then(() => {
            window.location = "./list.php";
          });
        </script>
      <?php
      //-audit
      $tableID = mysqli_insert_id($conn);
      $ownerID = $_SESSION['ownerID'];
      $action = "Se creó una mascota";
      $rol = "usuario";
      $nameTable = "mascota";
      
      audit($tableID,$nameTable,$ownerID,$rol,$action);
      } else { ?>
        <script>
            swal("Oops...!", "Hubo un error al agregar", "error");
        </script>
      <?php
          echo "Error: " . $sql2 . "" . mysqli_error($conn);
        }
      $conn->close();
    } else { ?>
      <script>
        swal("¡Información!", "¡No puede enviar datos vacíos!", "info");
      </script>
  <?php
    }
  }
  ?>
</body>
</html>