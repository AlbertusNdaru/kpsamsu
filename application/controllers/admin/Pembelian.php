<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembelian  extends CI_Controller {
	function __construct() {
		parent::__construct();
        $this->load->model('Model_pembelian');
        $this->load->model('Model_barang');
        isLoginSessionExpired();
    }


    function index()
    {
        $dataProduct['record'] = $this->Model_barang->M_tampil_data();  
        $dataProduct['transaksi']  =    $this->Model_penjualan_admin->cekpenjualan();
        $this->template->load('template','admin/pembelian_product/view_pembelian',$dataProduct);
    }

    function viewPembelian($id)
    {   
        $dataProduct['product'] = $this->Model_barang->M_tampil_data_by_id($id);    
        $dataProduct['transaksi']  =    $this->Model_penjualan_admin->cekpenjualan();
        $this->template->load('template','admin/pembelian_product/input_pembelian',$dataProduct);
    }

    function addPembelian()
    {
        $id_product= $_POST['id'];
        $jumlah_beli = $_POST['jumlah_beli'];
        $harga_supliyer= $_POST["harga_supliyer"];
        $dataPembelian = array(
                             "id_product"=>$id_product,
                             "price"=>$harga_supliyer,
                             "jumlah_beli"=>$jumlah_beli
                            );
        $hasilInsert= $this->Model_pembelian->insertPembelian($dataPembelian);
        if($hasilInsert)
        {
            $this->session->set_flashdata('Status','Input Succes');
            redirect('admin/Pembelian');
        }
        else
        {
            $this->session->set_flashdata('Status','Input Failed');
            redirect('admin/Pembelian');
        }
    }
}
?>