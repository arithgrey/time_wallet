<?php defined('BASEPATH') OR exit('No direct script access allowed');
class img_model extends CI_Model {  
/**/
function __construct(){
      parent::__construct();        
      $this->load->database();
}
/**/
function get_img_categoria($id_categoria){

  $query_get =  "SELECT id_imagen FROM 
  imagen_catalogo_productos_servicios 
  WHERE id_catalogo_productos_servicios = $id_categoria LIMIT 1";    
  $result = $this->db->query($query_get);
  $imagen_usr  =  $result->result_array();
  
  
  if (count($imagen_usr) > 0 ){

      $id_imagen = $imagen_usr[0]["id_imagen"];      
      $query_get =  "SELECT  * FROM imagen WHERE idimagen =  $id_imagen LIMIT 1";
      $result  =  $this->db->query($query_get);
      return $result->result_array();

  }else{

    $query_get =  "SELECT  * FROM imagen WHERE idimagen = 1 LIMIT 1;";
    $result  =  $this->db->query($query_get);
    return $result->result_array();
  } 
  

}

/**/
function get_img_usuario($id_usuario){

  
  $query_get =  "SELECT id_imagen FROM imagen_usuario WHERE idusuario = $id_usuario LIMIT 1";    
  $result = $this->db->query($query_get);
  $imagen_usr  =  $result->result_array();
  
  
  if (count($imagen_usr) > 0 ){

      $id_imagen = $imagen_usr[0]["id_imagen"];      
      $query_get =  "SELECT  * FROM imagen WHERE idimagen =  $id_imagen LIMIT 1";
      $result  =  $this->db->query($query_get);
      return $result->result_array();

  }else{

    $query_get =  "SELECT  * FROM imagen WHERE idimagen = 1 LIMIT 1;";
    $result  =  $this->db->query($query_get);
    return $result->result_array();
  } 
  

}

/**/
function insert_img_user_perfil($data, $id_usuario , $id_empresa ){
  $id_user_org = $data["dinamic_user"];  
  $query_exist=  "select * from imagen_usuario where idusuario = '".$id_user_org."' limit 1";    
  $e =   $this->consulta_existencia($query_exist);  
  if ($e["num_rows"] > 0 ){
      $id_imagen =    $this->pre_delete_img($e , "imagen_usuario");          
  }
  
  $id_imagen = $this->insert_img($data , $id_usuario , $id_empresa , 8 );  
  
  
  $dinamic_query ="INSERT INTO  imagen_usuario(id_imagen , idusuario  ) VALUES('". $id_imagen."' , '". $id_user_org."' )";          
  return $this->db->query($dinamic_query);          
  
}
/**/

function insert_img_categoria($data, $id_usuario , $id_empresa ){
   
  $query_exist=  "select * from imagen_catalogo_productos_servicios where id_catalogo_productos_servicios = '".$data["id_categoria"]."' limit 1";    
  $e =   $this->consulta_existencia($query_exist);  
  if ($e["num_rows"] > 0 ){
      $id_imagen =    $this->pre_delete_img($e , "imagen_catalogo_productos_servicios");          
  }
  
  $id_imagen = $this->insert_img($data , $id_usuario , $id_empresa , 11 );  
  
  
  $dinamic_query ="INSERT INTO  imagen_catalogo_productos_servicios(id_imagen , id_catalogo_productos_servicios  ) 
  VALUES('". $id_imagen."' , '". $data["id_categoria"]  ."' )";          
  return $this->db->query($dinamic_query);          
  
  
}
/**/


  /**/
  function consulta_existencia($sql){    
      $result_exist =  $this->db->query($sql);       
      $data["result_data"] = $result_exist->result_array();
      $data["num_rows"] = $result_exist->num_rows();
      return $data; 
  }
  /**/
  /**/
  function pre_delete_img($e , $campo ){
    $sql_pv = "";
    $sql_img =""; 
    foreach ($e["result_data"] as $row ){   
      $id_imagen  =  $row["id_imagen"];
      $sql_pv .=  "DELETE FROM $campo  WHERE id_imagen = '".$id_imagen."' limit 1";
      $sql_img =  "DELETE FROM imagen WHERE idimagen = '".$id_imagen."' limit  1"; 
    }            
    $this->db->query($sql_pv);
    $this->db->query($sql_img);    
  }
  /**/
  function insert_img($data , $id_usuario , $id_empresa , $type=0  ){    
                    
            $query_insert ="INSERT 

                            INTO 
                            imagen(
                              nombre_imagen , 
                              type ,                       
                              id_usuario  ,  
                              id_empresa, 
                              img, 
                              extension
                            ) VALUES 
                            ('". $data["nombreArchivo"] ."' , 
                            ". $type ." ,                       
                            '". $id_usuario."' , 
                            '". $id_empresa."' ,
                            '". $data["imagenBinaria"]."' ,
                            '". $data["extension"]."' 
                            )";    
  
    $result =  $this->db->query($query_insert);
    return $this->db->insert_id();              
    
    
  }  
/*Termina modelo */
}