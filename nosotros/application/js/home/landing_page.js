$(document).ready(function(){
	$(".form-busqueda").submit(busqueda_evento);
	$("footer").ready(function(){
		$(".btn_inicio_session_enid").show();
	});
});
/**/
function busqueda_evento(e){
	
	qparam =  $(".qparam").val();	
	qparam  = $.trim(qparam);
	url =  ""; 
	url =  now +  "index.php/eventos/busqueda/";	
	if (qparam.length > 0 ) {
		url =  now +  "index.php/eventos/busqueda/"+qparam;	
	}
	redirect(url); 	
	e.preventDefault();
}
