<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	function __construct() {
		parent::__construct();
        $this->load->model('Model_user');
        $this->load->model('Model_penjualan_admin');
        isLoginSessionExpired();
	}

	function index()
    {     
        if (ceksession())
        {
            if ($_SESSION['userdata']->Usergrup_id == 1) { 
            $data['record']    = $this->Model_user->getAllUser();
            $data['transaksi'] = $this->Model_penjualan_admin->cekpenjualan();
            $this->template->load('template','admin/user/view_user',$data);
            }else {
                redirect('admin/product');
            }
        }
    }

    function cekJawaban()
    {
        $Username   = $this->input->post('username');
        $Pertanyaan = $this->input->post('pertanyaan');
        $Jawaban    = $this->input->post('jawaban');
        $filter = array (
            'Username'   => $Username,
            'pertanyaan' => $Pertanyaan,
            'jawaban'    => $Jawaban
        );
        $data = $this->Model_user->cekjawaban($filter);
        if($data)
        {
            echo "true";
        }
        else 
        {
            echo "false";
        }
    }

    function cekUser()
    {
        $Username   = $this->input->post('username');
        $filter = array (
            'Username'   => $Username,
        );
        $data = $this->Model_user->cekjawaban($filter);
        if($data)
        {
            echo "true";
        }
        else 
        {
            echo "false";
        }
    }

    function resetpassword()
    {
        $Username   = $this->input->post('username');
        $Password   = $this->input->post('password');
        $data = array(
            'Password'=>$Password,
            'Update_at'=> get_current_date()
            );
        $Update = $this->Model_user->updatePassword($data,$Username);
        if($Update)
        {
            echo "true";
        }
        else 
        {
            echo "false";
        }
    }

}
