<?php 

class Backen_lib {
	private $CI;
	
	public function __construct() {
		$this->CI = & get_instance();
	}

	public function control(){
		if (!$this->CI->session->userdata("login")) {
			redirec(base_url());
		}
		$url = $this->CI->uri->segment(1);
		if ($this->CI->uri->segment(2)) {
			$url = $this->CI->uri->segment(1)."/".$this->CI->uri->segment(2);
		}
		$infomenu = $this->CI->Mbacken_lib->mgetID($url);
		$permisos = $this->CI->Mbacken_lib->getPermisos($infomenu->id,$this->CI->session->userdata("rol"));
		
		if ($permisos->pread == 0) {
			redirect(base_url().'Dashboard'); //index
		}else{
			return $permisos;
		}

	}
	
	
}
 ?>