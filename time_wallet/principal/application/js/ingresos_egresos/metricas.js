function carga_metricas(){
	
	data_send =  {"cuenta" : get_cuenta() };
	url =  now + "index.php/api/metricas/balance_general/format/json/";
	$.ajax({
		url :  url , 
		type : "GET" , 
		data: data_send , 
		beforeSend: function(){
			show_load_enid(".place_ultimos_registros" , "... " , 1); 		
		}
	}).done(function(data){					
		
		llenaelementoHTML(".place_ultimos_registros" ,  data);
		drawChart(data);
	}).fail(function(){
		show_error_enid(".place_ultimos_registros" , "Error al cargar balalce general " ); 				
	});

}
/**/
function drawChart(data_ingresos){      	
	var data = google.visualization.arrayToDataTable([
        ['Fecha', 'Registro'],
        ['2016',  0]
                    
	]);
    /**/

    total_enid  = 0; 
     for (var x in data_ingresos) {
        	
        	ingresos =  data_ingresos[x].ingresos;
        	gastos =  data_ingresos[x].gastos;        	
        	fecha =  data_ingresos[x].dia;

        	saldo  =  ingresos - gastos;

        	
        	total_enid =  total_enid +  saldo;
        	
			data.addRow([fecha , total_enid  ]);	

	}

    /*

        for (var x in data_ingresos) {
        	//console.log(data_ingresos[x]);	
        	ingresos =  data_ingresos[x].ingresos;
        	gastos =  data_ingresos[x].gastos;        	
        	fecha =  data_ingresos[x].dia;

        	saldo  =  ingresos - gastos;
			data.addRow([fecha , saldo ]);	

        }
    */

        var options = {
          title: 'Comparativa ingresos, gastos',
          hAxis: {title: 'Fecha',  titleTextStyle: {color: '#333'}},
          vAxis: {minValue: 0}
        };

        var chart = new google.visualization.AreaChart(document.getElementById('place_ultimos_registros'));
        chart.draw(data, options);
}