<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Enid extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model("img_model");
        $this->load->model("enidmodel");
    }
    /**/
    function imagen_usuario($id_usuario){

        $db_response =  $this->img_model->get_img_usuario($id_usuario);                        
        foreach ($db_response as $row ){ 
            echo $row["img"];
        }  

    }
    /**/    
    function img($id_imagen){

        $imagen = $this->enidmodel->get_imagen($id_imagen);
        foreach ($imagen as $row ){ 
            echo $row["img"];
        }        
    }
    /**/    
}/*Termina el controlador */