<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cproduct extends CI_Controller {
    private $permisos;

	function __construct() {
        parent:: __construct();
        if (!$this->session->userdata('login')) {
            redirect(base_url());               
        }
		$this->load->model('Mproduct'); 
        $this->permisos = $this->backen_lib->control(); //PERSMISOS
    }
	
	public function index()
	{
        $_SESSION['menus']='producto';
        $data = array(
            'permisos' => $this->permisos,//NUEVO PARA CONTROL
			'products' => $this->Mproduct->get_products(), 
		);
		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/product/list',$data);
		$this->load->view('layouts/footer');
		
	}

    public function create()
    {
        $data = array(
            'employees'     => $this->Mbacken_lib->get_combo('z_employees'),
            'categories'    => $this->Mbacken_lib->get_combo('z_categories'),
            'brands'        => $this->Mbacken_lib->get_combo('z_brands'),
            'hardwares'     => $this->Mbacken_lib->get_combo_hardware(),
        );
        $this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/product/add',$data);
		$this->load->view('layouts/footer');
    }

   
    public function store()
    {
        $txtname    = $this->input->post('txtname');
        $txtbrand_id= $this->input->post('txtbrand_id');
        $txtstatus  = $this->input->post('txtstatus');
        $this->form_validation->set_rules('txtname','nombre','required|is_unique[z_products.name]');
            if ($this->form_validation->run()) {
                    $data = array(
                        'name'      =>$txtname ,
                        'brand_id'  =>$txtbrand_id ,
                        'status'    => $txtstatus,
                        'created_at'=> date('Y-m-d H:i:s') ,
                    );    
                $res = $this->Mproduct->store_products($data);    
                if ($res) {
                    $this->session->set_flashdata('correcto','Se Guardo Correctamente');
                    redirect(base_url().'maintenance/Cproduct');
                }else{
                    $this->session->set_flashdata('error','No se pudo guardar la categoria');
                    redirect(base_url().'maintenance/Cproduct');
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
            'product' => $this->Mproduct->edit_products($id)
        ];
        $this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/product/edit',$data);
		$this->load->view('layouts/footer');
    }

    
    public function update()
    {
        $txtidproduct     = $this->input->post('txtidproduct');
        $txtbrand_id    = $this->input->post('txtbrand_id');
		$txtname        = $this->input->post('txtname');
        $txtstatus      = $this->input->post('txtstatus');

        $actual = $this->Mproduct->edit_products($txtidproduct);

        if ($txtname == $actual->name) {
            $unique = '';
        }else{
            $unique = '|is_unique[z_products.name]';
        }
        $this->form_validation->set_rules('txtname','nombre','required'.$unique);

            if ($this->form_validation->run()) {
                $data = array(
                    'name'      =>$txtname ,
                    'status'    => $txtstatus,
                    'brand_id'  =>$txtbrand_id,
                    'updated_at'=> date('Y-m-d H:i:s') ,
                ); 
                $res = $this->Mproduct->update_products($txtidproduct,$data);
                 if ($res) {
                    $this->session->set_flashdata('correcto','Se Guardo Correctamente');
                	redirect(base_url().'maintenance/Cproduct');
                }else{
                	$this->session->set_flashdata('error','No se pudo actualizar la categoria');
                	redirect(base_url().'maintenance/Cproduct/edit'.$txtidproduct);
                }
            }else{
            $this->edit($txtidproduct);
            }
    }

   
    public function destroy($id)
    {
        $actual = $this->Mproduct->edit_products($id);
        $data = array(
            'name'   =>$actual->name.date('Y-m-d H:i:s') ,
            'status' =>"0" ,
        );
        $this->Mproduct->update_products($id,$data);
        echo "maintenance/Cproduct";
    }
    public function get_combo_model() {
        $id_brand = $this->input->post('id');
        //echo $id_brand;
        if($id_brand){   
            
            $models =$this->Mproduct->get_combo_models('z_models',$id_brand);
           echo json_encode($models);

            //var_dump($models) ;
            //die();
        }
        
        //var_dump($models) ;
        //die();
        
        //    echo '<option value="0">Seleccione ....</option>';
        //    foreach($models as $model){
        //        echo '<option value="'. $model->id .'">'. $model->name.'</option>';
        //    }
        //}  else {
        //    echo '<option value="0">Seleccione ....</option>';
        //}
    }
}
