<?php
session_start();
if (!isset($_SESSION['adminID']))
  header('location: ../vista/login.php');
require_once './../assets/db/connectionMysql.php';
?>

<?php include('./../Includes/Head.php'); ?>

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

<?php include('./../Includes/Loader.php'); ?>
   

   
  <div class="overlay"></div>
  

  
  <?php include('./../Includes/Nav.php'); ?>
 

  <?php include '../Includes/Sidebar.php'; ?>
 

  <?php include('./../Includes/Footer.php'); ?>

  <script>
    'use strict';
    document.querySelectorAll('.btn-pdf').forEach(btn => {
      tippy(btn, {
        content: 'Ver PDF',
        placement: 'bottom',
      });
    });

    const nose = async (quotesID, ownerID) => {
      const req = await fetch(`./../vista/citas/controllerRequest.php?ownerID=${ownerID}&quotesID=${quotesID}`, {
        method: 'PUT',
        headers: { 'Content-Type': 'application/json' },
      });

      const res = await req.json();

      //create anchor for redirect to PDF
      const a = document.createElement('a');
      a.setAttribute('target', '_blank');
      a.setAttribute('href', './../vista/citas/createPDF.php');

      if (res.success) return a.click();
    };

    document.querySelectorAll('.checkbox-verify').forEach(checkbox => {
      tippy(checkbox, {
        content: 'Marcar como Atendido',
        placement: 'left',
      });

      checkbox.addEventListener('change', async e => {
        checkbox.checked = false;
        Swal.fire({
          title: "Escriba el diagnóstico",
          input: "textarea",
          inputAttributes: {
            autocapitalize: "off"
          },
          showCancelButton: true,
          showLoaderOnConfirm: true,
          cancelButtonText: 'Cancelar',
          confirmButtonText: "Actualizar",
          preConfirm: async (diagnosis) => {
            if (!diagnosis) Swal.showValidationMessage("Por favor, ingrese un diagnóstico válido");
          },
        }).then(async (result) => {
          if (result.isConfirmed) {
            const quotesID = e.target.value;
            const req = await fetch(`./../vista/citas/controllerRequest.php?quotesID=${quotesID}`, {
              method: 'PATCH',
              headers: { 'Content-Type': 'application/json' },
              body: JSON.stringify({ diagnosis: result.value }),
            });
            const res = await req.json();
            if (res.success) Swal.fire('¡Actualizado exitosamente!', 'El diagnóstico se ha actualizado exitosamente', 'success').then(() => location.reload());
          }
        });
      });
    });

    document.querySelectorAll('.showDiagnosis').forEach(btnShowDiagnosis => {
      btnShowDiagnosis.addEventListener('click', async e => {
        const quotesID = e.target.value;

        const query = await fetch(`./../vista/citas/controllerRequest.php?quotesID=${quotesID}`, {
          method: 'GET',
          headers: { 'content-type': 'application/json' },
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

    const updateDiagnosis = async (quotesID) => {

      const query = await fetch(`./../vista/citas/controllerRequest.php?quotesID=${quotesID}`, {
        method: 'GET',
        headers: { 'content-type': 'application/json' },
      });

      const res = await query.json();
      const diagnosis = decodeURIComponent(escape(res.diagnosis));

      Swal.fire({
        title: "Actualizar el diagnóstico",
        input: "textarea",
        inputValue: diagnosis,
        inputAttributes: {
          autocapitalize: "off"
        },
        showCancelButton: true,
        showLoaderOnConfirm: true,
        cancelButtonText: 'Cancelar',
        confirmButtonText: "Actualizar",
        preConfirm: async (diagnosis) => {
          if (!diagnosis) Swal.showValidationMessage("Por favor, ingrese un diagnóstico válido");
        },
      }).then(async (result) => {
        if (result.isConfirmed) {
          const req = await fetch(`/vetdog/vista/citas/controllerRequest.php?quotesID=${quotesID}`, {
            method: 'PATCH',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ diagnosis: result.value }),
          });
          const res = await req.json();
          if (res.success) Swal.fire('¡Actualizado exitosamente!', 'El diagnóstico se ha actualizado exitosamente', 'success').then(() => location.reload());
        }
      });
    }

    $(document).ready(function () {
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