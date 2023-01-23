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


   
    var $order_column = array("p.id", "codigo_empleado", "empleado", "categoria", "marca", "modelo","serial", "hard.OSNAME", "hard.PROCESSORT","hard.MEMORY","host_name","proveedor","estado1","estado2"); 
    var $column_search  = array("p.id", "e.code", "e.name", "c.name","mar.name","mo.name","bi.SSN","hard.OSNAME", "hard.PROCESSORT","hard.MEMORY","hard.NAME","pro.name","stasig.name","sthard.name"); 
     
    function selectquery(){  
          $query='p.*,
          e.code as codigo_empleado,e.name as empleado, 
          c.name categoria,
          mar.name marca,
          mo.name modelo,
          pro.name proveedor,
          hard.OSNAME,hard.PROCESSORT,hard.MEMORY,hard.NAME as host_name,
          stasig.name as estado1,
          sthard.name as estado2,
          bi.SSN as serial, bi.SMANUFACTURER,bi.SMODEL,bi.TYPE';
          $this->db->select($query);   
          $this->db->from('z_products p');  
          $this->db->join('z_employees e','p.employee_id = e.id'); 
          $this->db->join('z_categories c','p.category_id = c.id'); 
          $this->db->join('z_brands mar','p.brand_id = mar.id'); 
          $this->db->join('z_models mo','p.model_id = mo.id'); 
          $this->db->join('hardware hard','p.hardware_id = hard.ID'); 
          $this->db->join('z_providers pro','p.provider_id = pro.id'); 
          $this->db->join('z_status_assignments stasig','p.status_assignment_id = stasig.id'); 
          $this->db->join('z_status_hardwares sthard','p.status_hardware_id = sthard.id'); 
          $this->db->join('bios bi','hard.ID = bi.HARDWARE_ID'); 


          $i = 0;
         foreach ($this->column_search  as $item) // loop column 
         {
             if($_POST["search"]["value"]) // if datatable send POST for search
             {
                 if($i===0) // first loop
                 {
                     $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                     $this->db->like($item, $_POST["search"]["value"]);
                 }
                 else
                 {
                     $this->db->or_like($item, $_POST["search"]["value"]);
                 }
                 if(count($this->column_search ) - 1 == $i) //last loop
                     $this->db->group_end(); //close bracket
             }
             $i++;
         }


         if(isset($_POST["order"]))  
         {  
              $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
         }  
         else  
         {  
              $this->db->order_by('p.id', 'DESC');  
         }  
    }  
    function selectdatatable(){  
         $this->selectquery();  
         if($_POST["length"] != -1){  
          $this->db->limit($_POST['length'], $_POST['start']);  
         } 
        //$this->db->where('ti.estado <=','3');
        //$this->db->where('ti.idempresa',);
         $query = $this->db->get();  
         return $query->result();  
    }  
    function get_filtered_data(){  
         $this->selectquery(); 
         //$this->db->where('ti.estado <=','3');
         //$this->db->where('ti.idempresa',); 
         $query = $this->db->get();  
         return $query->num_rows();  
    }       
    function get_all_data() {  
      $query='p.*,
      e.code as codigo_empleado,e.name as empleado, 
      c.name categoria,
      mar.name marca,
      mo.name modelo,
      pro.name proveedor,
      hard.OSNAME,hard.PROCESSORT,hard.MEMORY,hard.NAME as host_name,
      stasig.name as estado1,
      sthard.name as estado2,
      bi.SSN as serial, bi.SMANUFACTURER,bi.SMODEL,bi.TYPE';
      $this->db->select($query);   
      $this->db->from('z_products p');  
      $this->db->join('z_employees e','p.employee_id = e.id'); 
      $this->db->join('z_categories c','p.category_id = c.id'); 
      $this->db->join('z_brands mar','p.brand_id = mar.id'); 
      $this->db->join('z_models mo','p.model_id = mo.id'); 
      $this->db->join('hardware hard','p.hardware_id = hard.ID'); 
      $this->db->join('z_providers pro','p.provider_id = pro.id'); 
      $this->db->join('z_status_assignments stasig','p.status_assignment_id = stasig.id'); 
      $this->db->join('z_status_hardwares sthard','p.status_hardware_id = sthard.id'); 
      $this->db->join('bios bi','hard.ID = bi.HARDWARE_ID'); 
         
     return $this->db->count_all_results();  
    } 
}
?>