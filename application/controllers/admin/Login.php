<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model('Model_login');
        
    }

    function loginadmin()
    {
      
        if(isset($_SESSION['userdata']))
           {
               redirect('admin/product');
           }
        else
            { 
                $this->load->view('admin/login');
            }
    }

    function viewregister()
    {
        $data['usergroup'] = $this->Model_login->M_selectusergrup();
        $this->load->view('admin/registeradmin',$data);
    }

    function register()
    {
        // proses login disini
        $username   =   $this->input->post('username');
        $password   =   $this->input->post('password');
        $usergrup    =   $this->input->post('usergrup');
        $datauser = array('Usergrup_id'=>$usergrup,'Username'=>$username,'Password'=>$password);
        $hasil=  $this->Model_login->M_inputadmin($datauser); 
        redirect('admin/Login/loginadmin');
    }
    
    function login()
    {
            $username   =   $this->input->post('username');
            $password   =   $this->input->post('password');
            if(ceklastlogin($username))
            {
                $hasil=  $this->Model_login->M_login($username,$password);
                if($hasil==3)
                {   
                    redirect('admin/Product');
                }
                else
                {
                    $this->session->set_flashdata('Error','Username and Password Incorect'); 
                    redirect('admin/Login/loginadmin');
                }
            }
    }
    
    
    function logout()
    {
        $this->db->query("update user set IsLogin=0 where Id=".$_SESSION['userdata']->Id."") ;
        $this->session->sess_destroy();
        redirect('admin/Login/loginadmin');
    }

    
   
    function lupapasswordadmin()
    {
        $id_user=$this->input->post('id_user');
        $hasil = $this->Model_operator->getUser($id_user)->row();
        echo json_encode($hasil);
    }

    function resetadmin()
    {
        $i=$this->input->post('id_user');
        $p=$this->input->post('pertanyaannya');
        $j=$this->input->post('jawabannya');
        $hasil = $this->Model_operator->getUserCek($i,$p,$j)->num_rows();
        echo $hasil;

    }

    function resetpassadmin()
    {
        $i=$this->input->post('id_user');
        $p=$this->input->post('passbaru');

        $this->Model_operator->resetpasswordbaru($i,$p);
        echo 1;

    }


    function daftar()
    {
        $this->load->view('form_daftar');
    }

    function lupapassword()
    {
        $this->load->view('userinterface/form_lupapassword');
    }
    function lupapasswordadminview()
    {
        $this->load->view('form_adminlupapassword');
    }

    function daftaruser()
    {
        $this->load->view('userinterface/form_daftaruser');
    }

    function selectidkaryawan()
    {
        echo json_encode($this->Model_user->getKaryawan());
    }
}