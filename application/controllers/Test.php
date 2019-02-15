<?php
class Test extends CI_Controller{
    
    function __construct() {
        parent::__construct();         
        $this->load->model('Model_barang');
    }

    function index()
    {
       
        $data['record']     =    $this->Model_barang->tampilkan_data();
        $this->template->load('template','admin/product/view_product',$data);
    }
   
}