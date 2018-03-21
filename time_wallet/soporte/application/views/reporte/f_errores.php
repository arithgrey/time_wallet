<style type="text/css">
.calificaciones-ocultas{
	display: none;
}
.text-mejora{
	color: #078AEA;
	font-weight: bold;
	font-size: 1.3em;
}
</style>
<div class='seccion_form_errores'>
	<div class='col-lg-6 col-md-6  col-sm-8 col-lg-offset-3  col-md-offset-3 col-sm-offset-2'>				
		<form class='form-error' id='form-error' action='<?=base_url("index.php/api/reportes/reporteincidencia/format/json/")?>'>
			<div class='enid-service-start' id='enid-service-start'>
				<center>
					<div id="contenidor-ranking" > 
						 <?=get_inputs_starts(5)?>			           
					</div>
					<div class='place_val_estrellas' id='place_val_estrellas'>
					</div>
				</center>
			</div>
			<div class="form-group">            				

					<div class='calificaciones-ocultas'>
						<div class='col-lg-6'>						
							<?=create_select($tipos_incidencias , "tipo_incidencia", "incidencia form-control input-sm" ,  "incidencia" , "tipo_incidencia" , "idtipo_incidencia" )?>
						</div>
						<div class='col-lg-6'>												
							<?=create_select($calificaciones , "afectacion", "afectacion form-control input-sm" ,  "afectacion" , "nombre" , "idcalificacion" )?>
						</div>					
	                	<input class="form-control input-sm" value="<?=base_url()?>" name="pagina_error" id="pagina_error" type="hidden" placeholder="enidservice.com">                	
                	</div>
	            <center>
		            <span class='text-mejora'>
		               	¿Que mejorarías de Time Wallet?
					</span>
				</center>
                <div class='place_reporte_incidencia'>
                </div>
				<textarea name='descripcion' id='descripcion_incidencia' class='descripcion form-control'  rows="2" >
				</textarea>				
				<input type='hidden' name='tipo_template' value='<?=$param["tipo"]?>'>					 
             </div>
             <center>
             	<div class='place_registro_incidencia'>
             	</div>
             	<?=btn_registrar_cambios_enid("btn_registar" , "btn_registar")?>             	
             </center>
		</form>
	</div>
</div>
<?=n_row_12()?>
	<center>
		<div class='place_registro' id='place_registro'>
		</div>
	</center>
<?=end_row()?>

<style type="text/css">

input[type="radio"] {
  display: none;
}
label{
  color: #00bcd4;
  font-size: 2em;
}
.clasificacion {
  direction: rtl;
  unicode-bidi: bidi-override;
}
label:hover,
label:hover ~ label {
  color: #E8DBC2;
}
input[type="radio"]:checked ~ label {
  color: #E8DBC2;
}



</style>