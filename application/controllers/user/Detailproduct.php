<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Detailproduct extends CI_Controller
{
    function __construct() {
        parent::__construct();
        $this->load->model('Model_barang');
        $this->load->model('Model_penjualan');
        
    }

    function viewDetailProduct($Id)
    {
        $barang['record'] = $this->Model_barang->M_tampil_data_by_id($Id);
        $total         = 0;
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
        $this->load->view('user/detailproduct',$barang);
    }

}
?>