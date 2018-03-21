<form accept-charset="utf-8" method="POST" id="form_img_categoria"  class="form_img_categoria" enctype="multipart/form-data" >      
  <input type="file" id='imagen_categoria' class='imagen_categoria' name="imagen"/>

  <input type='hidden' name='q' value='categoria'>     
  <input type='hidden' name='dinamic_user' value="1">
  <input class='id_categoria' id='id_categoria' name='id_categoria' type='hidden'>  
  <div class='separate-enid'>
  </div>     
  <div class='separate-enid'>
  </div>    
  <div class='lista_imagenes_portada' id='lista_imagenes_portada'>
  </div>      
</form>

<?=n_row_12()?>
  <div class='col-lg-4 col-lg-offset-4'>
    <div class='place_img_preview' id='place_img_preview'>
    </div>
  </div>
<?=end_row()?>

<center>
  <div class='place_img_registrada' id='place_img_registrada'>
  </div>
</center>
