<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cbrand extends CI_Controller {
    private $permisos;

	function __construct() {
        parent:: __construct();
        if (!$this->session->userdata('login')) {
            redirect(base_url());               
        }
		$this->load->model('Mbrand'); 
        $this->permisos = $this->backen_lib->control(); //PERSMISOS
    }
	
	public function index()
	{
        $_SESSION['menus']='marca';
        $data = array(
            'permisos' => $this->permisos,//NUEVO PARA CONTROL
			'brands' => $this->Mbrand->get_brands(), 
		);
		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/brand/list',$data);
		$this->load->view('layouts/footer');
		
	}

    public function create()
    {
        $this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/brand/add');
		$this->load->view('layouts/footer');
    }

   
    public function store()
    {
        $txtname    = $this->input->post('txtname');
        $txtstatus  = $this->input->post('txtstatus');
        $this->form_validation->set_rules('txtname','nombre','required|is_unique[z_brands.name]');
            if ($this->form_validation->run()) {
                    $data = array(
                        'name'      =>$txtname ,
                        'status'    => $txtstatus,
                        'created_at'=> date('Y-m-d H:i:s') ,
                    );    
                $res = $this->Mbrand->store_brands($data);    
                if ($res) {
                    $this->session->set_flashdata('correcto','Se Guardo Correctamente');
                    redirect(base_url().'maintenance/Cbrand');
                }else{
                    $this->session->set_flashdata('error','No se pudo guardar la categoria');
                    redirect(base_url().'maintenance/Cbrand');
                }//FIN GUARDAR
            
            }else{
                $this->create();
            }

    }

   
    public function show()
    {
        //
    }

   
    public function edit($id)
    {
        $data = [
            'brand' => $this->Mbrand->edit_brands($id)
        ];
        $this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/brand/edit',$data);
		$this->load->view('layouts/footer');
    }

    
    public function update()
    {
        $txtidbrand  = $this->input->post('txtidbrand');
		$txtname        = $this->input->post('txtname');
        $txtstatus      = $this->input->post('txtstatus');

        $actual = $this->Mbrand->edit_brands($txtidbrand);

        if ($txtname == $actual->name) {
            $unique = '';
        }else{
            $unique = '|is_unique[z_brands.name]';
        }
        $this->form_validation->set_rules('txtname','nombre','required'.$unique);

            if ($this->form_validation->run()) {
                $data = array(
                    'name'      =>$txtname ,
                    'status'    => $txtstatus,
                    'updated_at'=> date('Y-m-d H:i:s') ,
                ); 
                $res = $this->Mbrand->update_brands($txtidbrand,$data);
                 if ($res) {
                    $this->session->set_flashdata('correcto','Se Guardo Correctamente');
                	redirect(base_url().'maintenance/Cbrand');
                }else{
                	$this->session->set_flashdata('error','No se pudo actualizar la categoria');
                	redirect(base_url().'maintenance/Cbrand/edit'.$txtidbrand);
                }
            }else{
            $this->edit($txtidbrand);
            }
    }

   
    public function destroy($id)
    {
        $actual = $this->Mbrand->edit_brands($id);
        $data = array(
            'name'   =>$actual->name.date('Y-m-d H:i:s') ,
            'status' =>"0" ,
        );
        $this->Mbrand->update_brands($id,$data);
        echo "maintenance/Cbrand";
    }
}
