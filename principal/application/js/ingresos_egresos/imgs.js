function carga_form_categoria(){
    set_flag_img(0);        
    set_formData(null);

    url =  "../img/index.php/api/img_controller/form_img_categoria/format/json/";  
        $.ajax({
        url :  url , 
        type : "GET" , 
        data: {}, 
        beforeSend: function(){
            show_load_enid(".place_form_img" , "... " , 1);         
        }
    }).done(function(data){                 

        llenaelementoHTML(".place_form_img" , data);
        $(".imagen_categoria").change(upload_imgs_enid_pre);        


    }).fail(function(){
        show_error_enid(".place_form_img" , "Error al transferir " );               
    });
}
/**/
function upload_imgs_enid_pre(){    
    show_load_enid(".place_img_registrada", "Cargando ... " , 2);                 
    var i = 0, len = this.files.length , img, reader, file;        
    file = this.files[i];
    reader = new FileReader();
    reader.onloadend = function(e){
        
        $(".imagen_categoria").hide();
        mostrar_img_upload(e.target.result , 'place_img_preview');                    
        var formData = new FormData(document.getElementById("form_img_categoria"));    
        set_formData(formData);
        set_flag_img(1);        
        $(".place_img_registrada").empty();
    };
    reader.readAsDataURL(file);
}
/**/
function registra_img_categoria(id_categoria){

    //console.log(id_categoria);
    formData.append("id_categoria", id_categoria);
    url = "../img/index.php/api/archivo/imgs";
    
    $.ajax({
            url: url,
            type: "POST",
            dataType: "json",
            data:  get_formData() ,
            cache: false,
            contentType: false,
            processData: false , 
            beforeSend : function(){
               
               
            }
    }).done(function(data){

        console.log(data);
        
    }).fail(function(){
        show_error_enid(".place_img_registrada" , "Falla al actualizar al cargar la imagen" );   
    });    
}        
/**/     
