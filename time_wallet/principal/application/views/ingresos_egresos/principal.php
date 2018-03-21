<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>


<style type="text/css">
    body{
      font-family: Montserrat,"Helvetica Neue",Helvetica,Arial,sans-serif !important;
    }
    
    .resumen_saldos{
      background: #2196f3;
      margin-left: 1px;
      font-size: .85em;
      padding: 2px;
      color: white;
      font-weight: bold;
    }
    .alerta_cuenta{
      background: #b5134a !important;
    }
    .text-total{
      font-size: .9em;
    }
    .seccion-icono{      
      background: #166781;
      padding: 5px;
      color: white;
      text-decoration: none;
      font-size: .9em;
      margin-left: 1px;
    }
    .btn_mn{

      background: #2196f3;
      padding: 3px;
      color: white;
    }
    .cuenta_en_activo_enid{
      background: #2196f3 !important;  
    }
    .nombre_cuenta_a_transferir{
        background: #0a67b1;
        font-weight: bold;
        color: white;
    }
    .mover_registro:hover, 
    .editar_registro:hover, 
    .egresos-btn:hover , 
    .ingresos-btn:hover, 
    .agregar-categoria:hover,
    .comparativa-btn:hover,
    .balance-btn:hover ,
    .nuevo_ingreso_btn:hover ,
    .tranfiere_ingreso_btn:hover, 
    .menu_cuenta_enid:hover ,
    .btn_mn:hover , 
    .balance-btn:hover{
      cursor: pointer;
    }   
    .las_cuentas{
      background: #166781;
      padding: 5px;
      color: white;
      text-decoration: none;
      font-size: .9em;
      margin-left: 1px;
    }       
    .menu_cuenta_enid{
      background: #022631;
      padding: 5px;
      color: white;
      text-decoration: none;
      font-size: .9em;
      margin-left: 1px;
    }
    .ingresos-btn,
    .egresos-btn,
    .balance-btn,
    .comparativa-btn,
    .cuenta_btn,
    .nuevo_ingreso_btn,
    .tranfiere_ingreso_btn , 
    .balance-btn {
      background: #022631;
      padding: 5px;
      color: white;
      text-decoration: none;
      font-size: .9em;
    }
    .tranfiere_ingreso_btn{
      margin-left: 1px;
    }
    .cuenta_btn{
      background: #00bffe !important;
      margin-left: 1px;     
    }
    .agregar-categoria{
      font-weight: bold;
      font-size: .9em;
      text-align: left;
    }    
    .contendor-cuenta-info{
      overflow-y:scroll; 
      overflow-x:hidden; 
      height: 400px;
    }    
    .contenedor_principal_secciones{
      height: 620px;
      overflow-x: auto;
    }.selectec_class{
      background: #00bffe;
    }
    @media only screen and (max-width: 991px) {
      .cuentas-menu{                
        overflow-y:auto;
      }
    }    
</style>

<div class='col-lg-12'>  
  <?=n_row_12()?>         
  
  <div class='place_menu_cuentas'>
  </div>  
  <div class=''>    
    <span href="#pill-1" role="tab" 
      title='Los ingresos de tu cuenta'      
      class='ingresos-btn selectec_class' 
      id='ingresos-btn'>    
      <i class="fa fa-plus" aria-hidden="true">
      </i> 
      Ingresos
    </span>
    <span     
    title='Registra nuevo gasto'     
    class='egresos-btn' id='egresos-btn'>    
      <i class="fa fa-minus" aria-hidden="true">
      </i>
      Gastos
    </span>              
    <span     
    title='Balance de tu cuenta'     
    class='balance-btn' id='balance-btn'>    
      <i class="fa fa-line-chart">
      </i>
      Balance
    </span>              

    
  </div>

<?=end_row()?>    
  <div class='contenedor_principal_secciones'>    
    <center>
      <div class='place_registro_almacenado'>
      </div>
    </center>      
    <?=n_row_12()?>      
      <div class='place_ultimos_registros' id='place_ultimos_registros'>
      </div>      
    <?=end_row()?>            
  </div>
</div>

<script type="text/javascript" src="<?=base_url('application/js/ingresos_egresos/main.js')?>">
</script>
<script type="text/javascript" src="<?=base_url('application/js/ingresos_egresos/metricas.js')?>">
</script>
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      //google.charts.setOnLoadCallback(drawChart);      
</script>
<div class='empresa' cuenta-empresa='<?=$id_empresa?>'>
</div>
<?=$this->load->view("ingresos_egresos/modal/ingresos_egresos_modal")?>


