<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class Metricas extends REST_Controller{      
    function __construct(){
        parent::__construct();                  
        
        $this->load->helper("empresa");        
        $this->load->model("metricasmodel");
        $this->load->library('sessionclass');                    

    }
    /**/
    function balance_general_GET(){
        
        $param =  $this->get();        
        $db_response = $this->metricasmodel->get_balance_general($param);
        $this->response($db_response);

    }
    

}?>