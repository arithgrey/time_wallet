<?php defined('BASEPATH') OR exit('No direct script access allowed');
  class registromodel extends CI_Model {
    function __construct(){      
        parent::__construct();        
        $this->load->database();
    }
    /**/
    function delete_registro($param){

      $query_delete =  "DELETE FROM registro WHERE id_registro = '".$param["registro"]."' LIMIT 1 ";       
      return $this->db->query($query_delete);

    }
    /**/
    function transferir($param){

      $nombre =  "Transferencia a cuenta";
      $cuenta_tranfiere =  $param["cuenta_tranfiere"];
      $valor_a_transferir =  $param["valor_a_transferir"];
      $query_insert = "INSERT INTO registro(
                                  nombre , 
                                  tipo ,  
                                  id_cuenta , 
                                  valor ,  
                                  unidad , 
                                  cantidad )
                         VALUES(
                          '".$nombre."' ,  
                          '0', 
                          $cuenta_tranfiere, 
                          $valor_a_transferir,
                          1, 
                          1
                          )"; 

      $this->db->query($query_insert);


      /**/
      $nombre_cuenta_transfiere = "Transferencia de - " . $param["nombre_cuenta_transfiere"];
      $cuenta_a_transferir= $param["cuenta_a_transferir"];
      $query_insert = "INSERT INTO registro(
                                  nombre , 
                                  tipo ,  
                                  id_cuenta , 
                                  valor ,  
                                  unidad , 
                                  cantidad )
                                 VALUES(
                                  '".$nombre_cuenta_transfiere."' ,  
                                  '1',                           
                                  $cuenta_a_transferir,
                                  $valor_a_transferir,
                                  1, 
                                  1
                                  )"; 

      return $this->db->query($query_insert);
      
    }
  /**/
  function get_registros($param){

    $_num =  get_random();    
    $this->create_tmp_registros($_num , 0  ,  $param["periodo"]  , $param["cuenta"] ,  $param["tipo"]);      
      $query_get =  "SELECT * FROM  tmp_registros_$_num"; 
      $result =  $this->db->query($query_get);
      $data_complete["desglose"] =  $result->result_array();                            
    $this->create_tmp_registros($_num , 1  ,  $param["periodo"] , $param["cuenta"] ,  $param["tipo"] );
    return $data_complete;
  }
  /**/
  function create_tmp_registros($_num , $flag , $periodo ,  $id_cuenta ,  $tipo  ){
        
      $query_drop = "DROP TABLE IF exists tmp_registros_$_num"; 
      $db_response  =  $this->db->query($query_drop);    
      switch ($periodo){    
        case 0:        
          $sql=  " ORDER BY  fecha_registro DESC";
          break;        
        default:          
          break;
      }
      /**/
      if ($flag == 0){
                  $query_create =  "
                  CREATE TABLE tmp_registros_$_num  AS 
                    SELECT 
                    r.id_registro,
                    r.nombre ,
                    r.tipo ,
                    r.id_cuenta , 
                    r.cantidad , 
                    r.valor ,   
                    (r.cantidad * r.valor) total , 
                    date(r.fecha_registro)f_registro , 
                    time(r.fecha_registro)hora, 
                    r.descripcion
                  FROM registro r 
                  WHERE id_cuenta = '".$id_cuenta."' 
                  AND tipo = '".$tipo ."'  " . $sql; 
                  $db_response  =   $this->db->query($query_create);
      }
      return  $db_response; 
  }
  /**/
  function get_simple_balance($param){
    
    $_num =  get_random();    
    $this->create_tmp_registros_cuenta($_num , 0 ,  $param );  
      
      $query_get ="SELECT SUM(CASE WHEN  tipo =  1 then (valor * cantidad ) else 0 end ) ingresos ,   
                   SUM(CASE WHEN  tipo =  0 then (valor * cantidad ) else 0 end )gastos
                  FROM  tmp_registros_cuenta_$_num";
      
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
  /**/

}