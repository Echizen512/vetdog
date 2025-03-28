﻿<?php
session_start();

if (!isset($_SESSION['adminID'])) header('location: ../login.php');
require_once '../../assets/db/connectionMysql.php';

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Vetdog V.1 | Vetdog - Vetdog Admin Template</title>
     
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
   
    <link href="../../assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
   
    <link href="../../assets/plugins/node-waves/waves.css" rel="stylesheet" />
    
    <link href="../../assets/plugins/animate-css/animate.css" rel="stylesheet" />
   
    <link href="../../assets/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
    
    <link href="../../css/style.css" rel="stylesheet">
    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="../../assets/css/themes/all-themes.css" rel="stylesheet" />
    <link rel="shortcut icon" type="image/x-icon" href="../../assets/img/lll.png" />

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
                                <a href="../venta/compras_fecha">Consultar por fecha</a>
                            </li>

                        </ul>
    </li>
   
        <aside id="rightsidebar" class="right-sidebar">
        </aside>
    </section>




    <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">

<?php         
function connect(){
return new mysqli("localhost","root","","vetdog");
}
$con = connect();
$id = $_GET['id'];
$sql = "SELECT  compra.fecha, compra.id_compra,compra.estado, compra.total, compra.tipoc, compra.tipopa,supplier.id_prove, supplier.nomprove, supplier.ruc, supplier.direcc, supplier.pais, supplier.tele, supplier.corre,
GROUP_CONCAT( products.nompro, '..', products.codigo, '..',products.preciC, '..', productos_comprados.canti SEPARATOR '__') AS products FROM compra INNER JOIN productos_comprados ON productos_comprados.id_compra = compra.id_compra INNER JOIN products ON products.id_prod = productos_comprados.id_prod INNER JOIN supplier ON compra.id_prove =supplier.id_prove  WHERE compra.id_compra= '$id' GROUP BY compra.id_compra ORDER BY compra.id_compra ";
$query  =$con->query($sql);
$data =  array();
if($query){
  while($r = $query->fetch_object()){
    $data[] = $r;
  }
}

?> 
<?php if(count($data)>0):?>
    <?php foreach($data as $d):?>
        
                <div class="col-xs-12 col-sm-3">
                    <div class="card profile-card">
                        <div class="profile-header">&nbsp;</div>
                        <div class="profile-body">
                            <div class="image-area">
                                <img src="../../assets/img/logo.png" alt="AdminBSB - Profile Image" />
                            </div>
                            <div class="content-area">
                                <h3>Admin</h3>
                                <p>Administrator</p>
                            </div>
                        </div>
                        <div class="profile-footer">
                           
                            <button class="btn btn-success btn-lg waves-effect btn-block">ACTIVO</button>
                        </div>
                    </div>                    
                </div>

                <div class="col-sm-4">
                                    <label class="control-label">VETERINARIA VETDOG S.A.C</label>

                </div>
                <div class="col-sm-4">
                                    <label class="control-label"><?php echo $d->tipoc; ?> Electronico</label>

                <a style="margin-top:20px;" href="../compra/report?id=<?php echo $d->id_compra; ?>" title="Reporte" class="btn btn-danger"><i class="material-icons">print</i> Imprimir Reporte Electronico<span><img src="../../assets/img/cargando.gif" class="cargando hide"></span></a>


                                   



                </div>
             <div class="col-sm-4">   
                <div class="form-group">
                    <label for="nombres" class="col-sm-5 control-label">RUC:</label>
                        <div class="col-sm-7">
                            <div class="form-line">
                                <input type="text" class="form-control" disabled value="10099876565">
                            </div>
                        </div>
                </div>

                <div class="form-group">
                    <label for="nombres" class="col-sm-5 control-label">PROVEEDOR:</label>
                        <div class="col-sm-7">
                            <div class="form-line">
                                <input type="text" class="form-control" disabled value="<?php echo $d->nomprove; ?>">
                            </div>
                        </div>
                </div>

                <div class="form-group">
                    <label for="nombres" class="col-sm-5 control-label">DIRECCION:</label>
                        <div class="col-sm-7">
                            <div class="form-line">
                                <input type="text" class="form-control" disabled value="<?php echo $d->direcc; ?>">
                            </div>
                        </div>
                </div>

                <div class="form-group">
                    <label for="nombres" class="col-sm-5 control-label">TIPO DE PAGO:</label>
                        <div class="col-sm-7">
                            <div class="form-line">
                                <input type="text" class="form-control" disabled value="<?php echo $d->tipopa; ?>">
                            </div>
                        </div>
                </div>
            </div>

                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9"  id="imprime">
                    <div class="card">
                        <div class="header">
                           
                        </div>

                        <div class="body">

                            <div class="table-responsive">
                               
                                <table class="table table-bordered table-striped table-hover dataTable">
                                    <thead>
                                        <tr>
                                        
                                        <th>FECHA</th>
                                        <th>PRODUCTOS COMPRADOS</th>
                                        
                                        <th>TOTAL</th>
                                       
                                      
                                      
                                     
                                    </tr>
                                    </thead>
                                    
                                <tbody>

        <tr>
         
            <td><?php echo $d->fecha; ?></td>

            <td>
                                       

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                   
                                    <th>Nombre</th>
                                    <th>Precio</th>
                                    <th>Cantidad</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach(explode("__", $d->products) as $articulosConcatenados){ 
                                $products = explode("..", $articulosConcatenados)
                                ?>
                                <tr>
                                  
                                    <td><?php echo $products[0] ?></td>
                                    <td>S/.<?php echo $products[2] ?></td>
                                    <td><?php echo $products[3] ?></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table> 

            </td>

            <td><?php echo $d->total; ?></td>
            

        </tr>

                                </tbody>

                                </table>

                                <?php endforeach; ?>
  
      
                            </div>
                             <?php else:?>  
      <span class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-700">
          No hay datos
        </span>
    <?php endif; ?>
                        </div>

                    </div>

                </div>



            </div>
            
        </div>

        <a type="button" href="../../folder/compra" class="btn bg-blue"><i class="material-icons">arrow_back</i> Regresar atrás </a>
    </section>

   
    <script src="../../assets/plugins/jquery/jquery.min.js"></script>
   
    <script src="../../assets/plugins/bootstrap/js/bootstrap.js"></script>
    <!-- Select Plugin Js -->
    <script src="../../assets/plugins/bootstrap-select/js/bootstrap-select.js"></script>
   
    <script src="../../assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
     
    <script src="../../assets/plugins/node-waves/waves.js"></script>

    <!-- Jquery DataTable Plugin Js -->
    <script src="../../assets/plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="../../assets/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="../../assets/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="../../assets/plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="../../assets/plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="../../assets/plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="../../assets/plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="../../assets/plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

    
    <script src="../../assets/js/admin.js"></script>
    <script src="../../assets/js/pages/tables/jquery-datatable.js"></script>

    
    <script src="../../assets/js/demo.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <!--------------------------------script edit cate----------------------------->
    <script type="text/javascript">
        
        function imprSelec(X){
        var ficha=document.getElementById(X);
        var ventimp=window.open(' ','popimpr');
        ventimp.document.write(ficha.innerHTML);
        ventimp.document.close();
        ventimp.print();
        ventimp.close();
 }
    </script>   
    
</body>

</html>
