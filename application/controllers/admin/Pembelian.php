<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembelian  extends CI_Controller {
	function __construct() {
		parent::__construct();
        $this->load->model('Model_pembelian');
        $this->load->model('Model_barang');
        $this->load->model('Model_supliyer');
        $this->load->model('Model_penjualan_admin');
        isLoginSessionExpired();
    }


    function index()
    {
        if (ceksession())
        {
            $dataProduct['record']    = $this->Model_barang->M_tampil_data();  
            $dataProduct['transaksi'] = $this->Model_penjualan_admin->cekpenjualan();
            $this->template->load('template','admin/pembelian_product/view_pembelian',$dataProduct);
        }
    }

    function viewPembelian($id)
    {   
        if (ceksession())
        {
            $dataProduct['product']   = $this->Model_barang->M_tampil_data_by_id($id);   
            $dataProduct['Supliyer']  = $this->Model_supliyer->tampildata(); 
            $dataProduct['transaksi'] = $this->Model_penjualan_admin->cekpenjualan();
            $this->template->load('template','admin/pembelian_product/input_pembelian',$dataProduct);
        }
    }

    function addPembelian()
    {
        if (ceksession())
        {
            $id_product     = $_POST['id'];
            $jumlah_beli    = $_POST['jumlah_beli'];
            $harga_supliyer = $_POST["harga_supliyer"];
            $Supliyer_id    = $_POST['Supliyer_id'];
            $dataPembelian  = array(
                                 "id_product"=>$id_product,
                                 "price"=>$harga_supliyer,
                                 "jumlah_beli"=>$jumlah_beli,
                                 'Supliyer_id' => $Supliyer_id
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
}
?>