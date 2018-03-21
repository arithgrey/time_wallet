<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Startsession extends CI_Controller {
	function __construct(){        
        parent::__construct();                                       
        $this->load->library('sessionclass');        
    }             
    function presentacion(){												

        $data = $this->val_session("Iniciar sesión");
        $perfil = $this->sessionclass->getuserdataperfil()[0]["idperfil"];         
        $id_empresa = $this->sessionclass->getidempresa();     
        redirect(url_ingresos_egresos());
	}        
	
	private function val_session($titulo_dinamico_page ){

        if ( $this->sessionclass->is_logged_in() == 1) {                                                            
                $menu = $this->sessionclass->generadinamymenu();
                $nombre = $this->sessionclass->getnombre();                                         
                $email_user  = $this->sessionclass->getemailuser();
                
                $data['titulo']= $titulo_dinamico_page;              
                $data["menu"] = $menu;              
                $data["nombre"]= $nombre;                                               
                $data["email_user"]= $email_user;                                               
                $data["perfilactual"] =  $this->sessionclass->getnameperfilactual();                
                $data["in_session"] = 1;
                $data["no_publics"] = 1;
                $data["meta_keywords"] =  "";
                $data["url_img_post"]= "";
                return $data;
        }else{            
            $data['titulo']=$titulo_dinamico_page;              
            $data["in_session"] = 0;
            $data["no_publics"] = 0;
            $data["meta_keywords"] =  "";
            $data["url_img_post"]= "";

            return $data;
        }   
    }    
    /**/
}