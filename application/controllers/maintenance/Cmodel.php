<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cmodel extends CI_Controller {
    private $permisos;

	function __construct() {
        parent:: __construct();
        if (!$this->session->userdata('login')) {
            redirect(base_url());               
        }
		$this->load->model('Mmodel'); 
        $this->permisos = $this->backen_lib->control(); //PERSMISOS
    }
	
	public function index()
	{
      
        $data = array(
            'permisos' => $this->permisos,//NUEVO PARA CONTROL
			'models' => $this->Mmodel->get_models(), 
		);
		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/model/list',$data);
		$this->load->view('layouts/footer');
		
	}

    public function create()
    {
        $data = array(
            'brands' => $this->Mbacken_lib->get_combo('z_brands'),
        );
        $this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/model/add',$data);
		$this->load->view('layouts/footer');
    }

   
    public function store()
    {
        $txtname    = $this->input->post('txtname');
        $txtbrand_id= $this->input->post('txtbrand_id');
        $txtstatus  = $this->input->post('txtstatus');
        $this->form_validation->set_rules('txtname','nombre','required|is_unique[z_models.name]');
            if ($this->form_validation->run()) {
                    $data = array(
                        'name'      =>$txtname ,
                        'brand_id'  =>$txtbrand_id ,
                        'status'    => $txtstatus,
                        'created_at'=> date('Y-m-d H:i:s') ,
                    );    
                $res = $this->Mmodel->store_models($data);    
                if ($res) {
                    $this->session->set_flashdata('correcto','Se Guardo Correctamente');
                    redirect(base_url().'maintenance/Cmodel');
                }else{
                    $this->session->set_flashdata('error','No se pudo guardar la categoria');
                    redirect(base_url().'maintenance/Cmodel');
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
            'brands' => $this->Mbacken_lib->get_combo('z_brands'),
            'model' => $this->Mmodel->edit_models($id)
        ];
        $this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/model/edit',$data);
		$this->load->view('layouts/footer');
    }

    
    public function update()
    {
        $txtidmodel     = $this->input->post('txtidmodel');
        $txtbrand_id    = $this->input->post('txtbrand_id');
		$txtname        = $this->input->post('txtname');
        $txtstatus      = $this->input->post('txtstatus');

        $actual = $this->Mmodel->edit_models($txtidmodel);

        if ($txtname == $actual->name) {
            $unique = '';
        }else{
            $unique = '|is_unique[z_models.name]';
        }
        $this->form_validation->set_rules('txtname','nombre','required'.$unique);

            if ($this->form_validation->run()) {
                $data = array(
                    'name'      =>$txtname ,
                    'status'    => $txtstatus,
                    'brand_id'  =>$txtbrand_id,
                    'updated_at'=> date('Y-m-d H:i:s') ,
                ); 
                $res = $this->Mmodel->update_models($txtidmodel,$data);
                 if ($res) {
                    $this->session->set_flashdata('correcto','Se Guardo Correctamente');
                	redirect(base_url().'maintenance/Cmodel');
                }else{
                	$this->session->set_flashdata('error','No se pudo actualizar la categoria');
                	redirect(base_url().'maintenance/Cmodel/edit'.$txtidmodel);
                }
            }else{
            $this->edit($txtidmodel);
            }
    }

   
    public function destroy($id)
    {
        $actual = $this->Mmodel->edit_models($id);
        $data = array(
            'name'   =>$actual->name.date('Y-m-d H:i:s') ,
            'status' =>"0" ,
        );
        $this->Mmodel->update_models($id,$data);
        echo "maintenance/Cmodel";
    }
}
