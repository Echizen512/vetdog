<?php
session_start();

if (!isset($_SESSION['adminID'])) header('location: ../login.php');
require_once '../assets/db/connectionMysql.php';

?>

<?php include('./../Includes/Head.php'); ?>

<body class="theme-red">

<?php include('./../Includes/Loader.php'); ?>

     
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
   

    <?php include '../Includes/Sidebar.php'; ?>




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

                                     
                                      
                                    </tr>
                                    </thead>
                                    
                                    <tbody>
                                    <?php foreach($compras as $compra){ ?>
                                    <tr>
                                    <td class="text-center"><?php echo $compra->tipoc ?></td>
                                    <td class="text-center"><?php echo (new DateTime($compra->fecha))->format('d/m/Y'); ?></td>

                                    
                                   

                                    <td class="text-center">$<?php echo $compra->total ?></td>
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


                                    
                                    </tr>
                                     <?php } ?>
                                </tbody>

                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            
        </div>
    </section>

    <?php include('./../Includes/Footer.php'); ?>
</body>

</html>
