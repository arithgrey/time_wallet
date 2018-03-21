$(document).ready(function(){

	$("#eventos-m").click(recore_pagina_eventos);
	$("#opinion-m").click(recore_pagina_opinion);
	$("#recopilacion-preferencias-musicales-m").click(recore_pagina_recopilacion_preferencias_musicales);
	$("#inteligecia-de-negocio-m").click(recore_inteligecia_de_negocio);
});
/**/
function recore_pagina_eventos(){
	recorrepage("#eventos");
}
/**/
function recore_pagina_opinion(){
	recorrepage("#opinion");	
}
/**/
function recore_pagina_recopilacion_preferencias_musicales(){
	recorrepage("#recopilacion-preferencias-musicales");	
}
/**/
function recore_inteligecia_de_negocio(){
	recorrepage("#inteligecia-de-negocio");	
}