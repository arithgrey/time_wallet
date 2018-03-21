<?=$this->load->view("ingresos_egresos/secciones/menu_cuenta")?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<style type="text/css">
    body{
      font-family: Montserrat,"Helvetica Neue",Helvetica,Arial,sans-serif !important;
    }
    .navbar-default .navbar-nav>li>a:hover, .navbar-default .navbar-nav>li>a{      
    }


    .navbar-default:hover{
      cursor: pointer;
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
    .balance-btn:hover,
    .eliminar_registro:hover{
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
      background: #068ffb !important;
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
      height: 400px;
      overflow-x: hidden;
      
    }.selectec_class{
      background: #068ffb;
    }
    .icono_cuentas,  .nombre_cuenta_icono{
      display: inline-table;
    }
    .menu-l , .nombre_cuenta_icono{
      background: #068ffb !important;  
      padding: 3px;
      color: white !important;
    }

    @media only screen and (max-width: 991px) {
      .cuentas-menu{                
        overflow-y:auto;
        overflow-y:hidden;
        overflow-x:hidden;
      }
      .nombre_cuenta_sm{
      background: #068ffb !important;  
    }
    }    
</style>

<div class='col-lg-12'>  
  <?=n_row_12()?>           
  <div class=''>    
    <div class='btn-cuenta-hidden'>
      <div class='cuenta_btn nombre_cuenta_sm'>
      </div>
      <br>
    </div>

    <span href="#pill-1" role="tab" 
      title='Pulsa para calcular los ingresos de esta cuenta'      
      class='ingresos-btn selectec_class' 
      id='ingresos-btn'>    
      <i class="fa fa-plus" aria-hidden="true">
      </i> 
      Ingresos
    </span>
    <span     
    title='Pulsa para calcular los gastos de esta cuenta'     
    class='egresos-btn' id='egresos-btn'>    
      <i class="fa fa-minus" aria-hidden="true">
      </i>
      Gastos
    </span>              
    <span     
    title='Opten las métricas de esta cuenta '     
    class='balance-btn' id='balance-btn'>    
      <i class="fa fa-line-chart">
      </i>
      
    </span>              

    
  </div>

<?=end_row()?>    
  
    <center>
      <div class='place_registro_almacenado'>
      </div>
    </center>      
    <?=n_row_12()?>      
      <div class='place_ultimos_registros' id='place_ultimos_registros'>
      </div>      
    <?=end_row()?>            
  
</div>

<script type="text/javascript" src="<?=base_url('application/js/ingresos_egresos/main.js')?>">
</script>
<script type="text/javascript" src="<?=base_url('application/js/ingresos_egresos/metricas.js')?>">
</script>
<script type="text/javascript" src="<?=base_url('application/js/ingresos_egresos/imgs.js')?>">
</script>
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      //google.charts.setOnLoadCallback(drawChart);      
</script>
<div class='empresa' cuenta-empresa='<?=$id_empresa?>'>
</div>
<?=$this->load->view("ingresos_egresos/modal/ingresos_egresos_modal")?>


<style type="text/css">
.dropdown-menu-large > li > ul {
  padding: 0;
  margin: 0;
}
.menu-corto{
  display: none;
}
.btn-cuenta-hidden{
  display: none;
}
.menu-largo{
  width: 20%;
}
.img_categoria_place{
  width: 250px;
  
}

@media (max-width: 768px) {
  .dropdown-menu-large {
    margin-left: 0 ;
    margin-right: 0 ;
  }
  .dropdown-menu-large > li:last-child {
    margin-bottom: 0;
  }
  .dropdown-menu-large .dropdown-header {
    padding:2px 10px !important;
  }
  .menu-largo{
    display: none;
  }
  .menu-corto{
    display: block;

  }
  .btn-cuenta-hidden{
    display: block;
  }

}

</style>
