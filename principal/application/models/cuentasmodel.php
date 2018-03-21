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
                    LIMIT  15";  

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
                    uc.id_usuario =  $id_usuario 
                    ORDER BY c.nombre_cuenta ASC
                    LIMIT 15";  

      $result =  $this->db->query($query_get);
      return $result->result_array();

  }
  /**/
  function update_cuenta($param){
    
    $nombre_cuenta  =  $param["nombre_cuenta"];
    $descripcion  = $param["descripcion"];
    $cuenta = $param["cuenta"];

    $query_update =  "UPDATE cuenta SET 
                      nombre_cuenta = '".$nombre_cuenta."'  ,
                      descripcion = '".$descripcion."' 
                      WHERE id_cuenta =  '". $cuenta ."' LIMIT 1";
    return $this->db->query($query_update);
  }

/*Termina modelo */
}