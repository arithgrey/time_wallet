<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home extends CI_Controller{
    function __construct(){        
        parent::__construct();                            
        $this->load->library("principal");
        $this->load->library('sessionclass');        
    }    
    /**/
    function evaluacion(){
        $this->load->view("empresa/evaluacion_enid");
    }
    /**/
    function usos_privacidad_enid_service(){        
        $this->principal->crea_historico(28);
        $this->load->view("empresa/uso_privacidad");
    } 
    /**/
    function uso(){

        $data = $this->val_session("Introducción a Enid Service");
        $data["meta_keywords"] =  "Eventos musicales, Enid service, artistas,locaciones,puntos de venta,accesos, precios"; 
        $data["url_img_post"] = create_url_preview(10);
        $this->principal->show_data_page($data, "empresa/uso");               
        $this->principal->crea_historico(25);
    }
    /**/
    function prospectos(){
        redirect(base_url()."#registro");       
    }
    /**/
    function nuevo_miembro(){
    
        $this->principal->crea_historico(3);        
        $data = $this->val_session("Ahora los mejores eventos los haces posibles tu.!");
        $data["meta_keywords"] =  "Eventos musicales, Enid service, artistas,locaciones,puntos de venta,accesos, precios"; 
        $data["url_img_post"] = create_url_preview(10 );
        if ($this->sessionclass->is_logged_in() == true){
            redirect(url_presentacion());         

        }else{                                                  
            
            $this->principal->show_data_page($data, "empresa/nuevomiembro");            
            $this->session->sess_destroy();     
        } 
    }
    /**/
    function registro(){
        if( $this->sessionclass->is_logged_in() == true) {
            redirect(url_presentacion());         
        }else{  
            /**/            
            $this->principal->crea_historico(27);        
            $this->load->view('organizacion/registro_cuenta');   
            $this->session->sess_destroy();     
        }
    }
    /**/                        
    function index(){
        
        $data = $this->val_session("Inteligencia de negocio para eventos musicales");
        $data["url_img_post"] = create_url_preview(7);
        $data["meta_keywords"] =  "Eventos musicales, Enid service, artistas,locaciones,puntos de venta,accesos, precios"; 

        if ($this->sessionclass->is_logged_in() == true) {            
            redirect(url_presentacion());         

        }else{                                                  
            /**/
            $this->principal->crea_historico(1);            
            $this->load->view("home", $data);

            $this->session->sess_destroy();     
        }     
    }
    /**/
    function logout(){  
        $this->session->sess_destroy();
        redirect(base_url());
    }
    /**/   
    function val_session($titulo_dinamico_page){

        if ( $this->sessionclass->is_logged_in() == 1) {                                                            
                $menu = $this->sessionclass->generadinamymenu();
                $nombre = $this->sessionclass->getnombre();                                         
                $data['titulo']= $titulo_dinamico_page;              
                $data["menu"] = $menu;              
                $data["nombre"]= $nombre;                                               
                $data["perfilactual"] =  $this->sessionclass->getnameperfilactual();                
                $data["in_session"] = 1;
                $data["no_publics"] =1;
                $data["meta_keywords"] =  "";
                $data["url_img_post"]= "";
                return $data;
        }else{            
            $data['titulo']=$titulo_dinamico_page;              
            $data["in_session"] = 0;
            $data["no_publics"] =0;
            $data["meta_keywords"] =  "";
            $data["url_img_post"]= "";
            return $data;
        }   
    }    
 
}