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

	foreach ($ingresos_egresos["desglose"] as $row){


			$id_registro =  $row["id_registro"];
			$f_registro      = $row["f_registro"];
			$hora =  $row["hora"];
			$nombre    = $row["nombre"];						
			$tipo = $row["tipo"];			
			$cantidad = $row["cantidad"];			
			$valor = $row["valor"];			
			$total =  $row["total"];
			$total_dia =  $total_dia + $total;
			$descripcion =  $row["descripcion"];
			


			$part_editar	=  "title='Modifica los datos de este registro' data-toggle='modal' data-target='#editar-registro-modal'  "; 					
			$editar =  " <i class='fa fa-cog editar_registro btn '  id='".$id_registro."'  ".$part_editar." ></i> ";				

			$part_eliminar =  "title='Elimina registro de la cuenta'  data-toggle='modal' data-target='#eliminar-registro-modal'  ";				
			$eliminar = " <i class='fa fa-times eliminar_registro btn' id='".$id_registro."' ".$part_eliminar." ></i> ";


			$part_mover =  " title='Mueve éste registro de a otra cuenta o a tipo de ingreso' data-toggle='modal' data-target='#mover-registro-modal'  "; 								
			$mover =  "<i class='fa fa-arrow-circle-right mover_registro btn' id='".$id_registro."' ".$part_mover ." ></i>" ;

			$l .=n_row_12();


				
				$l .="<div class='col-lg-1'><br>";
				
					$l .= n_row_12();
						$l .= $eliminar;
					$l .= end_row();									


					$l .= n_row_12();
						$l .= $editar;
					$l .= end_row();									
					

					$l .= n_row_12();
						$l .= $mover;
					$l .= end_row();									


				$l .="</div>";

				$l .="<div class='col-lg-4'>";
					$l .= titulo_enid( $nombre);
						$l .= n_row_12();
							$l .= $f_registro .  "<br>" . $hora;
						$l .= end_row();

				$l .="</div>";
				$l .="<div class='col-lg-7'>";

						$l .= n_row_12();

							$l .= "<div class='pull-right'>";
								$l .= "<button class='btn'>Valor ".$valor." MXN </button>  ";
								$l .= "<button class='btn'>Cantidad ".$cantidad." </button>  ";
								$l .= "<button style='background:#0D67ED; color:white;' class='btn'>Total ".$total." MXN </button>";
							$l .= "</div>";
						$l .= end_row();					
						$l .= n_row_12();
							$l .= "<span style='font-size:.9em; font-weight:bold;'>". $descripcion ."</span>";		
						$l .= end_row();					
				$l .="</div>";

			$l .= end_row();
			$l .="
					<hr>";


			/*
			$l .='<tr>';		

				$l .= get_td(" <i class='fa fa-times eliminar_registro' id='".$id_registro."' ></i> " , "title='Elimina registro de la cuenta'  id='".$id_registro."'  class='eliminar_registro'   data-toggle='modal' data-target='#eliminar-registro-modal'  "); 					
				$l .= get_td(" <i class='fa fa-cog editar_registro'  id='".$id_registro."'  ></i> " , "title='Modifica los datos de este registro' class='editar_registro'  id='".$id_registro."' data-toggle='modal' data-target='#editar-registro-modal'  "); 					
				$l .= get_td("<i class='fa fa-arrow-circle-right mover_registro' id='".$id_registro."' ></i>" , " title='Mueve éste registro de a otra cuenta o a tipo de ingreso' class='mover_registro'  id='".$id_registro."' data-toggle='modal' data-target='#mover-registro-modal'  "); 								
				$l .= get_td($nombre); 				
				$l .= get_td($cantidad); 
				$l .= get_td($valor); 
				$l  .= get_td($total);			
				$l .= get_td($f_registro); 
				$l .= get_td($hora); 


			$l .='</tr>';			

			*/



			$b++;
			$registros ++; 
			$x -- ;

		}	
	

	$btn_menu =  '  <span data-toggle="modal" data-target="#menu-ingresos-modal" title="Más opciones"  class="btn_mn"  id="btn_mn">    
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
<?=$btn_menu;?>
<?=n_row_12()?>
	<div class='place_simple_balance'>
	</div>	
<?=end_row()?>
<br>
<hr>
<div class='contenedor_principal_secciones'> 
	<?=$l?>
</div>