﻿<?php
session_start();

if (!isset($_SESSION['adminID'])) header('location: ../login.php');
require_once '../assets/db/connectionMysql.php';

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Vetdog V.1 | Vetdog - Vetdog Admin Template</title>
     
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
   
    <link href="../assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
   
    <link href="../assets/plugins/node-waves/waves.css" rel="stylesheet" />
    
    <link href="../assets/plugins/animate-css/animate.css" rel="stylesheet" />
   
    <link href="../assets/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
    
    <link href="../css/style.css" rel="stylesheet">
    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="../assets/css/themes/all-themes.css" rel="stylesheet" />
    <link rel="shortcut icon" type="image/x-icon" href="../assets/img/lll.png" />

</head>

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
                <a class="navbar-brand" href="../vista/panel-admin/administrador"> CONSULTORIO - BEATRIZ FAGUNDEZ </a>
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



<!--=============================================================CONTENIDO DE LA PÁGINA =============================================================-->
    <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Listado de compras :
                            </h2><br>

                        </div>

                        <div class="body">
                            <div class="table-responsive">
                                <?php
$contraseña = "";
$usuario = "root";
$nombre_base_de_datos = "vetdog";
try{
    $base_de_datos = new PDO('mysql:host=localhost;dbname=' . $nombre_base_de_datos, $usuario, $contraseña);
     $base_de_datos->query("set names utf8;");
    $base_de_datos->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
    $base_de_datos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $base_de_datos->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
}catch(Exception $e){
    echo "Ocurrió algo con la base de datos: " . $e->getMessage();
}

$sentencia = $base_de_datos->query("SELECT  compra.fecha, compra.id_compra,compra.estado, compra.total,compra.tipoc, compra.tipopa, supplier.id_prove, supplier.nomprove, supplier.ruc, supplier.direcc, supplier.pais, supplier.tele, supplier.corre,
GROUP_CONCAT( products.nompro, '..', products.codigo, '..',products.preciC, '..', productos_comprados.canti SEPARATOR '__') AS products FROM compra INNER JOIN productos_comprados ON productos_comprados.id_compra = compra.id_compra INNER JOIN products ON products.id_prod = productos_comprados.id_prod INNER JOIN supplier ON compra.id_prove =supplier.id_prove GROUP BY compra.id_compra ORDER BY compra.id_compra DESC;");
$compras = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                        <th class="text-center">COMPROBANTE</th>
                                        <th class="text-center">FECHA</th>
                                        
                                        <th class="text-center">TOTAL</th>
                                        <th class="text-center">PROVEDDOR</th>
                                       
                                        <th class="text-center">ESTADO</th>
                                        <th class="text-center">DETALLES</th>
                                     
                                      
                                    </tr>
                                    </thead>
                                    
                                    <tbody>
                                    <?php foreach($compras as $compra){ ?>
                                    <tr>
                                    <td class="text-center"><?php echo $compra->tipoc ?></td>
                                    <td class="text-center"><?php echo (new DateTime($compra->fecha))->format('d/m/Y'); ?></td>

                                    
                                   

                                    <td class="text-center">$/.<?php echo $compra->total ?></td>
                                    <td class="text-center"><?php echo $compra->nomprove ?></td>

                                    <td class="text-center">
                <?php    

                if($compra->estado==1)  { ?> 
                <form  method="get" action="javascript:activo('<?php echo $compra->id_compra; ?>')">
                   
                    <span class="label label-success">Aceptado</span>
                </form>
                <?php  }   else {?> 

                    <form  method="get" action="javascript:inactivo('<?php echo $compra->id_compra; ?>')"> 
                        <button type="submit" class="btn btn-danger btn-xs">Anuladas</button>
                     </form>
                        <?php  } ?>                         
            </td>
            <td class="text-center">
                <a type="button" href="../vista/compra/detalles?id=<?php echo $compra->id_compra; ?>"  class="btn bg-blue btn-circle waves-effect waves-circle waves-float">
                    <i class="material-icons">remove_red_eye</i>

                </a>
            </td>

                                    
                                    </tr>
                                     <?php } ?>
                                </tbody>

                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->
        </div>
    </section>

   
    <script src="../assets/plugins/jquery/jquery.min.js"></script>
   
    <script src="../assets/plugins/bootstrap/js/bootstrap.js"></script>
    <!-- Select Plugin Js -->
    <script src="../assets/plugins/bootstrap-select/js/bootstrap-select.js"></script>
   
    <script src="../assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
     
    <script src="../assets/plugins/node-waves/waves.js"></script>

    <!-- Jquery DataTable Plugin Js -->
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
    
</body>

</html>
