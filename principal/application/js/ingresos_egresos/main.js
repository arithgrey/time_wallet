var ingreso = 0; 
var tipo = 1;
var cuenta =0; 
var categoria = 0; 
var nombre_cuenta = "";
var descripcion_cuenta = "";
var flag_modal_desde_transferencia = 0;
var categoria_catalogo = "";
var ingreso_delete = 0;
var formData = "";
var flag_img =0;

/**/

$(document).ready(function(){

	$("footer").ready(carga_cuentas_user);
	$("#egresos-btn").click(cambia_form_egresos);
	$("#ingresos-btn").click(cambia_form_ingresos);
	$("#balance-btn").click(cambia_seccion_balance_general);
	$("#comparativa-btn").click(cambia_seccion_comparativa_general);
	$("footer").ready(carga_categorias_empresa);	
	$("#form-ingresos").submit(registra_ingreso_egreso);	

	$("#form-categoria").submit(registra_categoria);
	$(".btn_cuenta").click(carga_info_cuenta);
	$("#form-mover").submit(mover_registro_db);
	$("#form-cuenta").submit(registra_cuenta);
	$("#form-editar").submit(editar_registro_db);
	$("#form-categoria-editar").submit(actualiza_categoria);	
	$("#productos_promociones_s").click(carga_productos_promociones_empresa);
	$("#form_promocion").submit(registra_promocion);
	$(".agregar-categoria").click(ocultal_form_registro);
	$("#form-transferencia").submit(transferir_a_cuenta);
	$(".nuevo_ingreso_btn").click(oculta_menu);
	$(".tranfiere_ingreso_btn").click(carga_disponibles_a_transferir);
	$(".balance-btn").click(carga_metricas);
	/**/
	$("#conf-eliminar").click(eliminar_registro);
	$(".agregar-categoria").click(carga_form_categoria);
	$(".form_info_cuenta").submit(actualiza_info_cuenta);
});
/**/
function set_flag_img(new_val){
	flag_img =  new_val;
}
/**/
function get_flag_img(){
	return flag_img;
}
/**/
function get_formData(){
	return formData;
}
/**/
function set_formData(n){
	formData =  n;
}


/**/
function get_ingreso_delete(){
	return ingreso_delete;
}
/**/
function set_ingreso_delete(new_ingreso_delete){
	ingreso_delete =  new_ingreso_delete;
}
/**/
function set_categoria_catalogo(new_categoria_catalogo){
	categoria_catalogo =  new_categoria_catalogo;
}
/**/
function get_categoria_catalogo(){
	return categoria_catalogo;
}
/**/
function set_flag_modal_desde_transferencia(new_val){
	flag_modal_desde_transferencia =  new_val;
}
/**/
function get_flag_modal_desde_transferencia(){
	return flag_modal_desde_transferencia;
}
/**/
function get_tipo(){
	return tipo;	
}
/**/
function set_tipo(new_tipo){
	tipo =  new_tipo;
}
/**/
function get_nombre_cuenta(){
	return nombre_cuenta;
}
/**/
function set_nombre_cuenta(new_nombre_cuenta){
	nombre_cuenta =  new_nombre_cuenta;
	llenaelementoHTML(".cuenta_btn" , new_nombre_cuenta);
	valorHTML("#nombre_cuenta_e" , new_nombre_cuenta);
	

}
/**/
function set_cuenta(new_cuenta){
	cuenta = new_cuenta;
}
/**/
function get_cuenta(){
	return cuenta;
}
/**/
function set_ingreso(new_ingreso){
	ingreso =  new_ingreso;	
}
/**/
function get_ingreso(){
	return  ingreso;
}
/**/
function set_categoria(new_categoria){
	categoria =  new_categoria;
}
/**/
function get_categoria(){
	return categoria;
}
/**/
function cambia_form_egresos(){	

	set_tipo(0);
	var menus = [".ingresos-btn", ".egresos-btn", ".balance-btn", ".comparativa-btn"];
	for (var x in menus) {
		$(menus[x]).removeClass("selectec_class");
	}
	$("#egresos-btn").addClass("selectec_class");
	carga_ultimos_registros();
}
/**/
function cambia_form_ingresos(){
	
	set_tipo(1);
	var menus = [".ingresos-btn", ".egresos-btn", ".balance-btn", ".comparativa-btn"];
	for (var x in menus) {
		$(menus[x]).removeClass("selectec_class");
	}
	$("#ingresos-btn").addClass("selectec_class");
	carga_ultimos_registros();
}
/**/
function cambia_seccion_balance_general(){
	var menus = [".ingresos-btn", ".egresos-btn", ".balance-btn", ".comparativa-btn"];
	for (var x in menus) {
		$(menus[x]).removeClass("selectec_class");
	}
	$("#balance-btn").addClass("selectec_class");

}
/**/
function cambia_seccion_comparativa_general(){

	var menus = [".ingresos-btn", ".egresos-btn", ".balance-btn", ".comparativa-btn"];
	for (var x in menus) {
		$(menus[x]).removeClass("selectec_class");
	}
	$("#comparativa-btn").addClass("selectec_class");	
}

/**/
function carga_categorias_empresa(){

	url = now + "index.php/api/emp/categorias/format/json/"; 
	$.ajax({
		url : url , 
		data :  {}, 
		type :  "GET", 
		beforeSend: function(){
			show_load_enid(".place_tipo_artista" , "Cargando ... " , 1); 	
		}
	}).done(function(data){

		$(".place_tipo_artista").empty();
		llenaelementoHTML(".categorias" , data);		
		$(".categoria_ingreso").change(carga_precio_categoria);
		$('.categoria_ingreso > option[value="'+get_categoria_catalogo() +'"]').attr('selected', 'selected');				
		if (get_categoria_catalogo() !=  "") {
			carga_precio_categoria();
		}			
		
		/**/		

	}).fail(function(){
		show_error_enid(".place_tipo_artista", "Error al cargar las categorías del sistema, reporte al administrador" );
	});

}
/**/

function registra_categoria(e){

	url  = $("#form-categoria").attr("action");	
	nombre_categoria =  $("#categoria-i").val();
	set_categoria_catalogo(nombre_categoria);		
	flag = valida_text_form("#categoria-i" , ".place_nombre_categoria" , 2  , "Nombre asignado a la categoría" );
	

	if(flag ==  1 ){
		$.ajax({			
			url :  url , 
			type : "POST", 
			data : $("#form-categoria").serialize() ,
			beforeSend: function(){			
				show_load_enid(".place_categorias_registro" , "Cargando ... " , 1); 	
			}
		}).done(function(data){
			
			$(".place_categorias_registro").empty();
			$("#agregar-categoria-modal").modal("hide");			
			$("#registra-ingreso-modal").modal("show");
			carga_categorias_empresa();					
			carga_precio_categoria_valor(nombre_categoria);				
			document.getElementById("form-categoria").reset();			
			show_response_ok_enid( ".place_registro_nueva_categoria", "Categoría actualizada con éxito!"); 

			if (get_flag_img() ==  1 ) {

				registra_img_categoria(data);
			}

		}).fail(function(){		
			show_error_enid(".place_categorias_registro", "Error al registrar categoria" );
		});
		carga_productos_promociones_empresa();
	}	
	e.preventDefault();
}
/**/
function registra_ingreso_egreso(e){

	url =  $("#form-ingresos").attr("action");
	flag = valida_num_form("#valor" , ".place_valor"); 	
	data_send = $("#form-ingresos").serialize() + "&"+ $.param({"cuenta": get_cuenta() ,  tipo: get_tipo() });
	console.log(data_send);
	if (flag == 1 ){	
		valor = $("#valor").val();
		if ($.trim(valor.length) > 0 ){
			$(".place_valor").empty();
			$.ajax({
				url :  url ,
				type :  "POST",
				data : data_send,
				beforeSend:function(){
					show_load_enid(".place_registro_almacenado" , "Cargando ... " , 1); 	
				}
			}).done(function(data){				

				show_response_ok_enid( ".place_modal_registro", "Registrado!"); 										
				document.getElementById("form-ingresos").reset();			
				$("#registra-ingreso-modal").modal("hide");
				carga_ultimos_registros();
				show_response_ok_enid( ".place_registro_almacenado", "Registrado!"); 						

			}).fail(function(){
				show_error_enid(".place_registro_almacenado", "Error al cargar registro" );
			});
		}else{
			llenaelementoHTML(".place_valor" ,  "Ingrese valor");
		}
		
	}
	e.preventDefault();
}
/**/
function carga_ultimos_registros(){
	
	url =  now  + "index.php/api/registro/list/format/json/";
	data_send =   {"cuenta" : get_cuenta() , "tipo" : get_tipo() , "periodo" : 0 };	
	
	//console.log(data_send);
	$.ajax({
		url :  url , 
		type: "GET",
		data: data_send,		
		beforeSend :function(){
			show_load_enid(".place_ultimos_registros" , "Cargando ... " , 1); 	
		}
	}).done(function(data){	

		
		llenaelementoHTML(".place_ultimos_registros" ,  data);
		$(".mover_registro").click(mover_registro);
		$(".editar_registro").click(editar_registro);
		$(".eliminar_registro").click(intenta_eliminar_registro);
		/**/
		carga_simple_balance();

	}).fail(function(){		
		show_error_enid(".place_ultimos_registros", "Error al cargar últimos registros" );
	});
}
/**/

function carga_info_cuenta(e ){

	$("#cuenta").val(e.target.id);
	$(".btn_cuenta").removeClass("activa_cuenta");
	$(this).addClass("activa_cuenta");
	carga_ultimos_registros();

}
/**/
function mover_registro(e){		
	set_ingreso(e.target.id);		
}
/**/
function mover_registro_db(e){

	url =  $("#form-mover").attr("action");
	data_send = $("#form-mover").serialize() + "&" +$.param({"registro" :  get_ingreso() });	
	$.ajax({
		url: url , 
		type: "PUT",
		data: data_send ,
		beforeSend: function(){
			show_load_enid(".place_mover_registro" , "Cargando ... " , 1); 	
		}
	}).done(function(data){		
		show_response_ok_enid(".place_mover_registro",  "Se efectuó el cambio cón éxito!");
		$("#mover-registro-modal").modal("hide");
		carga_ultimos_registros();
	}).fail(function(){
		show_error_enid(".place_mover_registro", "Error al cargar últimos registros" );		
	});
	
	e.preventDefault();
}
/**/
function registra_cuenta(e){

	url =  $("#form-cuenta").attr("action");
	flag =  valida_text_form("#nombre_cuenta" , ".place_registro_cuenta"  , 3 , "Nombre para la cuenta" );
	if (flag ==  1){
		$.ajax({	
			url : url ,
			type : "POST",			
			data : $("#form-cuenta").serialize(),
			beforeSend: function(){
				show_load_enid(".place_registro_cuenta" , "Registrando ... " , 1); 	
			}
		}).done(function(data){

			show_response_ok_enid(".place_registro_cuenta" , "Cuenta registrada!");								
			$("#nueva-cuenta-modal").modal("hide");
			carga_cuentas_user();


			if ( get_flag_modal_desde_transferencia() == 1){
				/**/
				$("#tranferencias-modal").modal("show");			
				carga_disponibles_a_transferir();
			}	

			document.getElementById("form-cuenta").reset();



		}).fail(function(){
			show_error_enid(".place_registro_cuenta", "Error al registrar la cuenta" );		
		});	
	}	
	e.preventDefault();
}
/**/
function editar_registro(e){
	document.getElementById("form-editar").reset();
	set_ingreso(e.target.id);			
	url =  $("#form-editar").attr("action");
	$.ajax({
		url :  url ,
		type : "GET" ,
		data : { "registro" : get_ingreso() } , 
		beforeSend: function(){
			show_load_enid(".place_editar_registro" , "Cargando ... " , 1); 	
		}
	}).done(function(data){
		
		$(".place_editar_registro").empty();
		valor  =  data[0].valor;		
		$("#valor-e").val(valor);
		$('#categoria_ingreso > option[value="'+data[0].nombre +'"]').attr('selected', 'selected');				
		$('.cantidad > option[value="'+data[0].cantidad +'"]').attr('selected', 'selected');				
		$(".e-descripcion").val(data[0].descripcion);
		
	}).fail(function(){
		show_error_enid(".place_editar_registro", "Error al cargar los datos del registro." );		
	});

}
/**/
function editar_registro_db(e){


	url =  $("#form-editar").attr("action");
	data_send =   $("#form-editar").serialize() + "&" + $.param({  "registro" : get_ingreso() });	
	console.log(data_send);
	$.ajax({
		url :  url ,
		type : "PUT" ,	
		data : data_send   , 
		beforeSend: function(){
			show_load_enid(".place_editar_registro" , "Cargando ... " , 1); 	
		}
	}).done(function(data){
		
		$(".place_editar_registro").empty();
		show_response_ok_enid(".place_editar_registro", "Información actualizada!");
		$("#editar-registro-modal").modal("hide");
		carga_ultimos_registros();

	}).fail(function(){
		show_error_enid(".place_editar_registro", "Error al cargar los datos del registro." );		
	});


	e.preventDefault();
}
/**/
function carga_promociones_empresa(){

	url =  $("#form_promocion").attr("action"); 	
	$.ajax({
		url :  url , 		
		type:  "GET" , 
		data: {} , 
		beforeSend: function(){
			show_load_enid(".place_catalogo_promociones" , "Cargando ... " , 1); 	
		}
	}).done(function(data){

		llenaelementoHTML(".place_catalogo_promociones" , data);
		//alert(data);	


	}).fail(function(){
		show_error_enid(".place_catalogo_promociones", "Error al cargar los datos del registro." );		
	});



}
/**/
function carga_productos_promociones_empresa(){


	url =  now + "index.php/api/emp/catalogo_productos/format/json/";
	$.ajax({
		url : url , 		
		type : "GET", 
		data : {}, 
		beforeSend : function(){
			show_load_enid(".place_catalogo_productos_servicios" , "Cargando ... " , 1); 	
		}
	}).done(function(data){
		llenaelementoHTML(".place_catalogo_productos_servicios" , data);
		$(".editar_catalogo_categoria").click(cargar_info_categoria);
		

	}).fail(function(){
		show_error_enid(".place_catalogo_productos_servicios", "Error al cargar los datos del registro." );		
	});



	carga_promociones_empresa();
}
/**/
function cargar_info_categoria(e){

	document.getElementById("form-categoria-editar").reset();
	set_categoria(e.target.id);
	categoria = get_categoria();
	url =  now + "index.php/api/emp/categoria/format/json/"; 
	$.ajax({
		url :  url , 
		type :  "GET" , 
		data : {categoria :  categoria } , 
	 	beforeSend : function(){
	 		show_load_enid(".place_info_complete_categoria" , "Cargando ... " , 1); 		
	 	} 
	}).done(function(data){

		$(".place_info_complete_categoria").empty();
		nombre            =  data[0].nombre;           
		descripcion       =  data[0].descripcion;      				
		precio            =  data[0].precio;           
		costo             =  data[0].costo;            
		precio_variable   =  data[0].precio_variable;
		valorHTML("#categoria-e" , nombre); 
		valorHTML("#descripcion-e" , descripcion); 
		valorHTML("#precio-e" , precio); 
		valorHTML("#costo-e" , costo); 
		$('#precio_variable > option[value="'+ precio_variable +'"]').attr('selected', 'selected');				



	}).fail(function(){
		show_error_enid(".place_info_complete_categoria" , "Cargando ... " ); 		
	});

}
/**/
function actualiza_categoria(e){

	data_send =  $("#form-categoria-editar").serialize()  +  "&" +  $.param({"id_categoria" :  get_categoria()});
	url = $("#form-categoria-editar").attr("action");
	$.ajax({
		url : url , 
		type : "PUT" , 
		data : data_send , 
		beforeSend : function(){
			show_load_enid(".place_info_complete_categoria" , "Cargando ... " , 1); 		
		}
	}).done(function(data){
		/**/
		$("#editar-catalogo-registro").modal("hide");
		show_response_ok_enid(".info_update_precios_promociones" , "Información actualizada!");
		carga_productos_promociones_empresa();
	}).fail(function(){
		show_error_enid(".place_info_complete_categoria" , "Error al registrar los cambios a la categoria. " ); 				
	});
	e.preventDefault();
}
/**/
function registra_promocion(e){	
	/**/	
	url =  $("#form_promocion").attr("action");
	flag  =  valida_text_form(".nombre_promocion" , ".place_nombre_promocion" , 3 , "Nombre para la promoción " ); 	
	if (flag ==  1 ) {
		$.ajax({
			url :  url , 
			type : "POST" , 
			data: $("#form_promocion").serialize() , 
			beforeSend: function(){
				show_load_enid(".place_promocion_registro" , "Cargando ... " , 1); 		
			}
		}).done(function(data){		
			
			show_response_ok_enid(".place_promocion_registro" , "Promoción registrada.");
			$("#registrar-promocion").modal("hide");
			document.getElementById("form_promocion").reset();
			show_response_ok_enid(".place_promociones_info" , "Promoción registrada.");
			carga_promociones_empresa();

		}).fail(function(){
			show_error_enid(".place_promocion_registro" , "Error al registrar la promoción" ); 				
		});
	}
	e.preventDefault();
}
/**/
function carga_cuentas_user(){

	url =  now + "index.php/api/cuentas/q_cuentas/format/json/"; 
	$.ajax({
		url :  url , 
		data: {}, 
		beforeSend:function(){
			show_load_enid(".place_menu_cuentas" , "Cargando ... " , 1); 					
		}
	}).done(function(data){		

	
		
		cuenta_inicial=  data.cuentas[0].id_cuenta;
		nombre_cuenta =  data.cuentas[0].nombre_cuenta;		
		set_cuenta(cuenta_inicial);
		set_nombre_cuenta(nombre_cuenta);		
		llenaelementoHTML(".place_menu_cuentas", data.cuentas_HTML);		
		cuentas =  data.cuentas;


		html_cuentas = "<select class='cuenta_select form-control input-sm' name='cuenta' id='cuenta_select'> "; 
		for(var x in  cuentas ){

			id_cuenta =  cuentas[x].id_cuenta;
			name_cuenta = cuentas[x].nombre_cuenta;
			html_cuentas +="<option value='"+id_cuenta+"'>"+name_cuenta+"</option>";	
		}
		html_cuentas +="</select>";
		llenaelementoHTML(".select_cambio_cuentas" , html_cuentas  );

		$(".menu_cuenta_enid").click(modifica_cuenta);
		
		set_menu_cuenta_color();
		carga_ultimos_registros();
		
		$(".configurar_cuenta").click(set_info_cuenta);
	}).fail(function(){
		show_error_enid(".place_menu_cuentas" , "Error al registrar la promoción" ); 				
	});
}
/**/
function set_menu_cuenta_color(){
	

	$(".menu_cuenta_enid").each(function(){
		 	if ($(this).attr("nombre_cuenta") ==  get_nombre_cuenta()){
		 		$(this).addClass("cuenta_en_activo_enid");		 		
		 	}else{
		 		$(this).removeClass("cuenta_en_activo_enid");
		 	}
	});

}
/**/
function ocultal_form_registro(){
	$("#registra-ingreso-modal").modal("hide");
	$("#agregar-categoria-modal").modal("show");
}
/**/
function carga_precio_categoria(){	
	
	
		categoria =  $(this).val();	
		url = now + "index.php/api/emp/categoria_default/format/json/";
		$.ajax({		
			url : url , 
			data:{categoria : categoria },
			beforeSend:function(){			
				show_load_enid(".place_valor" , "Cargando ... ", 1 );
			}
		}).done(function(data){		
			precio = data[0].precio;		
			costo = data[0].costo;		

			
			id_categoria = data[0].id_catalogo_productos_servicios;
			img =  "../img/index.php/enid/imagen_categoria/"+id_categoria;
			new_img =  "<img src='"+img+"' style='width:100%'> ";
			llenaelementoHTML( ".img_categoria_place",  new_img);

			if (get_tipo() ==  1 ) {
				//$("#valor").val(precio);
			}else{
				$("#valor").val(costo);
			}

			

			$(".place_valor").empty();
		}).fail(function(){
			show_error_enid(".place_valor" , "Error al cargar Información de la categoria" ); 				
		});
	

}
/**/
function carga_precio_categoria_valor(nombre){	
	

	url = now + "index.php/api/emp/categoria_default/format/json/";
	$.ajax({		
		url : url , 
		data:{"categoria" : nombre },
		beforeSend:function(){			
			show_load_enid(".place_valor" , "Cargando ... ", 1 );
		}
	}).done(function(data){		

		precio = data[0].precio;		
		costo = data[0].costo;		
		


			id_categoria = data[0].id_catalogo_productos_servicios;
			img =  "../img/index.php/enid/imagen_categoria/"+id_categoria;
			new_img =  "<img src='"+img+"' style='width:100%'> ";
			llenaelementoHTML( ".img_categoria_place",  new_img);


		if (get_tipo() ==  1 ) {
			$("#valor").val(precio);
		}else{
			$("#valor").val(costo);
		}

		

		$(".place_valor").empty();
	}).fail(function(){
		show_error_enid(".place_valor" , "Error al cargar Información de la categoria" ); 				
	});
}


/**/
function modifica_cuenta(e){
	cuenta =  e.target.id;		
	set_cuenta(cuenta);
	set_nombre_cuenta($(this).attr("nombre_cuenta"));		
	set_menu_cuenta_color();
	carga_ultimos_registros();
}
/**/
function carga_disponibles_a_transferir(){	
	oculta_menu();
	document.getElementById("form-transferencia").reset();
	llenaelementoHTML(".place_de_la_cuenta" , "<div class='nombre_cuenta_a_transferir'> De: " +  get_nombre_cuenta() + "</div>");
	url =  now + "index.php/api/cuentas/disponibles_a_transferir/format/json/"; 
	$.ajax({		
		url : url , 
		data:{cuenta :  get_cuenta()},
		beforeSend:function(){			
			show_load_enid(".place_cuentas_para_transferencia" , "Cargando ... ", 1 );
		}
	}).done(function(data){		

		if (data.num_cuentas > 0 ){
			llenaelementoHTML(".place_cuentas_para_transferencia" , data.cuentas_HTML);
		}else{
			set_flag_modal_desde_transferencia(1);
			$("#tranferencias-modal").modal("hide");			
			$("#nueva-cuenta-modal").modal("show");			
		}		

	}).fail(function(){
		show_error_enid(".place_cuentas_para_transferencia" , "Error al cargar posibles cuentas" ); 				
	});

}
/**/
function transferir_a_cuenta(e){
	/**/
	data_send =  $("#form-transferencia").serialize()+"&"+ $.param({"nombre_cuenta_transfiere": get_nombre_cuenta()   ,  "cuenta_tranfiere" :  get_cuenta() });	
	url =  $("#form-transferencia").attr("action");	
	flag_monto =  valida_precio("#monto" ,  0 , ".place_monto" , "Ingrese monto a transferir" );
	if (flag_monto ==  1 ) {
		//console.log(data_send);	
		$.ajax({
			url :  url , 
			type : "POST" , 
			data: data_send , 
			beforeSend: function(){
				show_load_enid(".place_modal_transferencia" , "Cargando ... " , 1); 		
			}
		}).done(function(data){					
			//console.log(data);
			show_response_ok_enid(".place_modal_transferencia" , "Transferencia realizada!");
			$("#tranferencias-modal").modal("hide");			
		}).fail(function(){
			show_error_enid(".place_modal_transferencia" , "Error al transferir " ); 				
		});
	}
	e.preventDefault();
}
function oculta_menu(){
	$("#menu-ingresos-modal").modal("hide");	
}
/**/
function carga_simple_balance(){

	data_send =  {"cuenta" : get_cuenta() };
	url =  now + "index.php/api/registro/simple_balance/format/json/";
	$.ajax({
		url :  url , 
		type : "GET" , 
		data: data_send , 
		beforeSend: function(){
			show_load_enid(".place_simple_balance" , "... " , 1); 		
		}
	}).done(function(data){					
		//console.log(data);
		llenaelementoHTML(".place_simple_balance" , data);
	}).fail(function(){
		show_error_enid(".place_simple_balance" , "Error al transferir " ); 				
	});

}
/**/
function intenta_eliminar_registro(e){	
	set_ingreso_delete(e.target.id);
}
/**/
function eliminar_registro(){	
	
	data_send =  {"registro" : get_ingreso_delete() };
	url =  now + "index.php/api/registro/ingreso/format/json/";
	$.ajax({
		url :  url , 
		type : "DELETE" , 
		data: data_send , 
		beforeSend: function(){
			show_load_enid(".place_eliminar_registro" , "... " , 1); 		
		}
	}).done(function(data){					

		//console.log(data);
		$(".place_eliminar_registro").empty();
		show_response_ok_enid(".place_registro_almacenado" , "Registro eliminado con éxito.");
		carga_ultimos_registros();
	}).fail(function(){
		show_error_enid(".place_eliminar_registro" , "Error al transferir " ); 				
	});

	set_ingreso_delete(0);

}
/**/
function set_info_cuenta(e){

	id_cuenta =  e.target.id; 
	info_descripcion  =  $(this).attr("info_descripcion");
	info_nombre_cuente  =  $(this).attr("info_nombre_cuente");
	
	set_cuenta(id_cuenta);
	set_nombre_cuenta(info_nombre_cuente);	
	set_descripcion_cuenta(info_descripcion);	
}
/**/
function set_descripcion_cuenta(n_descripcion){
	descripcion_cuenta = n_descripcion;
	valorHTML("#descripcion_cuenta_e", n_descripcion );
}
/**/
function get_descripcion_cuenta(){

	return descripcion_cuenta;
}
/**/
function actualiza_info_cuenta(e){

	data_send =  $(".form_info_cuenta").serialize() +"&" + $.param({"cuenta" : get_cuenta()});
	console.log(data_send);
	url =  now + "index.php/api/cuentas/cuenta/format/json/";
	$.ajax({
		url :  url , 
		type : "PUT" , 
		data: data_send , 
		beforeSend: function(){
			show_load_enid(".places_update_cuenta" , "... " , 1); 		
		}
	}).done(function(data){					

		show_response_ok_enid(".places_update_cuenta" , "Información actualizada.!");
		$("#modal_config_cuenta").modal("hide");
		carga_cuentas_user();
	}).fail(function(){
		show_error_enid(".places_update_cuenta" , "Error al actualizar Información de la cuenta." ); 				
	});		

	e.preventDefault();

}	