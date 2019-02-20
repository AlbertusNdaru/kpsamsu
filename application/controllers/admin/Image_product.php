<?php
class Image_product extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model('Model_image');
        $this->load->model('Model_barang');
    }
    
    function index()
    {
        $data['record']     =    $this->Model_image->M_tampil_data();
        $this->template->load('template','admin/image_product/input_image',$data);
    }

    function viewAddImageProduct()
    {
        $this->template->load('template','admin/kategori/input_category');
    }              
    
    function addImage_product()
    {
        $Id    = $this->input->post('IdProduct');
        $this->Model_image->M_deleteImage($Id);
        $this->Model_image->M_Update_image($Id,$_FILES['berkas']['name'][0]);
        $this->aksi_upload($Id,$_FILES['berkas']);
    }
       
    
    public function aksi_upload($id,$files)
    {
        $images = array();
        $config['upload_path']          = './assets/img_product/';
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