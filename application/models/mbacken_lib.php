<?php
class Mbacken_lib extends CI_Model{

  
  public function mgetID($link){       
    $this->db->like('link',$link);   
    $resultado = $this->db->get('z_menus'); 
    return $resultado->row(); 
  }

  public function getPermisos($menu,$rol){       
    $this->db->where('menu_id',$menu);  
    $this->db->where('rol_id',$rol);   
    $resultado = $this->db->get('z_permissions'); 
    return $resultado->row(); 
  }

  public function get_combo($table){       
    $this->db->where('status','HABILITADO');   
    $resultado = $this->db->get($table); 
    return $resultado->result(); 
  }
 

}
?>