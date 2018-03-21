  <div>   
        <center>
            <label class='nueva_img_usuario' data-toggle="modal" data-target="#form_user_modal" >            
                +  Nueva imagen
            </label>
        </center>
        <div class='seccion_img'>
            <img width='100%;' id='imagen_usuario' src="'../../../img/index.php/enid/imagen_usuario/<?=$id_usuario?>">
        </div>
        <h1 class='nombres_user' title='Click para editar tu nombre'>                                                    
            <?=show_text_input($data_user["nombre"] , 3  , "Nombre " )?>
        </h1>
        <span class='place_nombre'>
        </span>
        <?=create_dinamic_input("Nombre", "nombre_user" ,  "nombre_user form-control input-sm" ,  "nombre_user"  ,  "nombre_user_e hidden_enid" ,  $data_user["nombre"] ,  "placeholder='Tu nombre ' "  ,  "text");?>                                        
        <h1 class='apellido_user_paterno' title='Click para editar tu apellido paterno'>                                           
            <?=show_text_input($data_user["apellido_paterno"], 3  , "Apellido paterno" )?>
        </h1>
        <span class='place_apellido_paterno'>
        </span>
          <?=create_dinamic_input("Primer apellido", "apellido_paterno" ,  "apellido_paterno form-control input-sm" ,  "apellido_paterno"  ,  "apellido_paterno_e hidden_enid" ,  $data_user["apellido_paterno"] ,"placeholder='Tu apellido paterno ' "  ,  "text" );?>                                                                                

        <h1 class='apellido_user_materno' title='Click para editar tu apellido materno'>                                           
            <?=show_text_input($data_user["apellido_materno"], 3  , "Apellido materno" )?>
        </h1>
        <span class='place_apellido_materno'>
        </span>
          <?=create_dinamic_input("Segundo apellido", "apellido_materno" ,  "apellido_materno form-control input-sm" ,  "apellido_materno"  ,  "apellido_materno_e hidden_enid" ,  $data_user["apellido_materno"] ,  "placeholder='Tu apellido materno ' "  ,  "text");?>                                                                                

        <ul class="p-info">
        <li>
            <div class="title">
              Sexo
            </div>
            <div class="desk sexo_user_text">
                                                  
                                                  
              <?=show_text_input($data_user["sexo"] , 3 , "Tu sexo" )?>
            </div>
            <div class='place_sexo'>
            </div>
            <div class='sexo_e hidden_enid' title='Click para editar tu sexo'>
              <?=create_select_sexo("sexo" , $data_user["sexo"] ,  "sexo" ,  "sexo form-control");?>
            </div>
        </li>
        <li>
            <div class="title">
                                                Edad
            </div>
            <div class="desk edad_user_text"  title='click para modificar tu edad '>
              <?=show_text_input($data_user["edad"] , 2 , "Tu edad" )?>
                                                  
            </div>                                             
            <span class='place_edad' id='place_edad'>
            </span> 
            <div class='edad_e  hidden_enid'>
              <?=create_select_edad_form("edad_user" ,  $data_user["edad"] );?>
            </div>
        </li>
        <li>
            <div class="title">Teléfono
            </div>
            <div class="desk tel_contacto_text">                                              
              <?=show_text_input($data_user["tel_contacto"] , 3 , "Número telefónico"  ,  "placeholder='55345...' maxlength='10' " )?>                                              
            </div>
            <span class='place_tel' >
            </span> 
            <div class='tel_e  hidden_enid'>
              <?=create_dinamic_input("Tel.", "tel_contacto" ,  "tel_contacto form-control input-sm" ,  "tel_contacto"  ,  "tel_contacto_e " ,  $data_user["tel_contacto"]  ,  "placeholder='Número telefónico' " ,  "number");?>                                                                                
            </div>
        </li>
        <li>
            <div class="title">
              Móvil
            </div>
            <div class="desk tel_contacto_text2">
              <?=show_text_input($data_user["tel_contacto_alterno"] , 3, "Número móvil"  ,  "placeholder='55345...' maxlength='10' " )?>                                              
            </div>
            <span class='place_tel2' >
            </span> 
            <div class='tel_e2  hidden_enid'>
              <?=create_dinamic_input( "Móvil", "tel_contacto2" ,  "tel_contacto2 form-control input-sm" ,  "tel_contacto2"  ,  "tel_contacto_e2" ,  $data_user["tel_contacto_alterno"] );?>                                                                                
            </div>
        </li>                                        
    </ul>                                                                                             
  </div>
