<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_User extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('Model_barang');
		$this->load->model('Model_carousel');

	}

	function index()
    {     
		$data['all'] = $this->Model_barang->M_productFeatured_all();
		$data['man'] = $this->Model_barang->M_productFeatured_Man();
		$data['woman'] = $this->Model_barang->M_productFeatured_Woman();
		$data['carousel'] = $this->Model_carousel->M_tampil_data();
        $this->load->view('user/user_index',$data);
    }

    

}
