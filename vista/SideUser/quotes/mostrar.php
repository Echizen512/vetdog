<?php
session_start();
if (!isset($_SESSION['ownerID'])) header('location: ../vista/login.php');
require_once './../../../assets/db/connectionMysql.php';
?>
<!DOCTYPE html>
<html lang="es-ES">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
   
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
 
  <link href="./../../../assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
 
  <link href="./../../../assets/plugins/node-waves/waves.css" rel="stylesheet" />
  
  <link href="./../../../assets/plugins/animate-css/animate.css" rel="stylesheet" />
 
  <link href="./../../../assets/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
  
  <link href="./../../../css/style.css" rel="stylesheet">
  <link href="./../../../assets/css/fullcalendar.css" rel="stylesheet" />
  <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
  <link href="./../../../assets/css/themes/all-themes.css" rel="stylesheet" />
  <link rel="shortcut icon" type="image/x-icon" href="./../../../assets/img/lll.png" />
  <!-- Tippy js  -->
  <script src="./../../../assets/js/popper.js"></script>
  <script src="./../../../assets/js/tippy-bundle.umd.js"></script>

  <title>Registrar Clientes Administrador | Beatriz Fagundez</title>
</head>
<style>
input[type="checkbox"] {
  display: inline-block !important;
  opacity: 1 !important;
  visibility: visible !important;
  margin: 0 !important;
  padding: 0 !important; 
  float: none !important; 
  position: static !important;
}
.showDiagnosis {
  transform: scale(0.8);
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
        <a class="navbar-brand" href="./../home.php">CITAS - USUARIO</a>
      </div>
      </div>
    </div>
  </nav>
 

  <section>
     
    <aside id="leftsidebar" class="sidebar">
       
      <div class="menu">
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
              <a href="./../pets/register.php">Registrar</a>
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
              <a href="./newQuote.php">Pedir Cita</a>
            </li>
            <li>
              <a href="./mostrar.php">Listar</a>
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
      </div>
  </section>

  <section class="content">

    <!-- Quotes attend  -->
    <div class="container-fluid">
      <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="card">
            <div class="header">
              <h2>Listado de las citas rapidas : <a href="http://" target="_blank" rel="noopener noreferrer"></a></h2>
              <br>
            </div>
            <div class="body">
              <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                  <thead>
                    <tr>
                      <th class="text-center">Nº</th>
                      <th class="text-center">CLIENTE</th>
                      <th class="text-center">PRECIO</th>
                      <th class="text-center">INICIO</th>
                      <th class="text-center">FIN</th>
                      <th class="text-center">ESTADO</th> 
                    </tr>
                  </thead>
                  <tbody>

                  <!-- <td style="display: flex;justify-content: center;">
                            <?php if ($va['status'] == 1) { ?>
                              <button class="btn btn-primary showDiagnosis" value="<?= $va['quotesID'] ?>">Ver Diagnóstico</button>
                            <?php }?>
                          </td>  -->
                    <?php
                      $ownerID = $_SESSION['ownerID'];
                      $sql = "SELECT * FROM quotes AS q JOIN veterinarian AS v JOIN owner AS o ON q.vetID = v.id_vet AND o.id_due = ownerID AND ownerID = '$ownerID' ORDER BY q.dateCreation DESC";
                      $results = mysqli_query($conn,$sql);

                      foreach ($results as $key => $va) { ?>
                        <tr>
                          <td class="text-center"><?= $key + 1 ; ?></td>
                          <td class="text-center"><?= $va['nom_due'] ?>&nbsp;<?= $va['ape_due'] ?></td>
                          <?php 
                            $quotesID = $va['quotesID'];
                            $sql = "SELECT SUM(qs.priceTotal) as priceTotal FROM quotes_services as qs JOIN service AS s WHERE qs.serviceID = s.id_servi AND qs.quotesID = '$quotesID'";

                            $result = mysqli_query($conn,$sql);
                            foreach ($result as $row) { ?>
                              <td class="text-center"><?= $va['cost'] + $row['priceTotal'] ?>$</td>
                            <?php } ?>
                          <td class="text-center"><?= date('d/m/Y',strtotime($va['start'])) ?></td>
                          <td class="text-center"><?= date('d/m/Y',strtotime($va['end'])) ?></td>
                          <td style="display: flex;justify-content: center;gap: 10px">
                            <?php if ($va['status'] == 1) { ?>
                              <button onclick="nose('<?= $va['quotesID'] ?>','<?= $va['ownerID'] ?>')" class="btn bg-blue btn-circle waves-effect waves-circle waves-float btn-pdf" style="display: grid;place-items: center">
                                <img src="./../../../assets/icons/TeenyiconsPdfOutline.svg" style="width: 100%;height: 100%;"/>
                              </button>
                              <span class="btn btn-primary" style="cursor:default;display:grid;place-items:center;transform: scale(0.8)">Atendido</span>
                              <button class="btn btn-primary showDiagnosis" value="<?= $va['quotesID'] ?>">Ver Diagnóstico</button>
                            <?php } else { ?>
                              <button onclick="nose('<?= $va['quotesID'] ?>','<?= $va['ownerID'] ?>')" class="btn bg-blue btn-circle waves-effect waves-circle waves-float btn-pdf" style="display: grid;place-items: center">
                                <img src="./../../../assets/icons/TeenyiconsPdfOutline.svg" style="width: 100%;height: 100%;"/>
                              </button>
                              <span class="btn btn-danger" style="cursor:default;transform: scale(0.8);display:grid;place-items:center">No Atendido</span>
                            <?php } ?>
                          </td> 
                        </tr>
                    <?php
                      }
                    ?>
                  </tbody>
                </table> 
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- #END# Exportable Table -->
    </div>
    
    <!-- Quotes request  -->
    <div class="container-fluid">
      <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="card">
            <div class="header">
              <h2>Peticiones de citas:</h2>
              <br>
            </div>
            <div class="body">
              <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                  <thead>
                    <tr>
                      <th class="text-center">Nº</th>
                      <th class="text-center">CLIENTE</th>
                      <th class="text-center">CÉDULA</th>
                      <th class="text-center">FECHA DE SOLICITUD</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $ownerID = $_SESSION['ownerID'];

                      $sql = "SELECT quotesID,dni_due,nom_due,ape_due,dateCreation FROM quotes AS q JOIN owner AS o WHERE q.ownerID = o.id_due AND ownerID = '$ownerID'  AND q.vetID IS NULL ORDER BY q.dateCreation DESC";

                      $results = mysqli_query($conn,$sql);

                      foreach ($results as $key => $row) { ?>
                        <tr>
                          <td class="text-center"><?= $key + 1 ; ?></td>
                          <td class="text-center"><?= $row['nom_due'] ?>&nbsp;<?= $row['ape_due'] ?></td>
                          <td class="text-center"><?= $row['dni_due'] ?></td>                         
                          <td class="text-center"><?= date('d/m/Y',strtotime($row['dateCreation'])) ?></td>
                        </tr>
                    <?php
                      }
                    ?>
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

  <!--=============================================================CONTENIDO DE LA PÁGINA =============================================================-->

 
  <script src="./../../../assets/plugins/jquery/jquery.min.js"></script>
 
  <script src="./../../../assets/plugins/bootstrap/js/bootstrap.js"></script>
  <!-- Select Plugin Js -->
  <script src="./../../../assets/plugins/bootstrap-select/js/bootstrap-select.js"></script>
 
  <script src="./../../../assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
   
  <script src="./../../../assets/plugins/node-waves/waves.js"></script>
  <!-- Jquery DataTable Plugin Js -->
  <script src="./../../../assets/plugins/jquery-datatable/jquery.dataTables.js"></script>
  <script src="./../../../assets/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
  <script src="./../../../assets/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
  <script src="./../../../assets/plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
  <script src="./../../../assets/plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
  <script src="./../../../assets/plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
  <script src="./../../../assets/plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
  <script src="./../../../assets/plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
  <script src="./../../../assets/plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>
  
  <script src="./../../../assets/js/admin.js"></script>

  
  <script src="./../../../assets/js/demo.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
const nose = async(quotesID,ownerID) => { 
  const req = await fetch(`./../../citas/controllerRequest.php?ownerID=${ownerID}&quotesID=${quotesID}`,{
    method: 'PUT',
    headers: {'Content-Type': 'application/json'},
  });

  const res = await req.json();
  //create anchor for redirect to PDF
  const a = document.createElement('a');
  a.setAttribute('target', '_blank');
  a.setAttribute('href', './../../citas/createPDF.php');

  if(res.success) return a.click();
};

document.querySelectorAll('.showDiagnosis').forEach(btnShowDiagnosis => {
  btnShowDiagnosis.addEventListener('click',async e => {
    const quotesID = e.target.value;
    
    const query = await fetch(`./../../../vista/citas/controllerRequest.php?quotesID=${quotesID}`,{
      method: 'GET',
      headers: {'content-type': 'application/json'},
    });

    const res = await query.json();
    const diagnosis = decodeURIComponent(escape(res.diagnosis));
    Swal.fire({
      title: 'Diagnóstico',
      html: `<p style="font-size: 18px;text-indent:10px">${diagnosis}</p>`,
      confirmButtonText: "Cerrar",
    });
  })
})

$(document).ready(function() {
  $('.js-exportable').DataTable({
  responsive: true,
    "language": {
        "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
    }
  });
});
</script>
</body>
</html>