<?php
class Laporan extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model('Model_penjualan_admin');
        $this->load->model('Model_pembelian');
        isLoginSessionExpired();
    }

    function laporanpenjualan()
    {  
        if (ceksession())
        {
            $data['record']=  $this->Model_penjualan_admin->getDataPenjualan();
            $config = array('format'=>'Folio');
            $mpdf = new \Mpdf\Mpdf($config);
            $html =  $this->load->view('admin/laporan/LaporanPenjualan',$data,true);
            $mpdf->WriteHTML($html);
            $mpdf->Output();
        }
    }

    function laporanpembelian()
    {  
        if (ceksession())
        {
            $data['record']=  $this->Model_pembelian->getDataPembelian();
            $config = array('format'=>'Folio');
            $mpdf = new \Mpdf\Mpdf($config);
            $html =  $this->load->view('admin/laporan/LaporanPembelian',$data,true);
            $mpdf->WriteHTML($html);
            $mpdf->Output();
        }
    }
    
}