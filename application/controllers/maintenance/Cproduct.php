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
		);
		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/product/list',$data);
		$this->load->view('layouts/footer');
		
	}

    function fetch_user(){  
           
        $fetch_data = $this->Mproduct->selectdatatable();  
        $data = array();  
        foreach($fetch_data as $row)  
        {  
             $sub_array = array(); 
             $sub_array[] = $row->id;   
             $sub_array[] = $row->codigo_empleado;
             $sub_array[] = $row->empleado;  
             $sub_array[] = $row->categoria;  
             $sub_array[] = $row->marca; 
             $sub_array[] = $row->modelo; 
             $sub_array[] = $row->serial; 
             $sub_array[] = $row->OSNAME; 
             $sub_array[] = $row->PROCESSORT; 
             $sub_array[] = $row->MEMORY; 
             $sub_array[] = $row->host_name; 
             $sub_array[] = $row->proveedor; 
             $sub_array[] = $row->estado1; 
             $sub_array[] = $row->estado2; 
                $info='<button type="button" class="btn btn-info btn-view-ticket btn-flat" data-toggle="modal" data-target="#modal-default" value="'.$row->id.'">
                            <span class="fa fa-print"></span>                                       
                        </button>'  ;          
                if ($this->permisos->pupdate == 1) {
                    $update= '<td><a href="'.base_url().'maintenance/Cproduct/edit/'.$row->id.'"" class="btn btn-warning btn-flat">  <span class="fa fa-pencil"></span></a>';
                }else{$update='';}
                if ($this->permisos->pdelete == 1) {
                    $delete = '<a href="'.base_url().'maintenance/Cproduct/destroy/'.$row->id.'"" class="btn btn-danger btn-remove btn-flat">  <span class="fa fa-remove"></span></a></td>';  
                }else{$delete='';}

            $sub_array[]=$info.$update.$delete;
            $data[] = $sub_array;  
        }  
        $output = array(  
             "draw"            =>     intval($_POST["draw"]),  
             "recordsTotal"    =>     $this->Mproduct->get_all_data(),  
             "recordsFiltered" =>     $this->Mproduct->get_filtered_data(),  
             "data"            =>     $data  
        );  

        echo json_encode($output);  
   }

    public function create()
    {
        $data = array(
            'employees'             => $this->Mbacken_lib->get_combo('z_employees'),
            'categories'            => $this->Mbacken_lib->get_combo('z_categories'),
            'brands'                => $this->Mbacken_lib->get_combo('z_brands'),
            'hardwares'             => $this->Mbacken_lib->get_combo_hardware(),
            'providers'             => $this->Mbacken_lib->get_combo('z_providers'),
            'status_assignments'    => $this->Mbacken_lib->get_combo('z_status_assignments'),
            'status_hardwares'      => $this->Mbacken_lib->get_combo('z_status_hardwares'),
        );
        $this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/product/add',$data);
		$this->load->view('layouts/footer');
    }

   
    public function store()
    {
        $txtemployee_id         =$this->input->post('txtemployee_id'); 
        $txthardware_id         =$this->input->post('txthardware_id'); 
        $txtcategory_id         =$this->input->post('txtcategory_id'); 
        $txtbrand_id            =$this->input->post('txtbrand_id'); 
        $txtmodel_id            =$this->input->post('txtmodel_id'); 
        $txtacquisition         =$this->input->post('txtacquisition'); 
        $txtnetwork             =$this->input->post('txtnetwork'); 
        $txtantivirus           =$this->input->post('txtantivirus'); 
        $txtprovider_id         =$this->input->post('txtprovider_id'); 
        $txtstatus_assignment_id=$this->input->post('txtstatus_assignment_id'); 
        $txtstatus_hardware_id  =$this->input->post('txtstatus_hardware_id'); 
        $txtdate_validation     =$this->input->post('txtdate_validation'); 
        $txtcod_inventory       =$this->input->post('txtcod_inventory'); 
        $txtdate_update         =$this->input->post('txtdate_update'); 
        $txtdate_devolution     =$this->input->post('txtdate_devolution'); 
        $txtreferencia1         =$this->input->post('txtreferencia1'); 
        $txtreferencia2         =$this->input->post('txtreferencia2'); 
        $txtreferencia3         =$this->input->post('txtreferencia3'); 
        $txtcomment             =$this->input->post('txtcomment');

            $data = array(
                'employee_id'           =>$txtemployee_id,
                'hardware_id'           =>$txthardware_id,
                'category_id'           =>$txtcategory_id,
                'brand_id'              =>$txtbrand_id,
                'model_id'              =>$txtmodel_id,
                'acquisition'           =>$txtacquisition,
                'network'               =>$txtnetwork,
                'antivirus'             =>$txtantivirus,
                'provider_id'           =>$txtprovider_id,
                'status_assignment_id'  =>$txtstatus_assignment_id,
                'status_hardware_id'    =>$txtstatus_hardware_id,
                'date_validation'       =>$txtdate_validation,
                'cod_inventory'         =>$txtcod_inventory,
                'date_update'           =>$txtdate_update,
                'date_devolution'       =>$txtdate_devolution,
                'referencia1'           =>$txtreferencia1,
                'referencia2'           =>$txtreferencia2,
                'referencia3'           =>$txtreferencia3,
                'comment'               =>$txtcomment,
                'ocs_local'             =>0,
                'status'                =>'HABILITADO',
                'user_created'          =>$this->session->userdata('idusuario'),
                'created_at'            =>date('Y-m-d H:i:s') ,
            );    

            $res = $this->Mproduct->store_products($data); 
            $hard = $this->Mproduct->update_hardware($txthardware_id,array('CATEGORY_ID' =>1));  
            if ($res) {
                $this->session->set_flashdata('correcto','Se Guardo Correctamente');
                redirect(base_url().'maintenance/Cproduct');
            }else{
                $this->session->set_flashdata('error','No se pudo guardar la categoria');
                redirect(base_url().'maintenance/Cproduct');
            }//FIN GUARDAR
            
            

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
