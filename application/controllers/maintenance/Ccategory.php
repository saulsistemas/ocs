<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ccategory extends CI_Controller {
    private $permisos;

	function __construct() {
        parent:: __construct();
        if (!$this->session->userdata('login')) {
            redirect(base_url());               
        }
		$this->load->model('Mcategory'); 
        $this->permisos = $this->backen_lib->control(); //PERSMISOS
    }
	
	public function index()
	{
      
        $data = array(
            'permisos' => $this->permisos,//NUEVO PARA CONTROL
			'categories' => $this->Mcategory->get_categories(), 
		);
		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/category/list',$data);
		$this->load->view('layouts/footer');
		
	}

    public function create()
    {
        $this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/category/add');
		$this->load->view('layouts/footer');
    }

   
    public function store()
    {
        $txtname    = $this->input->post('txtname');
        $txtstatus  = $this->input->post('txtstatus');
        $this->form_validation->set_rules('txtname','nombre','required|is_unique[z_categories.name]');
            if ($this->form_validation->run()) {
                    $data = array(
                        'name'      =>$txtname ,
                        'status'    => $txtstatus,
                        'created_at'=> date('Y-m-d H:i:s') ,
                    );    
                $res = $this->Mcategory->store_categories($data);    
                if ($res) {
                    $this->session->set_flashdata('correcto','Se Guardo Correctamente');
                    redirect(base_url().'maintenance/Ccategory');
                }else{
                    $this->session->set_flashdata('error','No se pudo guardar la categoria');
                    redirect(base_url().'maintenance/Ccategory');
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
            'category' => $this->Mcategory->edit_categories($id)
        ];
        $this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/category/edit',$data);
		$this->load->view('layouts/footer');
    }

    
    public function update()
    {
        $txtidcategory  = $this->input->post('txtidcategory');
		$txtname        = $this->input->post('txtname');
        $txtstatus      = $this->input->post('txtstatus');

        $categoriaActual = $this->Mcategory->edit_categories($txtidcategory);

        if ($txtname == $categoriaActual ->name) {
            $unique = '';
        }else{
            $unique = '|is_unique[z_categories.name]';
        }
        $this->form_validation->set_rules('txtname','nombre','required'.$unique);

            if ($this->form_validation->run()) {
                $data = array(
                    'name'      =>$txtname ,
                    'status'    => $txtstatus,
                    'updated_at'=> date('Y-m-d H:i:s') ,
                ); 
                $res = $this->Mcategory->update_categories($txtidcategory,$data);
                 if ($res) {
                    $this->session->set_flashdata('correcto','Se Guardo Correctamente');
                	redirect(base_url().'maintenance/Ccategory');
                }else{
                	$this->session->set_flashdata('error','No se pudo actualizar la categoria');
                	redirect(base_url().'maintenance/Ccategory/edit'.$txtidcategory);
                }
            }else{
            $this->edit($txtidcategory);
            }
    }

   
    public function destroy($id)
    {
        $data = array(
            'status' =>"0" ,
        );
        $this->Mcategory->update_categories($id,$data);
        echo "maintenance/Ccategory";
    }
}
