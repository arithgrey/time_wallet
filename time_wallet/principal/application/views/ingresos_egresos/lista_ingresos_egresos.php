<?php
		$arr = [ "Gasto", "Ingreso"];
        $complete  ="";		
        $l = "";			
		$height ="style='overflow-x:auto;'"; 
		if (count($ingresos_egresos["desglose"]) >= 10 ){			
			$height ="style='overflow-y:scroll; overflow-x:auto; height: 200px;' " ; 
		}
		$b =1;						  
		$x = count($ingresos_egresos["desglose"]);
		$total_dia  = 0;  
		$registros = 0;
		foreach ($ingresos_egresos["desglose"] as $row) {

			$id_registro =  $row["id_registro"];
			$f_registro      = $row["f_registro"];
			$hora =  $row["hora"];
			$nombre    = $row["nombre"];						
			$tipo = $row["tipo"];			
			$cantidad = $row["cantidad"];			
			$valor = $row["valor"];			
			$total =  $row["total"];
			$total_dia =  $total_dia + $total;
			
			$l .='<tr>';		
				$l .= get_td(" <i class='fa fa-times' ></i> " , "title='Elimina registro de la cuenta' class='eliminar_registro'  id='".$id_registro."' data-toggle='modal' data-target='#eliminar-registro-modal'  "); 					
				$l .= get_td(" <i class='fa fa-cog' ></i> " , "title='Modifica los datos de este registro' class='editar_registro'  id='".$id_registro."' data-toggle='modal' data-target='#editar-registro-modal'  "); 					
				$l .= get_td("<i class='fa fa-arrow-circle-right' ></i>" , " title='Mueve éste registro de a otra cuenta o a tipo de ingreso' class='mover_registro'  id='".$id_registro."' data-toggle='modal' data-target='#mover-registro-modal'  "); 					
				

				
				$l .= get_td($nombre); 				
				$l .= get_td($cantidad); 
				$l .= get_td($valor); 
				$l  .= get_td($total);			
				$l .= get_td($f_registro); 
				$l .= get_td($hora); 
			$l .='</tr>';			

			$b++;
			$registros ++; 
			$x -- ;

		}	
	

	$btn_menu =  '<span data-toggle="modal" data-target="#menu-ingresos-modal" title="Más opciones"  class="btn_mn"  id="btn_mn">    
					  <i class="fa fa-plus" aria-hidden="true">
      </i> 
					  </span>'; 
					
	
	
	if ($info["tipo"] ==  1){
		$btn_menu = '
	<span data-toggle="modal" data-target="#registra-ingreso-modal" title="Registrar nuevo gastos"  class="btn_mn"  id="btn_mn">    
				  <i class="fa fa-plus" aria-hidden="true">
      </i> 
				</span>'; 	
	}	

?>



<br>
<?=$btn_menu ?>




<?=n_row_12()?>
	<div class='place_simple_balance'>
	</div>	
<?=end_row()?>

<div <?=$height?> >
	<table class='table_enid_service' border=1>
		<tr class="table_enid_service_header_s">		
			<?=get_td("Últimos ". $arr[$info["tipo"]] ." registrados" , "colspan = '10' ")?>
		</tr>	
		<tr class="table_enid_service_header">						
				<?=get_td("Eliminar"); ?>
				<?=get_td("Editar"); ?>
				<?=get_td("Mover"); ?>				
				<?=get_td("Registro"); ?>				
				<?=get_td("Cantidad"); ?>
				<?=get_td("Valor"); ?>
				<?=get_td("Total"); ?>
				<?=get_td("Fecha Registro"); ?>
				<?=get_td("Hora"); ?>
		</tr>		
		<?=$l;?>
	</table>
</div>


