<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {
	function __construct() {
		parent::__construct();
        $this->load->model('Model_member');
        $this->load->model('Model_penjualan_admin');
        isLoginSessionExpired();
	}

	function index()
    {     
        if (ceksession())
        {
            $data['record']    = $this->Model_member->getDataMember();
            $data['transaksi'] = $this->Model_penjualan_admin->cekpenjualan();
            $this->template->load('template','admin/member/view_member',$data);
        }
    }


    function deleteMember($id)
    {
        if (ceksession())
        {
            $delete=$this->Model_member->deleteMember()($id);
            if($delete)
            {
                $this->session->set_flashdata('Status','Delete Succes');
                redirect('admin/Member');
            }
            else
            {
                $this->session->set_flashdata('Status','Delete Failed');
                redirect('admin/Member');
            }
        }
    }
}
