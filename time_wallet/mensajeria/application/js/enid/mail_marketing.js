$(document).ready(function(){
	$(".form-template").submit(registra_template);
	$("#programadas").click(carga_template);
	$("#form_busqueda").submit(b_busqueda);
	$(".reporte").click(carga_reporte);
	$(".tipo_publicidad_r").change(carga_reporte);
	$("#AA").click(function(){			
		

		if ($("#AA").val() ==  1 ) {
			set_icons(0);
			$("#AA").val(0);

		}else{
			set_icons(1);
			$("#AA").val(1);
		}

	});
	

	flag_busqueda =0;

	/**/
	$("footer").ready(cargar_empresas_disponibles);
	$(".tipo_publicidad").change(cargar_empresas_disponibles);


});
/**/
function registra_template(e){

	tipo_publicidad = $("#tipo_publicidad").val();
	url =  now  + "index.php/api/templ/publicidad/format/json/"; 	
	flag =  valida_text_form(".p-text-area" , ".place_descripcion" , 10 , "Descripción de la publicidad");
	if (flag == 1){
		$.ajax({
			url : url , 
			type: "POST",
			data : $(".form-template").serialize() , 
			beforeSend: function(){
				show_load_enid(".place_template_mail" , "Registrando ... " , 1); 	
			}
		}).done(function(data){

			/**/
			$("#b_asunto").val($("#asunto").val());

			/**/

			document.getElementById("form-template").reset();			
			muestra_seccion("programar_plantillas" , tipo_publicidad );
			show_response_ok_enid(".place_template_mail" ,  "Éxito al registrar, ahora programe su publicación.! " ); 								
		}).fail(function(){
			show_error_enid(".place_template_mail" , "Error en el registro, reporte al administrador.");	
		});
	}
	e.preventDefault();
}
function b_busqueda(e){

	carga_template();
	e.preventDefault();
}
/**/
function carga_template(){

	data_send = $("#form_busqueda").serialize();	
	url =  now + "index.php/api/templ/publicidad/format/json/";
	$.ajax({

		url:  url ,
		type : "GET", 		
		data: data_send ,
		beforeSend : function(){
			show_load_enid(".place_templates_programadas" , "Cagando ... " , 1); 	
		}
	}).done(function(data){
		llenaelementoHTML(".place_templates_programadas" ,  data );
		$(".img-publicidad").click(carga_form_img_template);
		$(".horario-template").click(carga_horarios);
	}).fail(function(){
		show_error_enid(".place_templates_programadas" , "Error al cargar");	
	});


}
/**/
function muestra_seccion(seccion , tipo ){


	switch(seccion){

		case "programar_plantillas":
			var  secciones =  [".r_plantilla"];
			for(var x in  secciones){

				d_seccion=  secciones[x]; 
				$(d_seccion).removeClass("active");
			}
			$('.b_tipo_publicidad > option[value="'+tipo+'"]').attr('selected', 'selected');

			carga_template();
			$(".p_plantilla").addClass("active");
			break;

		default:
			break;

	}

}
/**/
function carga_form_img_template(e){

	id_publicidad =  e.target.id;	
	

	url =  now +  "index.php/api/templ/form_img/format/json/";
	$.ajax({
		url : url , 
		type : "GET", 
		data: {"id_publicidad" :  id_publicidad}, 
		beforeSend: function(){
			show_load_enid(".place_form_img" ,  "Cargando formulario de registro ..." , 1  );			
		}
	}).done(function(data){
		
		$(".place_form_img").empty();
        llenaelementoHTML(".form_img" , data );
        $(".imagen_publicidad").change(upload_imgs_enid_contacto);

	}).fail(function(){
		show_error_enid(".place_form_img" , "Error en la carga, reporte al administrador. ");			
	});	

}
/**/
function upload_imgs_enid_contacto(){        
    var i = 0, len = this.files.length , img, reader, file;        
    file = this.files[i];
    reader = new FileReader();
    reader.onloadend = function(e){
        mostrar_img_upload(e.target.result , 'lista_imagenes_publicidad');            
        $("#guardar_img_publicidad").show();
        $("#form_img_enid_publicidad").submit(registra_img_publicidad);            
    };
    reader.readAsDataURL(file);
}
/**/
function registra_img_publicidad(e){
    
    /**/
    
    var formData = new FormData(document.getElementById("form_img_enid_publicidad"));    
    url =  now + "index.php/api/archivo/imgs";
    console.log(formData);

    $.ajax({
            url: url,
            type: "POST",
            dataType: "json",
            data: formData,
            cache: false,
            contentType: false,
            processData: false ,
            beforeSend : function(){
                show_load_enid(".place_form_img" , "Cargando imagen a la  plantilla ... " , 1 );       
            }
    }).done(function(data){

    	console.log(data);
        $('#img-template').modal('hide');                
        carga_template();
        show_response_ok_enid(".place_template_mail" , "Se ha cargado la imagen a la plantilla con éxito.!");    

    }).fail(function(){        
        show_error_enid(".place_form_img" , "Se presentaron errores al cargar la imagen del contacto, reporte al administrador");
    });
    $.removeData(formData);
    e.preventDefault();
}
/**/
function carga_horarios(e){	
	/**/
	id_publicidad =  e.target.id;	
	$(".hpublicidad").val(id_publicidad);
	url =  now + "index.php/api/templ/publicidad_horario/format/json/";
	$.ajax({
		url : url ,
		type : "GET" ,
		data : {"id_publicidad" : id_publicidad },
		beforeSend : function(){
			show_load_enid(".place_horarios" , "Cargando horarios disponibles ..." , 1); 		
		}
	}).done(function(data){		
		set_icons(0);
		
		llenaelementoHTML(".place_horarios" , "");		
		console.log(data);
		L  =  data[0].L;              
		M  =  data[0].M ;             
		MM =  data[0].MM;             
		J  =  data[0].J;              
		V  =  data[0].V;              
		S  =  data[0].S;              
		D  =  data[0].D;              

		hl    = data[0].hl;
		hm    = data[0].hm;
		hmm   = data[0].hmm;
		hj    = data[0].hj;
		hv    = data[0].hv;
		hs    = data[0].hs;
		hd    = data[0].hd;
		
			reset_checks_vals("AA" , 0 );
			reset_checks_vals("nL" , L );
			reset_checks_vals("nM" , M );
			reset_checks_vals("nMM" , MM );
			reset_checks_vals("nJ" , J );
			reset_checks_vals("nV" , V );
			reset_checks_vals("nS" , S );
			reset_checks_vals("nD" , D );			

			valorHTML("#hl" , hl );
			valorHTML("#hm" , hm );
			valorHTML("#hmm" , hmm);
			valorHTML("#hj" , hj );
			valorHTML("#hv" , hv );
			valorHTML("#hs" , hs );
			valorHTML("#hd" , hd );
			
			



			
			
			
			
			
			

		
		$(".form-horarios").submit(registra_horario_publicidad);
	}).fail(function(){
 		show_error_enid(".place_horarios" , "Error al cargar los horarios.");
	});	
	/**/
}
/**/
function set_icons(flag){
	var  icons =  ["nL" ,  "nM" ,  "nMM" , "nJ" ,  "nV",  "nS" ,  "nD"  ];	
	for(var x in icons ){
		campo =  icons[x];
		if (flag == 1 ) {
			document.getElementById(campo).checked = true;
		}else{
			document.getElementById(campo).checked = false;	
		}	
	}
}
/**/
function reset_checks_vals(campo , status ){
	if (status == 1) {
		document.getElementById(campo).checked = true;
	}else{
		document.getElementById(campo).checked = false;
	}
}
/**/
function registra_horario_publicidad(e){

	console.log($(".form-horarios").serialize());
	url =  $(".form-horarios").attr("action");
	$.ajax({	
		url : url , 
		type : "PUT" ,
		data : $(".form-horarios").serialize() ,
		beforeSend: function(){
			show_load_enid(".place_horarios_atencion" , "Registrando horarios ... " , 1);
		}
	}).done(function(data){
		
		show_response_ok_enid(".place_horarios_atencion" , "Éxito al registrar horarios de acción.");
		$("#horario-templ").modal("hide");
		console.log(data);
	}).fail(function(){
		show_error_enid(".place_horarios_atencion" , "Error al registrar reporte al desarrollador.");
	});
	e.preventDefault();
}
/**/
function cargar_empresas_disponibles(){

	tipo_publicidad  =  $(".tipo_publicidad").val(); 	
	url =  now + "index.php/api/enid/organizaciones_publicidad/format/json/"; 
	$.ajax({
		url :  url , 
		type : "GET", 
		data : {tipo :  tipo_publicidad }, 
		beforeSend: function(){

			show_load_enid(".place_organizaciones_resumen" , "Cargando" ,  1 );
		}
	}).done(function(data){

		llenaelementoHTML(".place_organizaciones_resumen", data);

	}).fail(function(){
		show_error_enid(".place_organizaciones_resumen" ,  "Error al cargar el resumen de  las organizaciones ");
	});
}
/**/
function carga_reporte(){
	
	url =  now + "index.php/api/enid/reporte_mail_marketing/format/json/";
	tipo =  $(".tipo_publicidad_r").val();

	$.ajax({
		url : url , 
		type : "GET" ,
		data: {"tipo" : tipo}, 
		beforeSend: function(){
			show_load_enid(".place_reporte_mail_marketing_general" , "Cargando ... " ,  1 );
		}
	}).done(function(data){

		$(".place_reporte_mail_marketing_general").empty();
		llenaelementoHTML(".reporte_mail_marketing_general", data);		
	}).fail(function(){
		show_error_enid(".place_organizaciones_resumen" ,  "Error al cargar el resumen de  las organizaciones ");		

	});

}