<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class Archivo extends REST_Controller{      
    function __construct(){
        parent::__construct();                       
        $this->load->model("img_model");
        $this->load->library('sessionclass');                    
    }
    /**/

    function imgs_POST(){
        $prm = $this->post(); 
        
        if($_FILES['imagen']['error'] === 4) {
            $this->response( 'Es necesario establecer una imagen' );        
        }else if($_FILES['imagen']['error'] === 0 ){

            
            $imagenBinaria = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
            $nombreArchivo = $_FILES['imagen']['name'];
            $extensiones = array('jpg', 'jpeg', 'gif', 'png', 'bmp' , "image/jpg", "image/jpeg", "image/gif", "image/png" );            
            $extension = strtolower(end(explode('.', $nombreArchivo)));
            if(!in_array($extension, $extensiones)) {
                $this->response( 'Sólo se permiten archivos con las siguientes extensiones: '.implode(', ', $extensiones) );
            }
            $prm["imagenBinaria"] = $imagenBinaria;
            $prm["nombreArchivo"] =  $nombreArchivo;
            $prm["extension"] =  $extension; 
            $img_response  = $this->gestiona_imagenes($prm);         
            $this->response($img_response);            
            
        }
        
        
       
    }
    /**/
    function gestiona_imagenes($prm ,  $img='' ){ 

        $this->validate_user_sesssion();            
        $id_usuario = $this->sessionclass->getidusuario();    
        $id_empresa =  $this->sessionclass->getidempresa();            
        switch ($prm["q"]) {
            
            case 'perfil_user':
                
                $db_response = $this->img_model->insert_img_user_perfil( $prm , $id_usuario , $id_empresa);                
                return $this->response_status_img($db_response);                    
                break;        

            case 'categoria':                    
                $db_response = $this->img_model->insert_img_categoria( $prm , $id_usuario , $id_empresa);                
                return $this->response_status_img($db_response);                    
                break;    

              default:
              return "-Sin q en imagen";
                break;
        }

        //return $q;
    }
    /**/
    function response_status_img($status){

        return $status; 
    }
    /*Validar session para modificar datos*/
    function validate_user_sesssion(){
        if($this->sessionclass->is_logged_in() == 1){}else{        
            $this->sessionclass->logout();
        }   
    }   
}?>