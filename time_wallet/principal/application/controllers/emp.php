<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Emp  extends CI_Controller{
    function __construct(){
        
        parent::__construct();
        $this->load->helper("empresa");                            
        $this->load->model("empresamodel");
        $this->load->library('principal');    
        $this->load->library('sessionclass');    
    }        
    
    /**/
    function ingresos_egresos(){
        
        $data = $this->val_session("Ingresos y Gastos");                                 
        $this->principal->show_data_page( $data  , 'ingresos_egresos/principal');        
        $this->principal->crea_historico(31 , 0 , $data["id_usuario"] , $data["id_empresa"]);

    }       
    /**/
    function val_session($titulo_dinamico_page ){        
        if ( $this->sessionclass->is_logged_in() == 1) {                                                            
                $menu = $this->sessionclass->generadinamymenu();
                $nombre = $this->sessionclass->getnombre();                                         
                $data['titulo']= $titulo_dinamico_page;              
                $data["menu"] = $menu;              
                $data["nombre"]= $nombre;                                               
                $data["email"]= $this->sessionclass->getemailuser();                                               
                $data["perfilactual"] =  $this->sessionclass->getnameperfilactual();                
                $data["in_session"] = 1;
                $data["no_publics"] =1;
                $data["meta_keywords"] =  "";
                $data["url_img_post"]= "";
                $data["id_usuario"] = $this->sessionclass->getidusuario();                     
                $data["id_empresa"] =  $this->sessionclass->getidempresa();                     
                return $data;
        }else{            
            redirect(url_log_out());
        }   
    }        
}/*Termina el controlador */