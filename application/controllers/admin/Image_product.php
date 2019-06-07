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

               
    
    function addImage_product()
    {
        if (ceksession())
        {
            $Id    = $this->input->post('IdProduct');
            $this->Model_image->M_deleteImage($Id);
            $this->Model_image->M_Update_image($Id,$_FILES['berkas']['name'][0]);
            $this->aksi_upload($Id,$_FILES['berkas']);
        }
    }
       
    
    public function aksi_upload($id,$files)
    {
        if (ceksession())
        {
            $images = array();
            $config['upload_path']          = './assets/shop/images/';
            $config['allowed_types']        = '*';
            $this->load->library('upload', $config);
            foreach($files['name'] as $key => $image)
            { 
                $_FILES['berkas[]']['name']= $files['name'][$key];
                $_FILES['berkas[]']['type']= $files['type'][$key];
                $_FILES['berkas[]']['tmp_name']= $files['tmp_name'][$key];
                $_FILES['berkas[]']['error']= $files['error'][$key];
                $_FILES['berkas[]']['size']= $files['size'][$key];
    
                //echo $dataimage->name;
                
                    $config['file_name']              = $image;
                    //$config['max_size']             = 100;
                    //$config['max_width']            = 1024;
                    //$config['max_height']           = 768;
            
                    $this->upload->initialize($config);
            
                    if ( ! $this->upload->do_upload('berkas[]')){
                        $error = array('error' => $this->upload->display_errors());
                        echo json_encode($error);
                    }else{
                        $data = array('upload_data' => $this->upload->data());
                        $insertimg=$this->Model_image->M_addProductImage($id,$image);
                        //redirect('barang');
                    }
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