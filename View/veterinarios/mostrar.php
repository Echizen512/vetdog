<?php
session_start();

if (!isset($_SESSION['adminID'])) header('location: ../vista/login.php');

require_once './../assets/db/connectionMysql.php';

?>

<?php include('./../Includes/Head.php'); ?>

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
 
<?php include('./../Includes/Loader.php'); ?>
   

   
  <div class="overlay"></div>
  

  
  <nav class="navbar">
    <div class="container-fluid">
      <div class="navbar-header">
        <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
        <a href="javascript:void(0);" class="bars"></a>
        <a class="navbar-brand" href="../panel-admin/administrador"> CONSULTORIO - BEATRIZ FAGUNDEZ </a>
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
              <h2>Listado de veterinarios :</h2>
              <br>

            </div>
            <div class="body">
              <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                  <thead>
                    <tr>
                      <th class="text-center">Nº</th>
                      <th class="text-center">DNI</th>
                      <th class="text-center">DATOS</th>
                      <th class="text-center">CORREO</th>
                      <th class="text-center">DIRECCION</th>
                      <th class="text-center">TELEFONO</th>
                      <th class="text-center">ESTADO</th>
                      <th class="text-center">ACCIONES</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    foreach ($dato as $key => $value) {
                      foreach ($value as $key => $va) { ?>
                        <tr>
                          <td class="text-center"><?= $key + 1; ?></td>
                          <td class="text-center"><?= $va['dnivet']; ?></td>
                          <td class="text-center"><?= $va['nomvet']; ?>&nbsp;<?= $va['apevet']; ?></td>
                          <td class="text-center"><?= $va['correo']; ?></td>
                          <td class="text-center"><?= $va['direcc']; ?></td>
                          <td class="text-center"><?= $va['movil']; ?></td>
                          <td class="text-center"><?php
                              if ($va['estado'] == 1) { ?>
                              <form method="get" action="javascript:activo('<?= $va['id_vet']; ?>')">
                                <span class="label label-success">Activo</span>
                              </form>
                            <?php } else { ?>
                              <form method="get" action="javascript:inactivo('<?= $va['id_vet']; ?>')">
                                <button type="submit" class="btn btn-danger btn-xs">Inactivo</button>
                              </form>
                            <?php } ?>
                          </td>
                          <td style="display: flex;justify-content: center;gap: 5px;">
                            <a type="button" href="../vista/veterinarios/edit?id=<?= $va["id_vet"]; ?>" class="btn bg-blue btn-circle waves-effect waves-circle waves-float btnEdit">
                              <i class="material-icons">autorenew</i>
                            </a>
                            <!-- <button href="../vista/veterinarios/borrar?id=<?= $va["id_vet"] ?>" class="btn bg-red btn-circle waves-effect waves-circle waves-float btnDelete">
                              <i class="material-icons">delete</i>
                            </button> -->
                          </td>
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

 

  <?php include '../Includes/Footer.php'; ?>

<script>
'use strict';

document.querySelectorAll('.btnEdit').forEach(btn => {
  tippy(btn, {
    content: 'Editar',
    placement: 'bottom',
  })
})

document.querySelectorAll('.btnDelete').forEach(btn => {
  tippy(btn, {
    content: 'Eliminar',
    placement: 'bottom',
  })
})

document.querySelectorAll('.btnDelete').forEach(btnDelete => {
  btnDelete.addEventListener('click', async () => {
    Swal.fire({
      title: "¿Está seguro?",
      text: "Al eliminar no se puede recuperar.",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      confirmButtonText: "Eliminar",
      cancelButtonColor: "#d33",
      cancelButtonText: "Cancelar",
    }).then( async (result) => {
      if (result.isConfirmed) {
        const veterinarianID = btnDelete.id;
        const req = await fetch(`../vista/veterinarios/borrar.php?deleteID=${veterinarianID}`);
        const res = await req.json();
        
        if(res.success) Swal.fire('¡Eliminado!','¡Categoría eliminado exitositamente!','success').then(() => location.reload());
        else if(res.error) Swal.fire('¡Error!','¡No puede eliminar veterinario con citas!','error');
      }
    });
  });
});

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