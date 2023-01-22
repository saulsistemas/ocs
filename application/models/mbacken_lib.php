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
 
  public function get_combo_hardware(){  
    $query ='SELECT h.ID,a.TAG,h.NAME, h.USERID,h.OSNAME,
    b.SMANUFACTURER, b.SMODEL, b.SSN, b.TYPE, h.CATEGORY_ID
    FROM hardware h
    INNER JOIN bios b
    ON h.ID = b.HARDWARE_ID
    INNER JOIN accountinfo a
    ON h.ID = a.HARDWARE_ID
    WHERE  h.CATEGORY_ID IS NULL;';  
    $resultado = $this->db->query($query); 
    return $resultado->result(); 
  }
}
?>