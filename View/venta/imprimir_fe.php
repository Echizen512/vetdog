<?php
error_reporting(E_ALL ^ E_NOTICE);
require_once '../venta/adminDAO.php';
$impr = new adminDAO();
$datos = $impr->allBitacora();
?>

<?php 
	if(count($datos)>0){ 
	for($x=0; $x<count($datos); $x++){	 
?>
	<tr>
		<td class="text-center"><?php echo $datos[$x]['tipoc']; ?></td>

		<td class="text-center"><?php echo fechaNormal($datos[$x]['fecha']); ?></td>

		<td class="text-center"><?php echo $datos[$x]['nom_due']; ?></td>

		<td class="text-center"><?php echo $datos[$x]['total']; ?></td>
        <td class="text-center"><?php echo $datos[$x]['ref']; ?></td>

		<td class="text-center">
                <?php    

                if($datos[$x]['estado']==1)  { ?> 
                <form  method="get" action="javascript:activo('<?php echo $datos[$x]['id_venta']; ?>')">
                   
                    <span class="label label-success">Aceptado</span>
                </form>
                <?php  }   else {?> 

                    <form  method="get" action="javascript:inactivo('<?php echo $datos[$x]['id_venta']; ?>')"> 
                        <button type="submit" class="btn btn-danger btn-xs">Anuladas</button>
                     </form>
                        <?php  } ?>                         
        </td>

        <td class="text-center">
                <a type="button" data-toggle="modal" href="#delete_<?php echo $datos[$x]['id_venta']; ?>"  class="btn bg-red btn-circle waves-effect waves-circle waves-float">
                    <i class="material-icons">close</i>

                </a>
                <?php include('../venta/modal.php'); ?>

                <a type="button" href="../venta/detalles?id=<?php echo $datos[$x]['id_venta']; ?>"  class="btn bg-blue btn-circle waves-effect waves-circle waves-float">
                    <i class="material-icons">remove_red_eye</i>

                </a>
            </td>

	</tr>

<?php
	}
	}else{
?>
	<tr class="odd"><td valign="top" colspan="8" class="dataTables_empty">No hay datos disponibles en la tabla</td></tr>
<?php
	}
			
?>

