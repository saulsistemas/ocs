<?php
class Mmodel extends CI_Model{
    public $tabla    =  "z_models";
    public $tabla_id =  "id";

    public function get_models(){  
      $query ='SELECT m.*, b.name as brand 
      FROM z_models m
      INNER JOIN z_brands b
      ON m.brand_id = b.id
      WHERE m.status ="HABILITADO" OR m.status ="DESHABILITADO";';  
      $resultado = $this->db->query($query); 
      return $resultado->result(); 
    }

    public function store_models($data){       
     	return $this->db->insert($this->tabla,$data);       
    }

    public function edit_models($id){       
     	$this->db->where('id',$id);       
    	$resultado = $this->db->get($this->tabla);
    	return $resultado->row(); 
    }

     public function update_models($id,$data){       
     	$this->db->where('id',$id);  
     	return  $this->db->update($this->tabla,$data);    	
    }
    
}
?>