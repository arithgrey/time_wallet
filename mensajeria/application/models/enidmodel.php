<?php defined('BASEPATH') OR exit('No direct script access allowed');
  class enidmodel extends CI_Model {
    function __construct(){      
        parent::__construct();        
        $this->load->database();
    }      
    /**/
    function set_pass($param){

        $mail =  trim($param["mail"]); 
        $new_pass =  RandomString(); 
        $query_update =  "UPDATE usuario SET password = '".sha1($new_pass)."' WHERE email = '".$mail."' LIMIT 1 ";        
        $status_send= $this->db->query($query_update); 
        $data["new_pass"]= $new_pass;
        $data["status_send"] = $status_send; 
        $data["mail"] =  $param["mail"];
        return $data;
    }    
}