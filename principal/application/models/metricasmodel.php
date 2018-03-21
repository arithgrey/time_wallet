<?php defined('BASEPATH') OR exit('No direct script access allowed');
class metricasmodel extends CI_Model{
  function __construct(){
      parent::__construct();        
      $this->load->database();
  } 
  /**/
  function get_balance_general($param){
    
    $_num =  get_random();    
    $this->create_tmp_registros_cuenta($_num , 0 ,  $param );  
      
      $query_get ="select  
sum(case when  tipo = 1 then (valor *  cantidad) else 0 end   )ingresos ,  
sum(case when  tipo = 0 then (valor *  cantidad)   else 0 end   )gastos ,  
date(fecha_registro)dia 
from tmp_registros_cuenta_$_num group by date(fecha_registro) ORDER BY fecha_registro ASC";      


      $result =  $this->db->query($query_get);            
      $data_complete = $result->result_array();



    $this->create_tmp_registros_cuenta($_num , 1 ,  $param );  
    return $data_complete;

  }
  /**/
  function create_tmp_registros_cuenta($_num ,  $flag , $param){

    $query_drop = "DROP TABLE IF exists tmp_registros_cuenta_$_num";
    $db_response  = $this->db->query($query_drop);
    
    if( $flag == 0 ){
      
      $query_create =  "CREATE TABLE tmp_registros_cuenta_$_num  AS 
                        SELECT * FROM registro WHERE id_cuenta = '".$param["cuenta"]."' ";  
      $db_response =  $this->db->query($query_create);

    }
    return $db_response;

  }

/*Termina modelo */
}