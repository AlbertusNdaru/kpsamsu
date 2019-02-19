<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_type extends CI_Controller {
	function __construct() {
		parent::__construct();
        $this->load->model('Model_barang');
        $this->load->model('Model_kategori');
	}

    function index()
    {     
        $data['record']     =    $this->Model_barang->tampil_data_type();
        $this->template->load('template','admin/product_type/view_product_type',$data);
    }
    
    function viewAddProductType()
    {
        $this->template->load('template','admin/product_type/input_product_type');
    }

    function addType()
    {
        $typename    = $this->input->post('typename');
        $description = $this->input->post('description');
        $sizetype    = $this->input->post('type');
        $dataType    = array('Type_name'=>$typename,'Description'=>$description,'Size_type'=>$sizetype);
        $insert      = $this->Model_barang->M_addType($dataType);
        if($insert)
        {
            $this->session->set_flashdata('Status','Input Succes');
            redirect('admin/Product_type');
        }
        else
        {
            $this->session->set_flashdata('Status','Input Failed');
            redirect('admin/Product_type');
        }
    }
}
