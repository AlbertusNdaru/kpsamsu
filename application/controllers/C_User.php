<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_User extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('Model_barang');

	}

	function index()
    {     
		$data['all'] = $this->Model_barang->M_tampil_data();
        $this->load->view('user/user_index',$data);
    }

    

}
