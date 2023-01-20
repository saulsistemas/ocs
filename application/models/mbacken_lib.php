<?php
class Mbacken_lib extends CI_Model{

  
  
  public function getTable($table){      
    $resultado = $this->db->get($table); 
    return $resultado->result(); 
  }


  public function getGraphic($campo,$estado){  

    if($estado==0){
      $query ='SELECT '.$campo.', count(HARDWARE_ID) cantidad FROM accountinfo  GROUP BY '.$campo.';';   
    }else{
      $query ='SELECT '.$campo.', count(HARDWARE_ID) cantidad FROM accountinfo WHERE fields_12= '.$estado.' GROUP BY '.$campo.';';        
    }   
    $resultado = $this->db->query($query);      
    return $resultado->result();  
  }
 

}
?>