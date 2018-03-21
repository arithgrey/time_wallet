<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Enid extends CI_Controller {
    function __construct(){
        parent::__construct();
        
        $this->load->model("enidmodel");
        $this->load->library('principal');    
        $this->load->library('sessionclass');    
    }
    /**/    
    function imagen_empresa($id_empresa){

        $db_response =  $this->img_model->get_img_empresa($id_empresa);                        
        foreach ($db_response as $row ){ 
            echo $row["img"];
        }  

    }
    /**/
    function imagen_acceso($id_acceso){

        $db_response =  $this->img_model->get_img_acceso($id_acceso);                        
        foreach ($db_response as $row ){ 
            echo $row["img"];
        }  

    }
    /**/
    function imagen_artista($id_artista){

        $db_response =  $this->img_model->get_img_artista($id_artista);                        
        foreach ($db_response as $row ){ 
            echo $row["img"];
        }         

    }
    /**/
    function imagen_escenario($id_escenario){

        $db_response =  $this->img_model->get_img_escenario($id_escenario);                
        
        foreach ($db_response as $row ){ 
            echo $row["img"];
        }         
    }
    /**/
    function img_evento($id_evento){

        $db_response =  $this->img_model->get_img_evento($id_evento);                
            foreach ($db_response as $row ){ 
                echo $row["img"];
            }            
        
    }
    /**/
    function val_session($titulo_dinamico_page){

        if ( $this->sessionclass->is_logged_in() == 1 ){                                                            
                $menu = $this->sessionclass->generadinamymenu();
                $nombre = $this->sessionclass->getnombre();                                         
                $data['titulo']= $titulo_dinamico_page;              
                $data["menu"] = $menu;              
                $data["nombre"]= $nombre;                                               
                $data["perfilactual"] =  $this->sessionclass->getnameperfilactual();                
                $data["in_session"] = 1;
                $data["meta_keywords"] =  "";
                $data["url_img_post"]= "";
                $data["no_publics"] =1;
                return $data;
        }else{          
            redirect("home/logout");
        }   
    }
    /*Determina que vistas mostrar para los eventos*/    
}/*Termina el controlador */