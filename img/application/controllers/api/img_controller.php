<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class Img_controller extends REST_Controller{
  function __construct(){
        parent::__construct();
        
        $this->load->model("img_model");        
        $this->load->helper("img_eventsh");
        $this->load->library('sessionclass');          
  }     
  /**/
  function form_img_categoria_GET(){
    $this->validate_user_sesssion();                    
    $data["param"] =  $this->GET();
    $data["id_usuario"] = $this->sessionclass->getidusuario();   
    echo $this->load->view("imgs/categorias" ,  $data);       
  }
  /**/
  function form_img_user_GET(){
    
    $this->validate_user_sesssion();                    
    $data["param"] =  $this->GET();
    $data["id_usuario"] = $this->sessionclass->getidusuario();   
    echo $this->load->view("imgs/usuario" ,  $data);       
  }  
  /**/
  function imagen_galeria_empresa_DELETE(){

      $param = $this->delete();
      $db_response =  $this->img_model->delete_img_galeria($param);
      $this->response($db_response);

  }
  /**/
  function validate_user_sesssion(){
      if( $this->sessionclass->is_logged_in() == 1) {      


          }else{
          /*Terminamos la session*/
          $this->sessionclass->logout();
        }   
    }/*termina validar session */
   /**/   
}