<?php
        $complete  ="";		
        $info_uso = "";			
		$height ="style='overflow-x:auto;'"; 
		if (count($info_sistema["semanal"]) > 3 ){
			
			$height ="style='overflow-y:scroll; overflow-x:auto; height: 500px;' " ; 
		}
		$b =1;						  
		$x =0;
		$limite = count($info_sistema["semanal"]) -1;
		foreach ($info_sistema["semanal"] as $row) {

			
			$f_registro =  $row["f_registro"];
			$total_registrado  =  $row["total_registrado"];
			$home =  $row["home"];			
			$dias = array('', 'Lunes','Martes','Miercoles','Jueves','Viernes','Sabado','Domingo');
			$dia_semana = $dias[date('N', strtotime($f_registro))];

			$inicio_session =  $row["inicio_session"];
			$uso_time_wallet =  $row["uso_time_wallet"];
			
			$tendencias_empresa  =  $row["tendencias_empresa"]; 
			$informacion_usuario  =  $row["informacion_usuario"]; 
			$errores_sistema   =  $row["errores_sistema"]; 
			

			$style ="";
			if ($x ==  $limite) {
				$style ="style='background:#166781; color:white;' ";
			}
			$info_uso .='<tr  '.$style.'  >';			
				

				if ($x !=  $limite) {
					$info_uso .=  get_td($dia_semana , "class='f-enid' " );				
					$info_uso .= get_td($f_registro , "class='f-enid' ");
				}else{
					$info_uso .= "<td colspan='2'>Totales</td>";
				}
				$info_uso .=  get_td($total_registrado );				
				$info_uso .= get_td($home);					
				$info_uso  .=  get_td($inicio_session);
				$info_uso  .=  get_td($uso_time_wallet);			
				$info_uso .= get_td($tendencias_empresa);				
				$info_uso .= get_td($informacion_usuario);
				$info_uso .= get_td($errores_sistema);				
			$info_uso .='</tr>';			
			$b++;
			$x ++;
		}
?>





<?=titulo_enid("Uso de Enid Service semanal ")?>
<div class='contenedor_inf'>
	<span class='num_registros_encontrados'>
		# Días de la semana <?=count($info_sistema);?>
	</span>
	<table class='table_enid_service' border=1>		
		<tr class='table_enid_service_header'>								
				<td  colspan='2'> 
						Fechas
				</td>
				<?=get_td("Time Walle")?>
				<?=get_td("Home")?>				
					
				<?=get_td("Inicio session")?>
				<?=get_td("Uso Time Wallet")?>			
				<?=get_td("Tendencias empresa"  );?>
				<?=get_td("Informacion usuario"  );?>
				<?=get_td("Errores sistema "  );?>				                       
		</tr>		
		<?=$info_uso;?>
	</table>
</div>




<?php
        $complete  ="";		
        $info_uso = "";			
		$height ="style='overflow-x:auto;'"; 
		if (count($info_sistema["dia"]) > 3 ){
			
			$height ="style='overflow-y:scroll; overflow-x:auto; height: 500px;' " ; 
		}
		$b =1;						  
		$x =0;
		$limite = count($info_sistema["dia"]) -1;
		foreach ($info_sistema["dia"] as $row) {

			
			$horario =  $row["horario"];
			$total_registrado  =  $row["total_registrado"];
			$home =  $row["home"];
			
			
			


			$dias = array('', 'Lunes','Martes','Miercoles','Jueves','Viernes','Sabado','Domingo');
			$dia_semana = $dias[date('N', strtotime($horario))];

	
	
			$inicio_session =  $row["inicio_session"];
			$uso_time_wallet =  $row["uso_time_wallet"];			
			$tendencias_empresa  =  $row["tendencias_empresa"]; 
			$informacion_usuario  =  $row["informacion_usuario"]; 
			$errores_sistema   =  $row["errores_sistema"]; 
			

			$style ="";
			if ($x ==  $limite) {
				$style ="style='background:#166781; color:white;' ";
			}
			$info_uso .='<tr  '.$style.'  >';			
				

				if ($x !=  $limite) {					
					$info_uso .= get_td($horario , "class='f-enid' ");
				}else{
					$info_uso .= "<td >Totales</td>";
				}
				$info_uso .=  get_td($total_registrado );				
				$info_uso .= get_td($home);							
				$info_uso  .=  get_td($inicio_session);
				$info_uso  .=  get_td($uso_time_wallet);				
				$info_uso .= get_td($tendencias_empresa);				
				$info_uso .= get_td($informacion_usuario);
				$info_uso .= get_td($errores_sistema);				
				                          
			$info_uso .='</tr>';			
			$b++;
			$x ++;
		}
?>

	<?=titulo_enid("Uso de Enid Service día")?>
	<div class='contenedor_inf'>
		<table class='table_enid_service' border=1>		
			<tr class='table_enid_service_header'>									
				<?=get_td("Horario")?>
				<?=get_td("Time Wallet")?>
				<?=get_td("Home")?>				
				<?=get_td("Inicio session")?>
				<?=get_td("Uso Time Wallet")?>				
				<?=get_td("Tendencias empresa"  );?>
				<?=get_td("Informacion usuario"  );?>
				<?=get_td("Errores sistema "  );?>				
			</tr>		
			<?=$info_uso;?>
		</table>
	</div>	



<?=titulo_enid("Visitas Enid día")?>
<?php
	
	$info_dispositivos =""; 

	foreach($info_sistema["visitas_dispositivos"] as $row){

		$accesos   =  $row["accesos"];
	    $ip    =  $row["ip"];
	    $sitios    =  $row["sitios"];
	    $dispositivos    =  $row["dispositivos"];

	    $info_dispositivos .= "<tr>";
	    $info_dispositivos .= get_td($accesos); 	    
		$info_dispositivos .=  get_td($ip);
		$info_dispositivos .=  get_td("<a>". $sitios ."</a>" ,  "class='sitios_dia' data-toggle='modal' data-target='#visitas_dia'   ");
		$info_dispositivos .=  get_td("<a>". $dispositivos ."</a>" ,  "class='dispositivos_dis'  data-toggle='modal' data-target='#visitas_dia'  ");	
		$info_dispositivos .= "</tr>";

	}
?>




<div class='contenedor_inf'>
	<table class='table_enid_service' border=1>
		<tr class="table_enid_service_header">					
			<?=get_td("Accesos");?>
			<?=get_td("Personas"  );?>
			<?=get_td("Sitios" );?>	
			<?=get_td("dispositivos" );?>	
		</tr>									
		<?=$info_dispositivos?>	
	</table>
</div>
<style type="text/css">
.tipo_text{
	background: #166781;
	color: white;
}
.campo_contacto{
	background: #3C5E79;	
	color: white;
}
.titulo-principal{
	background: #2196f3;
	color: white;
}
</style>