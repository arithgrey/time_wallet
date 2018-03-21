<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Recursocontroller extends CI_Controller {
	function __construct(){		
		parent::__construct();
		$this->load->helper("recursos");
		$this->load->model("cuentageneralmodel");
		$this->load->library('principal');  			
		$this->load->library('sessionclass');  			
	}
	/********************Para el administrador **********************/
	function perfiles(){
		$data = $this->val_session("Perfiles");											
		$this->principal->show_data_page( $data ,  'perfiles/principal');									
	}	
	/**/	
	/**/
	function usuarios(){

		if(valida_session_enid($this->sessionclass->is_logged_in())){				

			$perfil = $this->sessionclass->getperfiles();

			$data= $this->val_session("Miembros de la cuenta");										
			$id_empresa =  $this->sessionclass->getidempresa();						                                            	  
			$data["id_empresa"] =  $id_empresa; 			
			$data["perfiles"] = $this->enidmodel->get_perfiles_disponibles($perfil[0]["idperfil"]);
			
			$this->principal->show_data_page($data , "usuarioscuenta/paraadministradorcuenta" );				

		}
	}	
	/*****Para el administrador de la cuenta *****************/
	function perfilconfig(){
		/** *** ***  ***/
		if(valida_session_enid($this->sessionclass->is_logged_in())){
			$data = $this->val_session("Configuración, perfiles y permisos");					
			$this->principal->show_data_page( $data , 'perfiles/config');
		}
	}	
	/**/
	/*
	function perfilconfigad($recurso){
		$data = $this->val_session("");						
		$data["modulo"] = $recurso;			
		$this->principal->show_data_page( $data , 'modulo/moduloconfig_g');			
	}
	*/
	
	/**/
	function informacioncuenta(){				
		$data = $this->val_session("Mi información personal");					
		
		$id_usuario  = $this->sessionclass->getidusuario();			
		$data["data_user"] =  $this->cuentageneralmodel->get_data_user_by_id($id_usuario)[0];
		$this->principal->show_data_page($data , 'micuenta/principal' );						
		$this->principal->crea_historico(14 , 0 , $id_usuario);
	}	
	/*Inicia perfil avanzado*/
	
	function val_session($titulo_dinamico_page){

        if ( $this->sessionclass->is_logged_in() == 1) {                                                            
                $menu = $this->sessionclass->generadinamymenu();
                $nombre = $this->sessionclass->getnombre();                                         
                $data['titulo']= $titulo_dinamico_page;              
                $data["menu"] = $menu;              
                $data["nombre"]= $nombre;                                               
                $data["perfilactual"] =  $this->sessionclass->getnameperfilactual();                
                $data["in_session"] = 1;
                $data["no_publics"] =0;
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
    /**/  
}