<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan  extends CI_Controller {
	function __construct() {
		parent::__construct();
        $this->load->model('Model_pembelian');
        $this->load->model('Model_barang');
        $this->load->model('Model_penjualan_admin');
        isLoginSessionExpired();
    }

    function index()
    {
        if (ceksession())
        {
            $dataPenjualan['record'] = $this->Model_penjualan_admin->getDataPenjualan();
            $dataPenjualan['transaksi']  =    $this->Model_penjualan_admin->cekpenjualan();
            $this->template->load('template','admin/transaksi/view_transaksi',$dataPenjualan);
        }
    }

    function updateStatusTransaksi()
    {
        if (ceksession())
        {
            $Id = $_GET['Id'];
            $dataTransaksi= array('Stats'=>1,
                                  'Update_at' => get_current_date());
            $Validate = $this->Model_penjualan_admin->updateStatusTransaksi($dataTransaksi,$Id);
            if ($Validate)
            {
                $this->session->set_flashdata('Status','Acc Succes');
                redirect('admin/Penjualan');
            }
            else
            {
                $this->session->set_flashdata('Status','Acc Failed');
                redirect('admin/Penjualan');
            }
        }
    }

    function getDetailPenjualanById()
    {
        if (ceksession())
        {
            $Id = $_GET['Id'];
            $dataPenjualan['record'] = $this->Model_penjualan_admin->getDetailPenjualanById($Id);
            $dataPenjualan['transaksi']  =    $this->Model_penjualan_admin->cekpenjualan();
            $this->template->load('template','admin/transaksi/view_detail_transaksi',$dataPenjualan);
        }
    }

}
?>