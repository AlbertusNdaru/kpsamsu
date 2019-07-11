<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model('Model_barang');
        $this->load->model('Model_penjualan');
        $this->load->model('Model_user');
        $this->load->model('Model_member');
    }
    
    function loginuser()
    {
        if(isset($_SESSION['userdata']))
        {
            redirect('user/Shop');
        }
        else
        { 
            $this->load->view('user/Login');
        }
    }

    function logincekout()
    {
        $this->load->view('user/Login');
    }

    function viewFormRegister()
    {
        $this->load->view('user/register');
    }

    function viewForegetPassword()
    {
        $email = $this->input->get('email');
        $data['record'] = $this->Model_member->getDataMemberbyEmail($email);
        $this->load->view('user/forgetpassword',$data);
    }

    function login()
    {

        $email    = $this->input->post('email');
        $password = $this->input->post('pass');
        if (ceklastloginuser($email))
            {
            $hasil=  $this->Model_user->loginuser($email,$password);
            if (isset($_SESSION['cart']) && isset($_SESSION['userdata']))
            {
                $datatransaksi = $this->session->userdata('cart');
                foreach($datatransaksi as $data)
                {
                    $this->Model_penjualan->addDetailFromCart($data);
                }
            }
            if($hasil==0)
            {   
                $this->session->set_flashdata('Status','Email & Password Tidak Cocok');
                redirect('user/Login/loginuser');
        
            }
            else if($hasil==1)
            {
                $this->session->set_flashdata('Status','Akun telah digunakan untuk Login');
                redirect('user/Login/loginuser');
            }
            else if($hasil==2)
            {
                $this->session->set_flashdata('Status','Akun terblokir. SIlahkan klik lupa password');
                redirect('user/Login/loginuser');
            }
            else 
            {
                redirect('user/Shop');
            }
        }else {
            $this->session->set_flashdata('Status','Email Tidak Terdaftar');
            redirect('user/Login/loginuser');
        }
    }

    function logout()
    {
        $this->db->query("update member set isLogin='N', FailedLogin=0, lastlogin=0 where Id='".$_SESSION['userdata']->Id."'") ;
        $this->emptychartfromlogin();
        $this->session->sess_destroy();
        redirect('user/Shop');
    }

    function register()
    {
        $Member_name = $_POST['name_member'];
        $Address     = $_POST['alamat'];
        $City        = $_POST['city_destination'];
        $Province    = $_POST['province_destination'] ;
        $Email       = $_POST['email'];
        $Password    = $_POST['pass'];
        $Question    = $_POST['pertanyaan'];
        $Answer      = $_POST['jawaban'];
        $datauser = array(
                            'Member_name' => $Member_name,
                            'Address'     => $Address,
                            'Email'       => $Email,
                            'Password'    => $Password,
                            'Question'    => $Question,
                            'Answer'      => $Answer,
                            'City'        => $City,
                            'Province'    => $Province,
                            'Question'    => $Question);
        $hasil=  $this->Model_user->registeruser($datauser); 
        if($hasil==1)
        {
            $this->session->set_flashdata('Status','Email Sudah Terdaftar');
            redirect('user/Login/viewFormRegister');
        }
        else
        {
            redirect('user/Login/loginuser');
        }
    }

    function emptychartfromlogin()
    {
        unset($_SESSION['cart']);
        $Member_id = $_SESSION['userdata']->Id;
        $this->Model_penjualan->emptychartfromlogin($Member_id);
    }

    function cekJawaban()
    {
        $Email      = $this->input->post('email');
        $Pertanyaan = $this->input->post('pertanyaan');
        $Jawaban    = $this->input->post('jawaban');
        $filter = array (
            'Email'    => $Email,
            'Question' => $Pertanyaan,
            'Answer'   => $Jawaban
        );
        $data = $this->Model_member->cekjawaban($filter);
        if($data)
        {
            echo "true";
        }
        else 
        {
            echo "false";
        }
    
    }
    function cekEmail()
    {
        $Email      = $this->input->post('email');
        $filter = array (
            'Email'    => $Email
        );
        $data = $this->Model_member->cekEmail($filter);
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
        $Email   = $this->input->post('email');
        $Password   = $this->input->post('password');
        $data = array(
            'Password'=>$Password,
            'Update_at'=> get_current_date()
            );
        $Update = $this->Model_member->updatePassword($data,$Email);
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