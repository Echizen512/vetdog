<?php
session_start();

if (!isset($_SESSION['adminID'])) header('location: ../login.php');
require_once '../assets/db/connectionMysql.php';

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>vetdog V.1 | vetdog - vetdog Admin Template</title>
     
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
   
    <link href="../assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
   
    <link href="../assets/plugins/node-waves/waves.css" rel="stylesheet" />
    <link href="../assets/plugins/animate-css/animate.css" rel="stylesheet" />
    <link href="../assets/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <link href="../assets/css/themes/all-themes.css" rel="stylesheet" />
    <link rel="shortcut icon" type="image/x-icon" href="../assets/img/lll.png" />

</head>

<nav class="navbar">
    <div class="container-fluid">
      <div class="navbar-header">
        <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
        <a href="javascript:void(0);" class="bars"></a>
        <a class="navbar-brand" href="../panel-admin/administrador">CONSULTORIO - BEATRIZ FAGUNDEZ</a>
      </div>
      <div class="collapse navbar-collapse" id="navbar-collapse">
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
                        <a href="../vista/panel-admin/administrador">
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
                                <a href="../vista/productos/nuevo">Registrar</a>
                            </li>
                            <li>
                                <a href="../folder/productos">Listar / Modificar</a>
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
                                <a href="../vista/categorias/nuevo">Registrar</a>
                            </li>
                            <li>
                                <a href="../folder/categorias">Listar / Modificar</a>
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
                                <a href="../vista/clientes/nuevo">Registrar</a>
                            </li>
                            <li>
                                <a href="../folder/clientes">Listar / Modificar</a>
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
                                <a href="../vista/veterinarios/nuevo">Registrar</a>
                            </li>
                            <li>
                                <a href="../folder/veterinarios">Listar / Modificar</a>
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
                                <a href="../vista/mascotas/nuevo">Registrar</a>
                            </li>
                            <li>
                                <a href="../folder/mascotas">Listar / Modificar</a>
                            </li>
                            <li>
                                <a href="../folder/tipo">Tipos</a>
                            </li>
                            <li>
                                <a href="../folder/raza">Razas</a>
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
                                <a href="../vista/proveedores/nuevo">Registrar</a>
                            </li>
                            <li>
                                <a href="../folder/proveedores">Listar / Modificar</a>
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
                                <a href="../vista/compra/nuevo">Registrar</a>
                            </li>
                            <li>
                                <a href="../folder/compra">Listar / Modificar</a>
                            </li>

                            <li>
                                <a href="../vista/compra/compras_fecha">Consultar por fecha</a>
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
                                <a href="../vista/venta/nuevo">Registrar</a>
                            </li>
                            <li>
                                <a href="../folder/venta">Listar / Modificar</a>
                            </li>
                            <li>
                                <a href="../vista/venta/venta_fecha">Consultar por fecha</a>
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
                                <a href="../vista/citas/nuevo">Registrar</a>
                            </li>
                            <li>
                                <a href="../folder/citas">Listar / Modificar</a>
                            </li>
                            <li>
                                <a href="../folder/servicio">Servicio</a>
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
                <a href="../vista/audit/mostrar.php">Mostrar</a>
                </li>
            </ul>
        </li>

        <aside id="rightsidebar" class="right-sidebar">
        </aside>
    </section>

<body class="theme-red">
    <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                    <h2>Listado de proveedores :</h2>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                            <thead>
                                    <tr>
                                        <th class="text-center">Nº</th>
                                        <th class="text-center">RUC</th>
                                        <th class="text-center">NOMBRE</th>
                                        <th class="text-center">CORREO</th>
                                        <th class="text-center">DIRECCION</th>
                                        <th class="text-center">PAIS</th>
                                        <th class="text-center">ESTADO</th>
                                        <th class="text-center">ACCIONES</th>
                                    </tr>
                            </thead>
                        <tbody>
                <?php
                foreach ($dato as $key => $value){
                foreach ($value as $va) { ?>
            <tr>
                <td class="text-center"><?php echo $va['id_prove'];?></td>            
                <td class="text-center"><?php echo $va['ruc'];?></td> 
                <td class="text-center"><?php echo $va['nomprove'];?></td>
                <td class="text-center"><?php echo $va['corre'];?></td>
                <td class="text-center"><?php echo $va['direcc'];?></td>
                <td class="text-center"><?php echo $va['pais'];?></td> 
                <td class="text-center"><?php    
                    if($va['estado']==1)  { ?> 
                    <form  method="get" action="javascript:activo('<?php echo $va['id_prove']; ?>')">
                        <span class="label label-success">Activo</span>
                    </form>
                    <?php  }   else {?> 
                        <form  method="get" action="javascript:inactivo('<?php echo $va['id_prove']; ?>')"> 
                            <button type="submit" class="btn btn-danger btn-xs">Inactivo</button>
                        </form>
                            <?php  } ?>
                        </td> 
                            <td class="text-center"><a type="button" href="../vista/proveedores/edit?id=<?php echo $va["id_prove"]; ?>"  class="btn bg-blue btn-circle waves-effect waves-circle waves-float"><i class="material-icons">autorenew</i></a>
                        </tr>
                            <?php
                                }   
                            }
                                ?>  
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="../assets/plugins/jquery/jquery.min.js"></script>
    <script src="../assets/plugins/bootstrap/js/bootstrap.js"></script>
    <script src="../assets/plugins/bootstrap-select/js/bootstrap-select.js"></script>
    <script src="../assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
    <script src="../assets/plugins/node-waves/waves.js"></script>
    <script src="../assets/plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="../assets/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="../assets/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="../assets/plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="../plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="../assets/plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="../assets/plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="../assets/plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="../assets/plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>
    <script src="../assets/js/admin.js"></script>
    <script src="../assets/js/pages/tables/jquery-datatable.js"></script>
    <script src="../assets/js/demo.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    <!--------------------------------script edit cate----------------------------->
    <?php
if(isset($_POST["update"])){
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

    $id = $_GET['id'];

    $nomprove = $_POST['nomprove'];
    $ruc = $_POST['ruc'];
    $direcc = $_POST['direcc'];
    $pais = $_POST['pais'];
    $tele = $_POST['tele'];
    $corre = $_POST['corre'];

    // Realizamos la consulta para verificar si ya existe el registro
    $sql_check = "SELECT * FROM supplier WHERE ruc='$ruc' AND id_prove != '$id'";
    $result = mysqli_query($conn, $sql_check);

    // Validamos si hay resultados
    if(mysqli_num_rows($result) > 0) {
        // Si existe el registro
        ?>
        <script type="text/javascript">
            swal("Oops...!", "Ya existe el registro con el mismo RUC!", "error");
        </script>
        <?php
    } else {
        // Si no existe el registro, actualizamos el registro en la base de datos
        $sql_update = "UPDATE supplier SET nomprove='$nomprove', ruc='$ruc', direcc='$direcc', pais='$pais', tele='$tele', corre='$corre' WHERE id_prove='$id'";

        if (mysqli_query($conn, $sql_update)) {
            ?>
            <script type="text/javascript">
                swal("¡Actualización!", "Actualizado correctamente", "success").then(function() {
                    window.location = "proveedores";
                });
            </script>
            <?php
        } else {
            ?>
            <script type="text/javascript">
                swal("Oops...!", "No se pudo actualizar!", "error");
            </script>
            <?php
        }
    }

    // Cerramos la conexión
    $conn->close();
}
?>

</body>

</html>
