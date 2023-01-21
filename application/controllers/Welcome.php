<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct() {
        parent:: __construct();
        
		$this->load->model('Mbacken_lib'); 
		//$this->load->model('mingreso'); 
    }
	
	public function index()
	{
		$estado1 = $this->input->post("estado1");
		if ($estado1) {
			$estado =$estado1;
		}else{
			$estado=0;
		}
		$data=[];
		$data = array(
			'harwares' 		=> $this->Mbacken_lib->getTable("hardware"),
			'accountinfos' 	=> $this->Mbacken_lib->getTable("accountinfo"),
			'estatus' => $estado,
		);
		$campo ='fields_5';
	

		$datos= $this->Mbacken_lib->getGraphic($campo,$estado);
		
        foreach ($datos as $key=>$dato) {

			if ($campo =='fields_5') {
				//var_dump($dato->$campo);
				if ($dato->$campo == 1){ $nombre = "SAN_BORJA";}elseif($dato->$campo == 2){$nombre = "AREQUIPA";}elseif($dato->$campo == 3){$nombre = "CHICLAYO";}elseif($dato->$campo == 4){$nombre = "CUSCO";}elseif($dato->$campo == 5){$nombre = "HUANCAYO";}elseif($dato->$campo == 6){$nombre = "PIURA";}elseif($dato->$campo == 7){$nombre = "PPAL";}elseif($dato->$campo == 8){$nombre = "PUCALLPA";}elseif($dato->$campo == 9){$nombre = "PVEN";}elseif($dato->$campo == 9){$nombre = "TRUJILLO";}else{$nombre = "NO ASIGNADO";}
			}elseif($campo =='fields_6'){
				if ($dato->$campo == 1){ $nombre = "ALL IN ONE";}elseif($dato->$campo == 2){$nombre = "CELULAR";}elseif($dato->$campo == 3){$nombre = "DESKTOP";}elseif($dato->$campo == 4){$nombre = "IMPRESORA";}elseif($dato->$campo == 5){$nombre = "LAPTOP";}elseif($dato->$campo == 6){$nombre = "MONITOR";}elseif($dato->$campo == 7){$nombre = "SERVIDOR";}elseif($dato->$campo == 8){$nombre = "TABLET";}else{$nombre = "NO ASIGNADO";}
			}
			elseif($campo =='fields_7'){
				if ($dato->$campo == 1){ $nombre = "ALQUILADO";}elseif($dato->$campo == 2){$nombre = "PROPIO";}else{$nombre = "NO ASIGNADO";}
			}
			elseif($campo =='fields_8'){
				$nombre= $dato->$campo;
			}
			elseif($campo =='fields_9'){
				if ($dato->$campo == 1){ $nombre = "DELL";}elseif($dato->$campo == 2){$nombre = "EPSON";}elseif($dato->$campo == 3){$nombre = "HP";}elseif($dato->$campo == 4){$nombre = "LENOVO";}elseif($dato->$campo == 5){$nombre = "RICOH";}elseif($dato->$campo == 6){$nombre = "IPHONE";}elseif($dato->$campo == 7){$nombre = "MOTOROLA";}elseif($dato->$campo == 8){$nombre = "SAMSUNG";}else{$nombre = "NO ASIGNADO";}
			}
			elseif($campo =='fields_10'){
				$nombre= $dato->$campo;
			}
            $data['campo'][] = $nombre;
            $data['cantidad'][] = $dato->cantidad;
            
        }

		$campo1 ='fields_10';
		$datos1= $this->Mbacken_lib->getGraphic($campo1,$estado);
		foreach ($datos1 as $key=>$dato1) {
			if ($campo1 =='fields_5') {
				if ($dato1->$campo1 == 1){ $nombre1 = "SAN_BORJA";}elseif($dato1->$campo1 == 2){$nombre1 = "AREQUIPA";}elseif($dato1->$campo1 == 3){$nombre1 = "CHICLAYO";}elseif($dato1->$campo1 == 4){$nombre1 = "CUSCO";}elseif($dato1->$campo1 == 5){$nombre1 = "HUANCAYO";}elseif($dato1->$campo1 == 6){$nombre1 = "PIURA";}elseif($dato1->$campo1 == 7){$nombre1 = "PPAL";}elseif($dato1->$campo1 == 8){$nombre1 = "PUCALLPA";}elseif($dato1->$campo1 == 9){$nombre1 = "PVEN";}elseif($dato1->$campo1 == 9){$nombre1 = "TRUJILLO";}else{$nombre1 = "NO ASIGNADO";}
			}elseif($campo1 =='fields_6'){
				if ($dato1->$campo1 == 1){ $nombre1 = "ALL IN ONE";}elseif($dato1->$campo1 == 2){$nombre1 = "CELULAR";}elseif($dato1->$campo1 == 3){$nombre1 = "DESKTOP";}elseif($dato1->$campo1 == 4){$nombre1 = "IMPRESORA";}elseif($dato1->$campo1 == 5){$nombre1 = "LAPTOP";}elseif($dato1->$campo1 == 6){$nombre1 = "MONITOR";}elseif($dato1->$campo1 == 7){$nombre1 = "SERVIDOR";}elseif($dato1->$campo1 == 8){$nombre1 = "TABLET";}else{$nombre1 = "NO ASIGNADO";}
			}
			elseif($campo1 =='fields_7'){
				if ($dato1->$campo1 == 1){ $nombre1 = "ALQUILADO";}elseif($dato1->$campo1 == 2){$nombre1 = "PROPIO";}else{$nombre1 = "NO ASIGNADO";}
			}
			elseif($campo1 =='fields_8'){
				$nombre1= $dato1->$campo1;
			}
			elseif($campo1 =='fields_9'){
				if ($dato1->$campo1 == 1){ $nombre1 = "DELL";}elseif($dato1->$campo1 == 2){$nombre1 = "EPSON";}elseif($dato1->$campo1 == 3){$nombre1 = "HP";}elseif($dato1->$campo1 == 4){$nombre1 = "LENOVO";}elseif($dato1->$campo1 == 5){$nombre1 = "RICOH";}elseif($dato1->$campo1 == 6){$nombre1 = "IPHONE";}elseif($dato1->$campo1 == 7){$nombre1 = "MOTOROLA";}elseif($dato1->$campo1 == 8){$nombre1 = "SAMSUNG";}else{$nombre1 = "NO ASIGNADO";}
			}
			elseif($campo1 =='fields_10'){
				$nombre1= $dato1->$campo1;
			}
            $data['campo1'][] = $nombre1;
            $data['cantidad1'][] = $dato1->cantidad;
            
        }

		$campo2 ='fields_6';
		$datos2= $this->Mbacken_lib->getGraphic($campo2,$estado);
		foreach ($datos2 as $key=>$dato2) {
			if ($campo2 =='fields_5') {
				if ($dato2->$campo2 == 1){ $nombre2 = "SAN_BORJA";}elseif($dato2->$campo2 == 2){$nombre2 = "AREQUIPA";}elseif($dato2->$campo2 == 3){$nombre2 = "CHICLAYO";}elseif($dato2->$campo2 == 4){$nombre2 = "CUSCO";}elseif($dato2->$campo2 == 5){$nombre2 = "HUANCAYO";}elseif($dato2->$campo2 == 6){$nombre2 = "PIURA";}elseif($dato2->$campo2 == 7){$nombre2 = "PPAL";}elseif($dato2->$campo2 == 8){$nombre2 = "PUCALLPA";}elseif($dato2->$campo2 == 9){$nombre2 = "PVEN";}elseif($dato2->$campo2 == 9){$nombre2 = "TRUJILLO";}else{$nombre2 = "NO ASIGNADO";}
			}elseif($campo2 =='fields_6'){
				if ($dato2->$campo2 == 1){ $nombre2 = "ALL IN ONE";}elseif($dato2->$campo2 == 2){$nombre2 = "CELULAR";}elseif($dato2->$campo2 == 3){$nombre2 = "DESKTOP";}elseif($dato2->$campo2 == 4){$nombre2 = "IMPRESORA";}elseif($dato2->$campo2 == 5){$nombre2 = "LAPTOP";}elseif($dato2->$campo2 == 6){$nombre2 = "MONITOR";}elseif($dato2->$campo2 == 7){$nombre2 = "SERVIDOR";}elseif($dato2->$campo2 == 8){$nombre2 = "TABLET";}else{$nombre2 = "NO ASIGNADO";}
			}
			elseif($campo2 =='fields_7'){
				if ($dato2->$campo2 == 1){ $nombre2 = "ALQUILADO";}elseif($dato2->$campo2 == 2){$nombre2 = "PROPIO";}else{$nombre2 = "NO ASIGNADO";}
			}
			elseif($campo2 =='fields_8'){
				$nombre2= $dato2->$campo2;
			}
			elseif($campo2 =='fields_9'){
				if ($dato2->$campo2 == 1){ $nombre2 = "DELL";}elseif($dato2->$campo2 == 2){$nombre2 = "EPSON";}elseif($dato2->$campo2 == 3){$nombre2 = "HP";}elseif($dato2->$campo2 == 4){$nombre2 = "LENOVO";}elseif($dato2->$campo2 == 5){$nombre2 = "RICOH";}elseif($dato2->$campo2 == 6){$nombre2 = "IPHONE";}elseif($dato2->$campo2 == 7){$nombre2 = "MOTOROLA";}elseif($dato2->$campo2 == 8){$nombre2 = "SAMSUNG";}else{$nombre2 = "NO ASIGNADO";}
			}
			elseif($campo2 =='fields_10'){
				$nombre2= $dato2->$campo2;
			}
            $data['campo2'][] = $nombre2;
            $data['cantidad2'][] = $dato2->cantidad;
            
        }

		$data['data']= json_encode($data);
		$this->load->view('welcome_message',$data);
	}
}
