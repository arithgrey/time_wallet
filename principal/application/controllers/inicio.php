<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Inicio extends CI_Controller {
	function __construct(){        
        parent::__construct();            
	    $this->load->model("empresamodel");    	   
	    $this->load->library("principal");
	    $this->load->library('sessionclass');	     
    }    
    /**/
    function empresas(){

		$data = $this->val_session("Los prospectos");
		$id_empresa =  $this->sessionclass->getidempresa();		

		if ($id_empresa ==  1 ){
			$this->principal->show_data_page( $data , 'empresa/empresas_enid');			
			$this->principal->crea_historico(29 , 0 , $this->sessionclass->getidusuario());
		}else{
			redirect(base_url());
		}		
    }
    /**/ 
	function eventos($q=''){

		if (valida_session_enid($this->sessionclass->is_logged_in())) {
			
			
			$data = $this->val_session("Eventos");					
			$data["q"] = $q;			
			$data["perfil"] = $this->sessionclass->getuserdataperfil()[0]["idperfil"];      			
			$this->principal->show_data_page( $data , 'principal/bienvenidaestratega');	
			$this->principal->crea_historico(17 , 0 , $this->sessionclass->getidusuario());
		}				
	}
	/*Termina la función*/	
	function index(){
		if (valida_session_enid($this->sessionclass->is_logged_in())) {

			$data = $this->val_session("Las tendencias de mis eventos");	
			$id_empresa =  $this->sessionclass->getidempresa();
			$data["id_empresa"] =  $id_empresa; 
			$data["nombre_user"]= $this->sessionclass->getnombre();
			$data["data_empresa"] =  $this->empresamodel->get_empresa($id_empresa);
			$this->principal->show_data_page( $data , 'reporte/principal' );						
			$this->principal->crea_historico(13);
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
                $data["id_empresa"] =  $this->sessionclass->getidempresa();
                $data["id_usuario"] =  $this->sessionclass->getidusuario();
                

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
    }   /*Determina que vistas mostrar para los eventos*/    
}