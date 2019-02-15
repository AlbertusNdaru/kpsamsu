<?php
class Transaksi extends ci_controller{
    
        function __construct() {
        parent::__construct();
        $this->load->model(array('Model_barang','Model_transaksi'));
    }
    
    function index()
    {
        if(ceksession())
        {
        $this->load->library('pagination');
        $config['base_url'] = base_url().'index.php/transaksi/index/';
        //$cektotal = $this->Model_transaksi->tampiltransaksi();
        //if ($cektotal)
        //{
             $config['total_rows'] = $this->Model_transaksi->tampiltransaksi()->num_rows();
        //}
        //else
        //{
         //  $config['total_rows'] = 0;
        //}
        
        $config['per_page'] = 6; 
        $this->pagination->initialize($config); 
        $data['paging']     =$this->pagination->create_links();
        $halaman            =  $this->uri->segment(3);
        $halaman            =$halaman==''?0:$halaman-1;
         //$cekisi =  $this->Model_transaksi->tampiltransaksipaging($config,$halaman);
         //if ($cekisi)
         //{
              $data['record']     =    $this->Model_transaksi->tampiltransaksipaging($config,$halaman)->result();
         //}
         //else
         //{
          //    $data['record'] = array();;
         //}
       
        $this->template->load('template','admin/transaksi/view_transaksi',$data);
        }
    }

    function tampilbynama()
    {
        $data['record']=$this->Model_barang->tampil_data_by_name()->result();
        echo json_encode($data['record']);
   
    }
    
    
    function hapusitem()
    {
        $id=  $this->uri->segment(3);
        $this->Model_transaksi->hapusitem($id);
        redirect('transaksi');
    }
    
    function clearrecordtransaksi()
    {
        $this->Model_transaksi->clearrecord();
        redirect('transaksi');
    }
    
    
    
    function selesai_belanja()
    {
        $tanggal=date('Y-m-d');
        $user=  $this->session->userdata('username');
        $id_op=  $this->db->get_where('operator',array('username'=>$user))->row_array();
        $data=array('operator_id'=>$id_op['operator_id'],'tanggal_transaksi'=>$tanggal);
        $this->Model_transaksi->selesai_belanja($data);
        redirect('transaksi');
    }
    
    
    function laporan()
    {
        if(isset($_POST['submit']))
        {
            $tanggal1=  $this->input->post('tanggal1');
            $tanggal2=  $this->input->post('tanggal2');
            $data['record']=  $this->Model_transaksi->laporan_periode($tanggal1,$tanggal2);
            $this->template->load('template','transaksi/laporan',$data);
        }
        else
        {
            $data['record']=  $this->Model_transaksi->laporan_default();
            $this->template->load('template','transaksi/laporan',$data);
        }
    }
    
    
    function excel()
    {
        header("Content-type=appalication/vnd.ms-excel");
        header("content-disposition:attachment;filename=laporantransaksi.xls");
        $data['record']=  $this->Model_transaksi->laporan_default();
        $this->load->view('transaksi/laporan_excel',$data);
    }
    
    function pdf()
    {
        $this->load->library('cfpdf');
        $pdf=new FPDF('P','mm','A4');
        $pdf->AddPage();
        $pdf->SetFont('Arial','B','L');
        $pdf->SetFontSize(14);
        $pdf->Text(10, 10, 'LAPORAN TRANSAKSI');
        $pdf->SetFont('Arial','B','L');
        $pdf->SetFontSize(10);
        $pdf->Cell(10, 10,'','',1);
        $pdf->Cell(10, 7, 'No', 1,0);
        $pdf->Cell(27, 7, 'Tanggal', 1,0);
        $pdf->Cell(30, 7, 'Operator', 1,0);
        $pdf->Cell(38, 7, 'Total Transaksi', 1,1);
        // tampilkan dari database
        $pdf->SetFont('Arial','','L');
        $data=  $this->Model_transaksi->laporan_default();
        $no=1;
        $total=0;
        foreach ($data->result() as $r)
        {
            $pdf->Cell(10, 7, $no, 1,0);
            $pdf->Cell(27, 7, $r->tanggal_transaksi, 1,0);
            $pdf->Cell(30, 7, $r->nama_lengkap, 1,0);
            $pdf->Cell(38, 7, $r->total, 1,1);
            $no++;
            $total=$total+$r->total;
        }
        // end
        $pdf->Cell(67,7,'Total',1,0,'R');
        $pdf->Cell(38,7,$total,1,0);
        $pdf->Output();
    }

    function getdetailtransaksi_byid()
    {
       $id= $this->input->post('id');
       $datadetail=$this->Model_transaksi->tampilkan_detail_transaksi_byid($id);
       echo Json_encode($datadetail);
    }

    function get_data_transaksi_by_id()
    {
        $datatransaksi['record']=$this->Model_transaksi->tampiltransaksibyid();
        $this->template->load('template1','user/riwayat_transaksi',$datatransaksi);
    }
}