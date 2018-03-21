<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class Registro extends REST_Controller{      
    function __construct(){
        parent::__construct();                  
        $this->load->helper("enid");
        $this->load->helper("empresa");
        $this->load->model("registromodel");
        $this->load->library('sessionclass');                    

    }
    /**/
    function list_GET(){
        $param =  $this->get();
        $data["ingresos_egresos"] = $this->registromodel->get_registros($param);
        $data["info"] = $param;
        $this->load->view("ingresos_egresos/lista_ingresos_egresos" , $data);        
         
    }
    /**/
    function trasnferencia_POST(){

        $param =  $this->post();
        $db_response =  $this->registromodel->transferir($param);
        $this->response($db_response);

    }
    /**/
    function simple_balance_GET(){

        $param =  $this->get();
        $db_response =  $this->registromodel->get_simple_balance($param);
        $info_simple_balance =  create_info_simple_balance($db_response);
        $this->response($info_simple_balance);
    }
    /**/
    function ingreso_delete(){
        $param =  $this->delete();
        $db_response =  $this->registromodel->delete_registro($param);
        $this->response($db_response); 

    }


}?>