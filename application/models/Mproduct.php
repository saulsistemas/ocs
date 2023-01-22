<?php
class Mproduct extends CI_Model{
    public $tabla    =  "z_products";
    public $tabla_id =  "id";

    //public function get_products(){  
    //  $query ='SELECT m.*, b.name as brand 
    //  FROM z_products m
    //  INNER JOIN z_brands b
    //  ON m.brand_id = b.id
    //  WHERE m.status ="HABILITADO" OR m.status ="DESHABILITADO";';  
    //  $resultado = $this->db->query($query); 
    //  return $resultado->result(); 
    //}
    public function get_products(){  
      $resultado = $this->db->get($this->tabla); 
      return $resultado->result(); 
    }
    public function store_products($data){       
     	return $this->db->insert($this->tabla,$data);       
    }

    public function edit_products($id){       
     	$this->db->where('id',$id);       
    	$resultado = $this->db->get($this->tabla);
    	return $resultado->row(); 
    }

     public function update_products($id,$data){       
     	$this->db->where('id',$id);  
     	return  $this->db->update($this->tabla,$data);    	
    }

    public function get_combo_models($table,$brand_id){ 
      $this->db->where('brand_id',$brand_id);
      $this->db->where('status','HABILITADO');   
      $resultado = $this->db->get($table); 
      return $resultado->result(); 
    }
    
}
?>