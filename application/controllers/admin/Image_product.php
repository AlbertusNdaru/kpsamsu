<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Image_product extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model('Model_image');
        $this->load->model('Model_barang');
        $this->load->model('Model_penjualan_admin');
        isLoginSessionExpired();
    }
    
    function index()
    {
        if (ceksession())
        {
            $data['record']     =    $this->Model_image->M_tampil_data();
            $data['transaksi']  =    $this->Model_penjualan_admin->cekpenjualan();
            $this->template->load('template','admin/image_product/input_image',$data);
        }
    }

    function getImgProduct()
    {
        $Id =$_POST['Id'];
        $dataImg = $this->Model_image->getImgbyId($Id);
        echo json_encode($dataImg);
    }

               
    
    function addImage_product()
    {
        if (ceksession())
        {
            $Id    = $this->input->post('IdProduct');
            $New  = 'IMG_'.get_current_date_img().'_Product.jpg';
            $this->Model_image->M_deleteImage($Id);
            $this->Model_image->M_Update_image($Id,$New);
            $this->aksi_upload($Id, $New);
        }
    }
       
    
    public function aksi_upload($id,$New)
    {
        if (ceksession())
        {
            $config['upload_path']          = './assets/shop/images/';
		    $config['allowed_types']        = '*';
            $config['file_name'] = $New;
            //$config['max_width']            = 1024;
            //$config['max_height']           = 768;
		    $this->load->library('upload', $config);
            
                    if ( ! $this->upload->do_upload('berkas')){
                        $error = array('error' => $this->upload->display_errors());
                        echo json_encode($error);
                    }else{
                        $data = array('upload_data' => $this->upload->data());
                        $insertimg=$this->Model_image->M_addProductImage($id,$New);
                        //redirect('barang');
                    }

            if($insertimg)
            {
                $this->session->set_flashdata('Status','Upload Succes');
                redirect('admin/Image_product');
            }
            else
            {
                
                $this->session->set_flashdata('Status','Upload Failed');
                redirect('admin/Image_product');
            }
         }
      
    }
}