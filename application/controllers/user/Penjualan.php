<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Penjualan extends CI_Controller
{
    function __construct() {
        parent::__construct();
        $this->load->model('Model_barang');
        $this->load->model('Model_penjualan');
        
    }

    function poscartpending()
    {  
        
        $Product_id   = $this->input->post('id_barang');
        $Qty          = $this->input->post('jml');
        $data         = $this->Model_barang->M_tampil_data_by_id($Product_id);
        $Price        = $data->Price;
        $Photo_name   = $data->Photo_name;
        $Product_name = $data->Product_name;
        
        if (isset($_SESSION['cart'][$Product_id]))
        {   
            $_SESSION['cart'][$Product_id]['Qty']=$_SESSION['cart'][$Product_id]['Qty']+$Qty;
           
        }
        else
        {  
           if(isset($_SESSION['cart']))
           {
            $datatransaksi = $this->session->userdata('cart');
            $datatransaksi[$Product_id] = array(
                                        'Product_id'   => $Product_id,
                                        'Qty'          => $Qty,
                                        'Price'        => $Price,
                                        'Photo_name'   => $Photo_name, 
                                        'Product_name' => $Product_name);
            $this->session->set_userdata('cart',$datatransaksi);

           } 
           else
           {
            $datatransaksi[$Product_id] = array(
                                        'Product_id'   => $Product_id,
                                        'Qty'          => $Qty,
                                        'Price'        => $Price,
                                        'Photo_name'   => $Photo_name, 
                                        'Product_name' => $Product_name);
            $this->session->set_userdata('cart',$datatransaksi);
           }
           
        }
        $total=0;
        foreach($_SESSION['cart'] as $key => $data)
        {
            $total = $total+$data['Price']*$data['Qty'];
        }
        echo $total;
    }


    function post_penjualan()
    {
        $Product_id   = $this->input->post('id_barang');
        $Qty          = $this->input->post('jml');
        $data         = $this->Model_barang->M_tampil_data_by_id($Product_id);
        $Price        = $data->Price;
        $Photo_name   = $data->Photo_name;
        $Product_name = $data->Product_name;
        $total        = $Price * 1;
        if (isset($_SESSION['cart'][$Product_id]))
        {  
            $_SESSION['cart'][$Product_id]['Qty']=$_SESSION['cart'][$Product_id]['Qty']+$Qty;
            $updatedata = array('Product_id' =>$Product_id,
                                'Qty'        =>$_SESSION['cart'][$Product_id]['Qty']);
            $this->Model_penjualan->updateDetailsFromCart($updatedata);
        }
        else
        {  
            $datatransaksi = $this->session->userdata('cart');
            $datatransaksi[$Product_id]= array(
                                               'Product_id'   => $Product_id,
                                               'Qty'          => $Qty,
                                               'Price'        => $Price,
                                               'total'        => $total,
                                               'Photo_name'   => $Photo_name, 
                                               'Product_name' => $Product_name);
            $this->Model_penjualan->addDetailFromLogin($datatransaksi,$Product_id);
            $this->session->set_userdata('cart',$datatransaksi);
           
        }
        $total=0;
        foreach($_SESSION['cart'] as $key => $data)
        {
            $total = $total+$data['Price']*$data['Qty'];
        }
        echo $total;
       
    }

    

    function getchartpending()
    {
        if(isset($_SESSION['cart']))
        {
        echo json_encode($_SESSION['cart']);
        }
        else
        {
            echo json_encode([]);
        }
       
    }

    
  function emptychart()
  {
     unset($_SESSION['cart']);
  }

  function emptychartfromlogin()
  {
    unset($_SESSION['cart']);
    $Member_id = $_SESSION['userdata']->Id;
    $this->Model_penjualan->emptychartfromlogin($Member_id);
  }

  function deleteDetailsbyId()
  {
    $Product_id= $_GET['Product_id'];
    if(isset($_SESSION['userdata']))
    {
        $this->Model_penjualan->deleteDetailsbyId($_SESSION['userdata']->Id,$Product_id);
    }
    unset($_SESSION['cart'][$Product_id]);
    redirect('user/Shop/cheeckout');
  }

  function checkout()
  {
        $transaksibill = $_SESSION['userdata']->Member_name.'-'.get_current_date_img();
        $datacheckout= array(
                            'Payment'          => $_POST['Payment'],
                            'Transaction_bill' => $transaksibill,
                            'Ongkir'           => $_POST['Ongkir'],
                            'Kurir'            => $_POST['Kurir'],
                            'Alamat_kirim'     => $_POST['Alamat_kirim'],
                            'Provinsi'         => $_POST['Provinsi'],
                            'Kota'             => $_POST['Kota']
                            );
        $this->Model_penjualan->checkout($datacheckout);
        $IdTransaksi = $this->Model_penjualan->getidtransaksibyBill($transaksibill);
        $datacheckout= array(
                            'Status'         => 1,
                            'Transaction_id' => $IdTransaksi
                            );
        $this->Model_penjualan->updateTransaksiSukses($datacheckout);
        unset($_SESSION['cart']);
  }

 function getdatatransaksi()
 {
    $id=$_POST['id'];
    $dataTransaksi = $this->Model_penjualan->getdatatransaksi($id);
    echo json_encode($dataTransaksi);
 }

 function getdatatransaksiVerified()
 {
    $id=$_POST['id'];
    $dataTransaksi = $this->Model_penjualan->getdatatransaksiVerified($id);
    echo json_encode($dataTransaksi);
 }

 function addBukti()
 {
         $data  = explode(" ",$this->input->post('bill'));
         $bill  = $data[1];
         $this->Model_penjualan->M_Update_bukti($this->input->post('bill'),$bill);
         $this->aksi_upload($bill);
 }
    
 
 public function aksi_upload($bill)
 {
    
         $config['upload_path']   = './assets/Bukti_transaksi/';
         $config['allowed_types'] = '*';
         $config['file_name']     = $bill.'.jpg';
         //$config['max_width']            = 1024;
         //$config['max_height']           = 768;                    
         $this->load->library('upload', $config);
         
                 if ( ! $this->upload->do_upload('berkas')){
                     $error = array('error' => $this->upload->display_errors());
                     echo json_encode($error);
                 }else{
                     $data = array('upload_data' => $this->upload->data());
                     //redirect('barang');
                 }

         if($insertimg)
         {
             $this->session->set_flashdata('Status','Upload Succes');
             redirect('user/Shop');
         }
         else
         {
             
             $this->session->set_flashdata('Status','Upload Failed');
             redirect('user/Shop');
         }

   
 }


}
?>