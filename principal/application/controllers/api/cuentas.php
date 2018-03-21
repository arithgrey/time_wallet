<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
require 'Request.php';
class Cuentas extends REST_Controller{      
    function __construct(){
        parent::__construct();
        $this->load->helper("empresa");
        $this->load->model("cuentasmodel");                  
        $this->load->library('principal');                            
        $this->load->library('sessionclass');                            
    }   
    /**/
    function cuenta_PUT(){

        $param = $this->put();
        $db_response=  $this->cuentasmodel->update_cuenta($param);
        $this->response($db_response);
    } 
    /**/
    function disponibles_a_transferir_GET(){
        
        $this->validate_user_sesssion();
        $param = $this->get();
        $param["id_empresa"] =  $this->sessionclass->getidempresa();        
        $param["id_usuario"] =  $this->sessionclass->getidusuario();        
        $db_response = $this->cuentasmodel->get_cuentas_disponibles_a_tranferir($param);
        $select_cuentas=  create_select($db_response  , "cuenta_a_transferir" , "cuen_a_transferir form-control input-sm" , "cuen_a_transferir" , "nombre_cuenta" , "id_cuenta" );
        $data["num_cuentas"] =  count($db_response);
        $data["cuentas_HTML"] =  $select_cuentas;        
        $this->response($data);
    }
    /*termina validar session */
    function q_cuentas_GET(){ 

        $this->validate_user_sesssion();
        $param = $this->get();        
        $param["id_empresa"] =  $this->sessionclass->getidempresa();        
        $param["id_usuario"] =  $this->sessionclass->getidusuario();        
        $cuentas =  $this->cuentasmodel->get_cuentas($param);
        $db_response["cuentas"] = $cuentas;
        $db_response["cuentas_HTML"] = menu_cuentas($cuentas);
        $this->response($db_response);
    }
    /**/
    function validate_user_sesssion(){
        if( $this->sessionclass->is_logged_in() == 1) {                        

            }else{
            /*Terminamos la session*/
            $this->sessionclass->logout();
        }   
    }

}?>