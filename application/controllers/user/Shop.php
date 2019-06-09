<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Shop extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model('Model_barang');
       
    }
    
    function index()
    {   
        $barang['all'] = $this->Model_barang->M_tampil_data();
        $total=0;
        if(isset($_SESSION['cart']))
        {
            foreach($_SESSION['cart'] as $key => $data)
            {
                $total = $total+$data['Price']*$data['Qty'];
            }
            $barang['total'] = $total;
        }
        else
        {
            $barang['total'] = 0;
        }
     $this->load->view('user/user_index',$barang);
    }

    function cheeckout()
    {   $total=0;
        if(isset($_SESSION['cart']))
        {
            foreach($_SESSION['cart'] as $key => $data)
            {
                $total = $total+$data['Price']*$data['Qty'];
            }
            $data['total'] = $total;
        }
        else
        {
            $data['total'] = 0;
        }
        $this->load->view('user/checkout',$data);
    }
    

   
}