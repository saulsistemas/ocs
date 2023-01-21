<?php
class Mcategory extends CI_Model{
    public $tabla    =  "z_categories";
    public $tabla_id =  "id";

    public function get_categories(){  
      $this->db->where('status', 'HABILITADO');
      $this->db->or_where('status', 'DESHABILITADO');     
      $resultado = $this->db->get($this->tabla); 
      return $resultado->result(); 
    }

    public function store_categories($data){       
     	return $this->db->insert($this->tabla,$data);       
    }

    public function edit_categories($id){       
     	$this->db->where('id',$id);       
    	$resultado = $this->db->get($this->tabla);
    	return $resultado->row(); 
    }

     public function update_categories($id,$data){       
     	$this->db->where('id',$id);  
     	return  $this->db->update($this->tabla,$data);    	
    }
    
}
?>