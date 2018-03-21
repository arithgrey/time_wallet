<div class="ver-public-lg-emp">              
  <?=muestra_seccion_ingresos_egresos_cabecera($perfiles)?>
</div>
  <div class="tab-content">
    <?php 
      $secciones =  muestra_seccion_ingresos_egresos($perfiles); 
      for ($a=0; $a < count($secciones); $a++){ 
          $this->load->view($secciones[$a]);
      }
    ?>
  </div>
<?=$this->load->view("empresa/modal/ingresos_egresos_modal")?>
<script type="text/javascript" src="<?=base_url('application/js/ingresos_egresos/main.js')?>">
</script>