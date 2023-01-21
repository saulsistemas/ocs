<?php
class Mbrand extends CI_Model{
    public $tabla    =  "z_brands";
    public $tabla_id =  "id";

    public function get_brands(){  
      $this->db->where('status', 'HABILITADO');
      $this->db->or_where('status', 'DESHABILITADO');     
      $resultado = $this->db->get($this->tabla); 
      return $resultado->result(); 
    }

    public function store_brands($data){       
     	return $this->db->insert($this->tabla,$data);       
    }

    public function edit_brands($id){       
     	$this->db->where('id',$id);       
    	$resultado = $this->db->get($this->tabla);
    	return $resultado->row(); 
    }

     public function update_brands($id,$data){       
     	$this->db->where('id',$id);  
     	return  $this->db->update($this->tabla,$data);    	
    }
    
}
?>