<?php
class User extends CI_Model{
    public $tabla    =  "z_users";
    public $tabla_id =  "id";
  
    public function login($txtusername,$txtpassword){       
        $this->db->where('username',$txtusername);
        $this->db->where('password',$txtpassword);
        $resultado = $this->db->get($this->tabla);
        if ($resultado->num_rows() >0) {
         return $resultado->row();  
        }else {
            return false;
        }     
     }
 

}
?>