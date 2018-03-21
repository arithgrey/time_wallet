<?php defined('BASEPATH') OR exit('No direct script access allowed');
class cuentasmodel extends CI_Model{
  function __construct(){
      parent::__construct();        
      $this->load->database();
  } 
  /**/
  function get_cuentas_disponibles_a_tranferir($param){
      
      $id_empresa =  $param["id_empresa"];
      $id_usuario =  $param["id_usuario"];
      $id_cuenta =  $param["cuenta"];

      $query_get = "SELECT c.* FROM cuenta c 
                    INNER JOIN usuario_cuenta uc ON  
                    c.id_cuenta =  uc.id_cuenta 
                    WHERE 
                    c.idempresa  =  $id_empresa  AND 
                    uc.id_usuario =  $id_usuario
                    AND c.id_cuenta  !=  $id_cuenta
                    LIMIT  5";  

      $result =  $this->db->query($query_get);
      return $result->result_array();

  }

  /**/
  function get_cuentas($param){

      $id_empresa =  $param["id_empresa"];
      $id_usuario =  $param["id_usuario"];

      $query_get = "SELECT c.* FROM cuenta c 
                    INNER JOIN usuario_cuenta uc ON  
                    c.id_cuenta =  uc.id_cuenta 
                    WHERE 
                    c.idempresa  =  $id_empresa  AND 
                    uc.id_usuario =  $id_usuario LIMIT 5";  

      $result =  $this->db->query($query_get);
      return $result->result_array();

  }

/*Termina modelo */
}