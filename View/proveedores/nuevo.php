﻿<?php
session_start();

if (!isset($_SESSION['adminID'])) header('location: ../login.php');
require_once './../../assets/db/connectionMysql.php';

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>vetdog V.1 | vetdog - vetdog Admin Template</title>
   
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
   
    <link href="../../assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
   
    <link href="../../assets/plugins/node-waves/waves.css" rel="stylesheet" />
    
    <link href="../../assets/plugins/animate-css/animate.css" rel="stylesheet" />
    <link href="../../css/style.css" rel="stylesheet">
    <link href="../../assets/css/themes/all-themes.css" rel="stylesheet" />
    <link rel="shortcut icon" type="image/x-icon" href="../../assets/img/lll.png" />
       


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
    

    <!-- LUPA -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons"></i>
        </div>
        <input type="text" placeholder="Buscar...">
        <div class="close-search">
            <i class="material-icons">X</i>
        </div>
    </div>
    <!-- //LUPA -->

    
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="../panel-admin/administrador"> CONSULTORIO - BEATRIZ FAGUNDEZ </a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                  
                    <!-- Call Search -->
                    <li><a href="javascript:void(0);" class="js-search" data-close="true"><i class="material-icons">search</i></a></li>
                    <!-- #END# Call Search -->
                </ul>
            </div>
        </div>
    </nav>
   

    <section>
         
        <aside id="leftsidebar" class="sidebar">
       
      <div class="user-info">
 
        <div class="info-container">
          <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo ucfirst($_SESSION['name']); ?></div>
          <div class="btn-group user-helper-dropdown">
            <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
            <ul class="dropdown-menu pull-right">
              <li><a href="../pages-logout"><img src="./../../assets/icons/MaterialSymbolsLightExitToApp.svg" style="width: 25px"> Cerrar Sesión</a></li>
              <li><a href="./../panel-admin/edit-admin.php" style="display: flex;gap: 5px;"><img src="./../../assets/icons/IconParkSolidConfig.svg" style="width: 25px">Editar perfil</a></li>
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
                            <i class="material-icons">shopping_basket</i>
                            <span>COMPRA</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="../compra/nuevo">Registrar</a>
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
                                <a href="../venta/venta_fecha">Consultar por fecha</a>
                            </li>
                        </ul>
    </li>
   
        <aside id="rightsidebar" class="right-sidebar">
        </aside>
    </section>

 

    <section class="content">
        <div class="container-fluid">
            <div class="alert alert-info">
  <strong>Estimado usuario!</strong>    Los campos remarcados con <span class="text-danger">*</span> son necesarios.
</div>
            <!-- Input -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                REGISTRO DE PROVEEDORES
                                <small>Registra cualquier proveedor...</small>
                            </h2>
                        </div>

                    <div class="body">
                        <form method="POST"  autocomplete="off" enctype="multipart/form-data">
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <label class="control-label">RUC del proveedor<span class="text-danger">*</span></label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="documento"  name="ruc" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" maxlength="14" required class="form-control" placeholder="RUC del proveedor..." />
                                        </div>
                                    </div>

               
                    <button type="button" class="btn btn-default" id="buscar"><i class="material-icons">search</i></button>   
               
                                </div>

                                <div class="col-sm-6">
                                    <label class="control-label">Nombre del proveedor<span class="text-danger">*</span></label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="nomprove" id="nombre" readonly  class="form-control" placeholder="Nombre del proveedor..." />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label class="control-label">Direccion del proveedor<span class="text-danger">*</span></label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="direccion" name="direcc" readonly  class="form-control" placeholder="Direccion..." />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label class="control-label">Pais del proveedor<span class="text-danger">*</span></label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="provincia" name="pais" readonly class="form-control" placeholder="Pais..." />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label class="control-label">Telefono del proveedor</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="tele" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" maxlength="9"  class="form-control" placeholder="Telefono..." />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label class="control-label">Correo del proveedor</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="email" name="corre"  class="form-control" placeholder="Correo..." />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-5" style="display:none;">
                                    <select name="estado" class="form-control show-tick">
                                        
                                        <option value="1">1</option>
                                        
                                    </select>
                                </div>
                            </div>

                                <div class="container-fluid" aling="center">
                                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                                    </div>

                                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                                        <a type="button" href="../../folder/proveedores" class="btn bg-red"><i class="material-icons">cancel</i> LIMPIAR </a>
                                    </div>

                                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                                        

                                         <button class="btn bg-green" name="agregar">GUARDAR<i class="material-icons">save</i></button>
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

   
    <script src="../../assets/plugins/jquery/jquery.min.js"></script>
   
    <script src="../../assets/plugins/bootstrap/js/bootstrap.js"></script>
    <!-- Select Plugin Js -->
    <script src="../../assets/plugins/bootstrap-select/js/bootstrap-select.js"></script>
   
    <script src="../../assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
     
    <script src="../../assets/plugins/node-waves/waves.js"></script>
    
    <script src="../../assets/plugins/autosize/autosize.js"></script>
    
    <script src="../../assets/plugins/momentjs/moment.js"></script>
    <!-- Bootstrap Material Datetime Picker Plugin Js -->
    
    <!-- Bootstrap Datepicker Plugin Js -->
   
    
    <script src="../../assets/js/admin.js"></script>
    <script src="../../assets/js/pages/forms/basic-form-elements.js"></script>
    

    <script src="../../assets/js/demo.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    

    

    <?php
if(isset($_POST["agregar"])){
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "vetdog";

// Creamos la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Revisamos la conexión
if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
   } 
$nomprove=$_POST['nomprove'];
$ruc=$_POST['ruc'];
$direcc=$_POST['direcc'];
$pais=$_POST['pais'];
$tele=$_POST['tele'];
$corre=$_POST['corre'];
$estado=$_POST['estado'];

// Realizamos la consulta para saber si coincide con uno de esos criterios
$sql = "select * from supplier where ruc='$ruc' or corre='$corre'";
$result = mysqli_query($conn, $sql);
?>


<?php
 // Validamos si hay resultados
 if(mysqli_num_rows($result)>0)
 {
        // Si es mayor a cero imprimimos que ya existe el usuario
      
        if($result){
   ?>

        <script type="text/javascript">

swal("Oops...!", "Ya existe el registro a agregar!", "error")
        </script>



    <?php
    }
  
 }
 else
 {
// Si no hay resultados, ingresamos el registro a la base de datos
$sql2 = "insert into supplier (nomprove,ruc,direcc,pais,tele,corre,estado) 
values ('$nomprove','$ruc','$direcc','$pais','$tele','$corre','$estado')";
if (mysqli_query($conn, $sql2)) {
      
       if($sql2){
   ?>


        <script type="text/javascript">
swal("¡Registrado!", "Agregado correctamente", "success").then(function() {
            window.location = "../../folder/proveedores";
        });
        </script>

    <?php
    }
    else{
       ?>
       <script type="text/javascript">

        swal("Oops...!", "No se pudo guardar!", "error")
       </script>


       <?php

    }
    
} else {
      
       echo "Error: " . $sql2 . "" . mysqli_error($conn);
}

}
// Cerramos la conexión
$conn->close();

}
?>
<script>
    $('#buscar').click(function(){
        dni=$('#documento').val();
        $.ajax({
           url:'consultaRUC',
           type:'post',
           data: 'dni='+dni,
           dataType:'json',
           success:function(r){
            if(r.numeroDocumento==dni){
                $('#nombre').val(r.nombre);
                $('#direccion').val(r.direccion);
                $('#provincia').val(r.provincia);
             
            }else{
                alert(r.error);
            }
            console.log(r)
           }
        });
    });
</script>


</body>
</html>
