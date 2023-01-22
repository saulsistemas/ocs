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
    
    public function update_hardware($id,$data){       
      $this->db->where('id',$id);  
      return  $this->db->update('hardware',$data);    	
   }


   
    var $order_column = array(null, "prioridad", "codigo", null, null); 
     
    function selectquery($idempresa){  
          $this->db->select('ti.*,sol.codigo codsolicitante ,CONCAT(sol.nombre," ",sol.apellido) solicitante , tps.codigo codsoporte,tps.nombre soporte,res.codigo codresponsable,CONCAT(res.nombre," ",res.apellido )responsable ');   
          $this->db->from('ticket ti');  

          $this->db->join('usuario sol','ti.idsolicitante=sol.idusuario'); 
          $this->db->join('tiposop tps','ti.idtiposop = tps.idtiposop'); 
          $this->db->join('usuario res','ti.idresponsable = res.idusuario','left'); 

         
          $this->db->where('ti.estado <=','3');
          $this->db->where('ti.idempresa',$idempresa);

         if(isset($_POST["search"]["value"]))  
         {  
              $this->db->like("ti.prioridad", $_POST["search"]["value"]);  
              $this->db->or_like("ti.codigo", $_POST["search"]["value"]);  

         }  
         if(isset($_POST["order"]))  
         {  
              $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
         }  
         else  
         {  
              $this->db->order_by('ti.idticket', 'DESC');  
         }  
    }  
    function selectdatatable($idempresa){  
         $this->selectquery($idempresa);  
         if($_POST["length"] != -1){  
          $this->db->limit($_POST['length'], $_POST['start']);  
         } 
        $this->db->where('ti.estado <=','3');
        $this->db->where('ti.idempresa',$idempresa);
         $query = $this->db->get();  
         return $query->result();  
    }  
    function get_filtered_data($idempresa){  
         $this->selectquery($idempresa); 
         $this->db->where('ti.estado <=','3');
         $this->db->where('ti.idempresa',$idempresa); 
         $query = $this->db->get();  
         return $query->num_rows();  
    }       
    function get_all_data($idempresa) {  
        $this->db->select('ti.*,sol.codigo codsolicitante ,CONCAT(sol.nombre," ",sol.apellido) solicitante , tps.codigo codsoporte,tps.nombre soporte,res.codigo codresponsable,CONCAT(res.nombre," ",res.apellido )responsable ');   
        $this->db->from('ticket ti');  

        $this->db->join('usuario sol','ti.idsolicitante=sol.idusuario'); 
        $this->db->join('tiposop tps','ti.idtiposop = tps.idtiposop'); 
        $this->db->join('usuario res','ti.idresponsable = res.idusuario','left'); 

         
        $this->db->where('ti.estado <=','3');
        $this->db->where('ti.idempresa',$idempresa);
     return $this->db->count_all_results();  
    } 
}
?>