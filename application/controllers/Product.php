<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('Model_barang');
	}

	function index()
    {     
        $data['record']     =    $this->Model_barang->tampil_data();
        $this->template->load('template','admin/product/view_product',$data);
    }
    
    function viewAddProduct()
    {
        $this->template->load('template','admin/product/input_product');
    }

    function viewAddProductType()
    {
        $this->template->load('template','admin/product/input_product_type');
    }

    function addType()
    {
        $typename    = $this->input->post('typename');
        $description = $this->input->post('description');
        $sizetype = $this->input->post('type');
        $dataType    = array('Type_name'=>$typename,'Description'=>$description,'Size_type'=>$sizetype);
        $insert = $this->Model_barang->M_addType($dataType);
        if($insert)
        {
            $this->session->set_flashdata('Status','Input Succes');
            redirect('Product/viewAddProductType');
        }
        else
        {
            $this->session->set_flashdata('Status','Input Failed');
            redirect('Product/viewAddProductType');
        }
    }
    
   


    public function aksi_upload($id,$files){
        $images = array();
        $config['upload_path']          = './assets/img_product/';
        $config['allowed_types']        = '*';
        $this->load->library('upload', $config);
        foreach($files['name'] as $key => $image)
        { 
            $_FILES['berkas[]']['name']= $files['name'][$key];
            $_FILES['berkas[]']['type']= $files['type'][$key];
            $_FILES['berkas[]']['tmp_name']= $files['tmp_name'][$key];
            $_FILES['berkas[]']['error']= $files['error'][$key];
            $_FILES['berkas[]']['size']= $files['size'][$key];

            //echo $dataimage->name;
               
                $config['file_name']            = 'BRG_'.get_current_date().'_'.$image;
                //$config['max_size']             = 100;
                //$config['max_width']            = 1024;
                //$config['max_height']           = 768;
        
                $this->upload->initialize($config);
        
                if ( ! $this->upload->do_upload('berkas[]')){
                    $error = array('error' => $this->upload->display_errors());
                    echo json_encode($error);
                }else{
                    $data = array('upload_data' => $this->upload->data());
                    $this->Model_barang->inserttabelproduct($id,'BRG_'.get_current_date().'_'.$image);
                    //redirect('barang');
                }

                

        }
		
        
    }

}
