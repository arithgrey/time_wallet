$(document).on("ready", function(){
	$("#inbutton").click(trysession);
	$(".form-pass").submit(recupera_password);

});
/**/
function trysession(){
	pw = $.trim($("#pw").val());
	if(pw.length >= 8){
		expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		mail = $('#mail').val();		
		/*Validamos el mail*/
		if (!expr.test(mail)) {
			llenaelementoHTML(".reportesession" , "Registre un email correcto");
			recorrepage("#mail");	
		}else{
			pwpost = ""+CryptoJS.SHA1(pw);
			$("#secret").val(pwpost);			
			
			url = $("#in").attr("action");
			$.ajax({
					url : url , 
					type : "POST" , 
					data: $("#in").serialize(), 
					beforeSend : function(){
						$("#status_registro_user").show();	
					} 
					
					}).done(function(data){			

						/*Cuando regresamos los datos*/
						
								
						if (data == 1 ) {
							next  = now + "index.php/startsession/presentacion/";
							redirect(next);					
						}else{					
							llenaelementoHTML(".reportesession" , data);
							$("#inbutton").click(trysession);
							$("#status_registro_user").hide();
						}

			}).fail(function(){							
				llenaelementoHTML(".reportesession" , "");
				$("#inbutton").click(trysession);
				$("#status_registro_user").hide();
			});
			
		}
	}else{		
		/*Regresamos el error*/
		llenaelementoHTML(".reportesession" , "Contraseña muy corta");
		/*Deslizamos el navegador al error*/
		recorrepage("#pw");
	}	
	return false;
}
/**/
function recupera_password(e){

	/*Valida previo a enviar */
	flag= valida_email_form("#email_recuperacion" ,  ".place_recuperacion_pw" );  
	
	if (flag ==1 ){
		$(".place_recuperacion_pw").empty();
		url = $(".form-pass").attr("action");	
		$.ajax({
			url :  url , 
			type: "POST", 
			data: $(".form-pass").serialize(),
			beforeSend: function(){
				show_load_enid( ".place_recuperacion_pw" , "Enviando a tu correo electrónico ... " , 1 ); 						
			}
		}).done(function(data){
			/**/
			$('#contenedor-form-recuperacion').find('input, textarea, button, select').attr('disabled','disabled');
			
			console.log(data);
			llenaelementoHTML(".place_recuperacion_pw" ,  "El correo de recuperación se ha enviado con éxito.!" ); 			
			show_response_ok_enid(".estatus-recuperacion-pw" , "El correo de recuperación se ha enviado con éxito.!");	

		}).fail(function(){
			/**/
			show_error_enid(".place_recuperacion_pw"  , "Error en el envió, verifique que su correo sea correcto."); 
		});
	}
	e.preventDefault();	
}