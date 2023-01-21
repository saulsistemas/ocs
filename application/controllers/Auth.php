<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	function __construct() {
        parent:: __construct();
		$this->load->model('User'); 
    }
	
	public function index()
	{
        if ($this->session->userdata('login') ) { //variable de session Login = TRUE
			redirect(base_url().'Dashboard');				
		}else{
            $this->load->view('admin/login');
        }
		
	}

    public function login(){
		//$res    = $this->User->login($this->input->post('txtusername'),sha1($this->input->post('txtpassword')));
		$res    = $this->User->login($this->input->post('txtusername'),$this->input->post('txtpassword'));
        if (!$res) {
            $this->session->set_flashdata('error','El Usuario y/o Contraseña sonn incorrectas');
            redirect(base_url());
         }else{
             $data = [ //DATOS PARA DASHBOARD
                         'idempresa' => $this->input->post('txtidempresa'),
                         'idusuario' => $res ->id, 
                         'nombres'   => $res ->name." ".$res->last_name, 
                         'rol'     => $res ->rol_id,
                         'login'     => TRUE, 
             ];
             $this->session->set_userdata($data);
             redirect(base_url().'Dashboard');
         }	

        
     
	}
    public function logout(){
        $this->session->sess_destroy();
        redirect(base_url());
    } 
}
